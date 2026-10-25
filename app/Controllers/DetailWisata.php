<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class DetailWisata extends BaseController
{
    private array $slugValid = [
        'curugcimahi',
        'kebunrayabogor',
        'pantaisawarna',
        'tamansafari',
    ];

    public function detail(string $slug)
    {
        if (! in_array($slug, $this->slugValid, true)) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('detailwisata/' . $slug . '/index.html', ['slug' => $slug]);
    }
}