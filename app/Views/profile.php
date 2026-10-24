<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profil - TripNesia</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --bs-primary: #0a84c6;
      --bs-primary-rgb: 10, 132, 198;
      --tn-border: #dfe5ee;
      --tn-soft: #f1f5fb;
    }
    body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; color: #111827; background: #fff; }
    .btn-primary { --bs-btn-bg: #0a84c6; --bs-btn-border-color: #0a84c6; --bs-btn-hover-bg: #0873ab; --bs-btn-hover-border-color: #0873ab; --bs-btn-active-bg: #0873ab; }
    .btn-outline-secondary { --bs-btn-color: #4b5563; --bs-btn-border-color: var(--tn-border); }

    .page { max-width: 960px; }
    .content { max-width: 420px; }

    /* Menu drawer */
    .menu-link { color: #111827; padding: 8px 16px; border-radius: 8px; transition: background-color .15s, color .15s; }
    .menu-link:hover, .menu-link:focus-visible { color: #0a84c6; background-color: rgba(10, 132, 198, .1); }
    .menu-link.active { color: #0a84c6; font-weight: 700; }
    .offcanvas .btn-outline-secondary:hover { color: #0a84c6; border-color: #0a84c6; background-color: rgba(10, 132, 198, .08); }

    /* Avatar */
    .avatar-wrap { position: relative; width: 150px; height: 150px; margin: 0 auto; }
    .avatar { width: 100%; height: 100%; border-radius: 50%; border: 8px solid #0a84c6; background: #fff; display: flex; align-items: center; justify-content: center; overflow: hidden; color: #374151; font-size: 4.5rem; }
    .avatar img { width: 100%; height: 100%; object-fit: cover; }
    .btn-camera { position: absolute; right: -4px; bottom: 8px; width: 34px; height: 34px; border-radius: 50%; border: 0; background: #9fd0f2; color: #111827; display: flex; align-items: center; justify-content: center; font-size: .9rem; box-shadow: 0 2px 4px rgba(0,0,0,.15); }

    .section-title { font-size: .85rem; font-weight: 700; margin-bottom: 8px; }

    /* Item menu */
    .menu-item { display: flex; align-items: center; gap: 12px; width: 100%; padding: 10px 14px; border: 1px solid #eef1f6; border-radius: 10px; background: #f8fafd; box-shadow: 0 3px 8px rgba(15,23,42,.08); color: #111827; text-decoration: none; font-size: .85rem; text-align: left; transition: transform .15s, box-shadow .15s; }
    .menu-item:hover { transform: translateY(-1px); box-shadow: 0 5px 12px rgba(15,23,42,.12); color: #111827; }
    .menu-icon { width: 28px; height: 28px; border-radius: 7px; background: #8cc4f0; display: flex; align-items: center; justify-content: center; color: #fff; font-size: .9rem; flex-shrink: 0; }
    .menu-item.danger { background: #f9dede; border-color: #f3c9c9; color: #dc2626; }
    .menu-item.danger .menu-icon { background: #f4a6a6; }

    footer { border-top: 1px solid var(--tn-border); background: #f8fafc; }
  </style>
</head>

<body class="d-flex flex-column min-vh-100">

  <!-- Header -->
  <header class="border-bottom bg-white sticky-top">
    <div class="page container d-flex align-items-center justify-content-between py-2">
      <a href="<?= base_url('/') ?>">
        <img src="<?= base_url('assets/images/logo.svg') ?>" alt="Tripnesia, Jelajahi Indonesia, Temukan Ceritamu" height="40">
      </a>
      <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuDrawer" aria-controls="menuDrawer" aria-label="Menu">
        <i class="bi bi-list fs-5"></i>
      </button>
    </div>
  </header>

  <!-- Drawer menu -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="menuDrawer" aria-labelledby="menuDrawerLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="menuDrawerLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
      <ul class="nav flex-column mb-4">
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('/') ?>">Beranda</a></li>
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('cari') ?>">Cari</a></li>
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('simpan') ?>">Simpan</a></li>
        <li class="nav-item"><a class="nav-link menu-link active" href="<?= base_url('profile') ?>">Profile</a></li>
      </ul>
      <div class="mt-auto">
        <a href="<?= base_url('logout') ?>" class="btn btn-outline-secondary w-100">Keluar</a>
      </div>
    </div>
  </div>

  <main class="page container py-4 flex-grow-1">

    <div class="content mx-auto">

      <!-- Profil pengguna -->
      <section aria-labelledby="profil-pengguna" class="text-center mb-4">
        <h1 id="profil-pengguna" class="visually-hidden">Profil Pengguna</h1>

        <div class="avatar-wrap mb-3">
          <div class="avatar" id="avatar" role="img" aria-label="Foto profil pengguna">
            <i class="bi bi-person"></i>
          </div>
          <button type="button" class="btn-camera" id="btnCamera" aria-label="Ubah foto profil">
            <i class="bi bi-camera-fill"></i>
          </button>
          <input type="file" id="fotoInput" accept="image/*" class="d-none">
        </div>

        <p class="fw-bold mb-0"><?= esc(session()->get('name')) ?></p>
      </section>

      <!-- Akun saya -->
      <section aria-labelledby="akun-saya" class="mb-4">
        <h2 id="akun-saya" class="section-title">Akun Saya</h2>
        <nav aria-label="Menu akun">
          <ul class="list-unstyled d-grid gap-2 mb-0">
            <li>
              <a href="<?= base_url('profile/edit') ?>" class="menu-item">
                <span class="menu-icon" aria-hidden="true"><i class="bi bi-person-lines-fill"></i></span>
                Edit Profil
              </a>
            </li>
            <li>
              <a href="<?= base_url('simpan') ?>" class="menu-item">
                <span class="menu-icon" aria-hidden="true"><i class="bi bi-bookmark-fill"></i></span>
                Riwayat Simpan Wisata
              </a>
            </li>
          </ul>
        </nav>
      </section>

      <!-- Umum -->
      <section aria-labelledby="umum">
        <h2 id="umum" class="section-title">Umum</h2>
        <nav aria-label="Menu umum">
          <ul class="list-unstyled d-grid gap-3 mb-0">
            <li>
              <a href="<?= base_url('bantuan') ?>" class="menu-item">
                <span class="menu-icon" aria-hidden="true"><i class="bi bi-clock-history"></i></span>
                Bantuan &amp; Support
              </a>
            </li>
            <li>
              <button type="button" class="menu-item danger" data-bs-toggle="modal" data-bs-target="#keluarModal">
                <span class="menu-icon" aria-hidden="true"><i class="bi bi-box-arrow-right"></i></span>
                Keluar Akun
              </button>
            </li>
          </ul>
        </nav>
      </section>

    </div>
  </main>

  <!-- Modal konfirmasi keluar -->
  <div class="modal fade" id="keluarModal" tabindex="-1" aria-labelledby="keluarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title fs-6" id="keluarModalLabel">Keluar Akun</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body small text-secondary">Yakin ingin keluar dari akun kamu?</div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
          <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center text-secondary small py-3">
    <i class="bi bi-c-circle"></i> Copyright TripNesia 2026
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Ubah foto profil: pilih gambar lalu tampilkan sebagai pratinjau (belum disimpan ke backend)
    const fotoInput = document.getElementById("fotoInput");
    document.getElementById("btnCamera").addEventListener("click", () => fotoInput.click());
    fotoInput.addEventListener("change", () => {
      const file = fotoInput.files[0];
      if (!file) return;
      const url = URL.createObjectURL(file);
      document.getElementById("avatar").innerHTML = `<img src="${url}" alt="Foto profil pengguna">`;
    });
  </script>
</body>
</html>