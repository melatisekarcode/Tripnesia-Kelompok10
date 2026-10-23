<?php

namespace App\Controllers;

use App\Models\SimpanModel;

class Simpan extends BaseController
{
    // Data tampilan tiap destinasi (sementara, nanti bisa diganti dari tabel destinations)
    private array $destinasi = [
        'curugcimahi'    => ['nama' => 'Curug Cimahi',           'lokasi' => 'Bandung',            'rating' => '4.7', 'ulasan' => '1.550',   'img' => 'curugcimahi.png'],
        'kebunrayabogor' => ['nama' => 'Kebun Raya Bogor',       'lokasi' => 'Bogor',              'rating' => '4.7', 'ulasan' => '105.112', 'img' => 'kebunrayabogor.png'],
        'pantaisawarna'  => ['nama' => 'Pantai Sawarna',         'lokasi' => 'Banten',             'rating' => '4.8', 'ulasan' => '320',     'img' => 'pantaisawarna.png'],
        'tamansafari'    => ['nama' => 'Taman Safari Indonesia', 'lokasi' => 'Cisarua, Kab Bogor', 'rating' => '4.7', 'ulasan' => '72.715',  'img' => 'tamansafari.png'],
    ];

    private function userId()
    {
        return session()->get('isLoggedIn') ? session()->get('user_id') : null;
    }

    // Halaman Simpan
    public function index()
    {
        $uid = $this->userId();
        if (! $uid) {
            return redirect()->to('login');
        }

        $rows  = (new SimpanModel())->where('user_id', $uid)->orderBy('created_at', 'DESC')->findAll();
        $items = [];
        foreach ($rows as $r) {
            if (isset($this->destinasi[$r['slug']])) {
                $items[] = ['slug' => $r['slug']] + $this->destinasi[$r['slug']];
            }
        }

        return view('simpan', ['items' => $items]);
    }

    // Cek apakah sudah disimpan (untuk ikon di halaman detail)
    public function status(string $slug)
    {
        $uid = $this->userId();
        $ada = $uid && (new SimpanModel())->where(['user_id' => $uid, 'slug' => $slug])->first();

        return $this->response->setJSON(['login' => (bool) $uid, 'saved' => (bool) $ada]);
    }

    // Simpan / hapus (toggle)
    public function toggle()
    {
        $uid  = $this->userId();
        $slug = (string) $this->request->getPost('slug');

        if (! $uid) {
            return $this->response->setStatusCode(401)->setJSON(['error' => 'login']);
        }
        if (! isset($this->destinasi[$slug])) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'slug']);
        }

        $model = new SimpanModel();
        $ada   = $model->where(['user_id' => $uid, 'slug' => $slug])->first();

        if ($ada) {
            $model->delete($ada['id']);
            $saved = false;
        } else {
            $model->insert(['user_id' => $uid, 'slug' => $slug]);
            $saved = true;
        }

        return $this->response->setJSON(['saved' => $saved]);
    }
}