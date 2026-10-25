<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // ---------- LOGIN ----------

    public function login()
    {
        // Sudah login? langsung ke beranda
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        return view('login');
    }

    public function prosesLogin()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('error', 'Masukkan email yang valid dan password.');
        }

        $email    = strtolower(trim($this->request->getPost('email')));
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if (! $user || ! password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()
                ->with('error', 'Email atau password salah.');
        }

        // Login berhasil: simpan data ke session
        session()->regenerate();
        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'name'       => $user['name'],
            'email'      => $user['email'],
            'role'       => $user['role'],
        ]);

        return redirect()->to('/');
    }

    // ---------- DAFTAR ----------

    public function daftar()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        return view('daftar');
    }

    public function prosesDaftar()
    {
        $rules = [
            'name'            => 'required|min_length[3]|max_length[150]',
            'email'           => 'required|valid_email|max_length[150]|is_unique[users.email]',
            'password'        => 'required|min_length[6]',
            'confirmPassword' => 'required|matches[password]',
        ];

        $messages = [
            'name' => [
                'required'   => 'Nama wajib diisi.',
                'min_length' => 'Nama minimal 3 karakter.',
            ],
            'email' => [
                'required'    => 'Email wajib diisi.',
                'valid_email' => 'Format email tidak valid.',
                'is_unique'   => 'Email ini sudah terdaftar.',
            ],
            'password' => [
                'required'   => 'Password wajib diisi.',
                'min_length' => 'Password minimal 6 karakter.',
            ],
            'confirmPassword' => [
                'required' => 'Konfirmasi password wajib diisi.',
                'matches'  => 'Konfirmasi password tidak sama.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->userModel->insert([
            'name'     => trim($this->request->getPost('name')),
            'email'    => strtolower(trim($this->request->getPost('email'))),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'customer',
        ]);

        return redirect()->to('login')
            ->with('success', 'Pendaftaran berhasil. Silakan masuk.');
    }

    // ---------- LUPA & RESET PASSWORD ----------

    // Halaman form "Lupa Kata Sandi"
    public function lupaSandi()
    {
        return view('lupasandi');
    }

    // Proses form: buat token lalu kirim tautan reset ke email
    public function kirimReset()
    {
        if (! $this->validate(['email' => 'required|valid_email'])) {
            return redirect()->to('lupa-sandi')->withInput()
                ->with('error', 'Masukkan alamat email yang valid.');
        }

        $email = strtolower(trim($this->request->getPost('email')));
        $user  = $this->userModel->where('email', $email)->first();
        $devLink = null;

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $db    = db_connect();

            // Hanya simpan hash token, token asli hanya ada di tautan email
            $db->table('password_resets')->where('email', $email)->delete();
            $db->table('password_resets')->insert([
                'email'      => $email,
                'token_hash' => hash('sha256', $token),
                'expires_at' => date('Y-m-d H:i:s', time() + 3600), // berlaku 1 jam
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            $link    = base_url('reset-sandi/' . $token);
            $terkirim = $this->kirimEmailReset($email, $user['name'], $link);

            // Mode development & email belum disetel: tampilkan tautan di layar agar bisa dites
            if (! $terkirim && ENVIRONMENT === 'development') {
                $devLink = $link;
            }
        }

        // Pesan selalu sama supaya orang luar tidak bisa menebak email mana yang terdaftar
        return redirect()->to('lupa-sandi')
            ->with('success', 'Jika email terdaftar, tautan reset password sudah dikirim. Periksa kotak masuk Anda.')
            ->with('dev_link', $devLink);
    }

    // Halaman form password baru (dibuka dari tautan email)
    public function resetSandi(string $token)
    {
        if (! $this->cariToken($token)) {
            return redirect()->to('lupa-sandi')
                ->with('error', 'Tautan reset tidak valid atau sudah kedaluwarsa. Silakan minta lagi.');
        }

        return view('resetsandi', ['token' => $token]);
    }

    // Simpan password baru
    public function prosesReset()
    {
        $token = (string) $this->request->getPost('token');

        $rules = [
            'password'        => 'required|min_length[6]',
            'confirmPassword' => 'required|matches[password]',
        ];
        $messages = [
            'password' => [
                'required'   => 'Password baru wajib diisi.',
                'min_length' => 'Password minimal 6 karakter.',
            ],
            'confirmPassword' => [
                'required' => 'Konfirmasi password wajib diisi.',
                'matches'  => 'Konfirmasi password tidak sama.',
            ],
        ];

        $row = $this->cariToken($token);
        if (! $row) {
            return redirect()->to('lupa-sandi')
                ->with('error', 'Tautan reset tidak valid atau sudah kedaluwarsa. Silakan minta lagi.');
        }

        if (! $this->validate($rules, $messages)) {
            return redirect()->to('reset-sandi/' . $token)
                ->with('errors', $this->validator->getErrors());
        }

        $user = $this->userModel->where('email', $row['email'])->first();
        if ($user) {
            $this->userModel->update($user['id'], [
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);
        }

        // Token sekali pakai
        db_connect()->table('password_resets')->where('email', $row['email'])->delete();

        return redirect()->to('login')
            ->with('success', 'Password berhasil diubah. Silakan masuk dengan password baru.');
    }

    // Cari token yang masih berlaku
    private function cariToken(string $token): ?array
    {
        if ($token === '') {
            return null;
        }

        return db_connect()->table('password_resets')
            ->where('token_hash', hash('sha256', $token))
            ->where('expires_at >', date('Y-m-d H:i:s'))
            ->get()->getRowArray();
    }

    // Kirim email berisi tautan reset (butuh pengaturan SMTP di app/Config/Email.php)
    private function kirimEmailReset(string $to, string $nama, string $link): bool
    {
        try {
            $email = service('email');
            $dari  = config('Email')->fromEmail ?: 'no-reply@tripnesia.test';

            $email->setFrom($dari, 'Tripnesia');
            $email->setTo($to);
            $email->setSubject('Reset Password Tripnesia');
            $email->setMailType('html');
            $email->setMessage(
                '<p>Halo ' . esc($nama) . ',</p>'
                . '<p>Kami menerima permintaan reset password untuk akun Tripnesia Anda. '
                . 'Klik tautan di bawah ini untuk membuat password baru (berlaku 1 jam):</p>'
                . '<p><a href="' . esc($link) . '">Reset Password</a></p>'
                . '<p>Jika Anda tidak meminta ini, abaikan email ini.</p>'
            );

            return $email->send(false);
        } catch (\Throwable $e) {
            log_message('error', 'Gagal kirim email reset: ' . $e->getMessage());
            return false;
        }
    }

    // ---------- LOGOUT ----------

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}