<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tripnesia - Simpan</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --bs-primary: #0a84c6;
      --bs-primary-rgb: 10, 132, 198;
      --tn-border: #dfe5ee;
      --tn-soft: #f1f5fb;
    }
    body {
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
      color: #111827;
      background-color: #f8fafc;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    main { flex: 1; }
    .btn-primary { --bs-btn-bg: #0a84c6; --bs-btn-border-color: #0a84c6; --bs-btn-hover-bg: #0873ab; --bs-btn-hover-border-color: #0873ab; --bs-btn-active-bg: #0873ab; }
    .btn-outline-secondary { --bs-btn-color: #4b5563; --bs-btn-border-color: var(--tn-border); }
    .page { max-width: 960px; }

    /* Menu drawer */
    .menu-link {
      color: #111827;
      padding: 8px 16px;
      border-radius: 8px;
      transition: background-color .15s, color .15s;
    }
    .menu-link:hover,
    .menu-link:focus-visible {
      color: #0a84c6;
      background-color: rgba(10, 132, 198, .1);
    }
    .menu-link.active {
      color: #0a84c6;
      font-weight: 700;
    }
    .offcanvas .btn-outline-secondary:hover {
      color: #0a84c6;
      border-color: #0a84c6;
      background-color: rgba(10, 132, 198, .08);
    }

    /* Card Destinasi (disamakan dengan Beranda) */
    .dest-card { border: 1px solid var(--tn-border); border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,.06); overflow: hidden; height: 100%; transition: transform .15s, border-color .15s; background: #fff; text-align: left; width: 100%; padding: 0; position: relative; }
    .dest-card:hover { transform: translateY(-2px); border-color: var(--bs-primary); }
    .dest-card img { width: 100%; aspect-ratio: 4 / 3; object-fit: cover; display: block; }
    .dest-card .info { padding: 8px; }
    .dest-card .info .fw-bold { font-size: .8rem; }
    .dest-card .info .small { font-size: .7rem !important; }

    /* Tombol Tersimpan di dalam card */
    .btn-simpan-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      background-color: var(--tn-soft);
      color: var(--bs-primary);
      border: 1px solid var(--bs-primary);
      border-radius: 8px;
      padding: 5px 8px;
      font-size: .7rem;
      font-weight: 600;
      width: 100%;
      margin-top: 8px;
      transition: all 0.2s;
    }
    .btn-simpan-badge:hover {
      background-color: var(--bs-primary);
      color: #fff;
    }

    /* Tampilan setelah di-klik (belum tersimpan) */
    .btn-simpan-badge.belum {
      background-color: #fff;
      color: #4b5563;
      border-color: var(--tn-border);
    }
    .btn-simpan-badge.belum:hover {
      background-color: var(--tn-soft);
      color: var(--bs-primary);
      border-color: var(--bs-primary);
    }

    @media (min-width: 768px) {
      .dest-card .info { padding: 12px; }
      .dest-card .info .fw-bold { font-size: .95rem; }
      .dest-card .info .small { font-size: .8rem !important; }
      .btn-more { width: 32px; height: 32px; font-size: 1rem; }
      .btn-simpan-badge { padding: 6px 12px; font-size: .8rem; }
    }

    footer { border-top: 1px solid var(--tn-border); }
  </style>
</head>

<body>

  <!-- Header -->
  <header class="border-bottom bg-white sticky-top">
    <div class="page container d-flex align-items-center justify-content-between py-2">
      <a href="<?= base_url('/'); ?>">
        <img src="<?= base_url('assets/images/logo.svg'); ?>" alt="Tripnesia, Jelajahi Indonesia, Temukan Ceritamu" height="40">
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
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('/'); ?>">Beranda</a></li>
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('cari'); ?>">Cari</a></li>
        <li class="nav-item"><a class="nav-link menu-link active" href="<?= base_url('simpan'); ?>">Simpan</a></li>
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('profile'); ?>">Profile</a></li>
      </ul>
      <div class="mt-auto">
        <a href="<?= base_url('logout'); ?>" class="btn btn-outline-secondary w-100">Keluar</a>
      </div>
    </div>
  </div>

  <main class="page container py-4">

    <!-- Judul & Deskripsi Halaman -->
    <section class="mb-4">
      <h1 class="h5 fw-bold mb-1">Tempat Wisata</h1>
      <p class="text-secondary small">
        Tempat Wisata yang sudah kamu simpan untuk dikunjungi nanti.
      </p>
    </section>

    <!-- Daftar Tempat Wisata Tersimpan (dari database) -->
    <section>
      <div class="row g-3" id="listSimpan">

        <?php foreach ($items as $d): ?>
        <div class="col-6 col-md-4 col-lg-3" data-slug="<?= esc($d['slug']); ?>">
          <div class="dest-card">
            <a href="<?= base_url('detailwisata/' . $d['slug']); ?>">
              <img src="<?= base_url('assets/images/' . $d['img']); ?>" alt="<?= esc($d['nama']); ?>">
            </a>
            <div class="info">
              <div class="fw-bold mb-1"><?= esc($d['nama']); ?></div>
              <div class="small text-secondary mb-1"><i class="bi bi-geo-alt-fill text-danger"></i> <?= esc($d['lokasi']); ?></div>
              <div class="small text-secondary"><i class="bi bi-star-fill text-warning"></i> <?= esc($d['rating']); ?> (<?= esc($d['ulasan']); ?> Ulasan)</div>

              <button type="button" class="btn-simpan-badge btn-hapus">
                <i class="bi bi-bookmark-check-fill"></i> Tersimpan
              </button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>

      <!-- Tampil kalau belum ada yang disimpan -->
      <div id="kosong" class="text-center py-5 <?= empty($items) ? '' : 'd-none'; ?>">
        <i class="bi bi-bookmark fs-1 text-secondary"></i>
        <p class="text-secondary
            <p class="text-secondary mt-2 mb-3">Belum ada tempat wisata yang disimpan.</p>
    <a href="<?= base_url('cari'); ?>" class="btn btn-primary btn-sm px-3">Cari Destinasi</a>
  </div>
    </section>

  </main>

  <footer class="text-center text-secondary small py-3 bg-white">
    <i class="bi bi-c-circle"></i> Copyright TripNesia 2026
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  // Tombol Tersimpan / Simpan = toggle. Kartu tetap tampil sampai halaman dimuat ulang.
  document.querySelectorAll(".btn-hapus").forEach(btn => {
    btn.addEventListener("click", async () => {
      const col  = btn.closest("[data-slug]");
      const slug = col.dataset.slug;

      btn.disabled = true;
      try {
        const res = await fetch("<?= base_url('simpan/toggle'); ?>", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            "X-Requested-With": "XMLHttpRequest",
            "<?= csrf_header(); ?>": "<?= csrf_hash(); ?>"
          },
          body: "slug=" + encodeURIComponent(slug)
        });

        if (res.status === 401) { location.href = "<?= base_url('login'); ?>"; return; }
        if (res.ok) {
          const d = await res.json();
          if (d.saved) {
            btn.innerHTML = '<i class="bi bi-bookmark-check-fill"></i> Tersimpan';
            btn.classList.remove("belum");
          } else {
            btn.innerHTML = '<i class="bi bi-bookmark"></i> Simpan';
            btn.classList.add("belum");
          }
        }
      } finally {
        btn.disabled = false;
      }
    });
  });
</script>
</body>
</html>