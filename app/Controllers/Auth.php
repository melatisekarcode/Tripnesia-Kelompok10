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

    // ---------- LOGOUT ----------

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}