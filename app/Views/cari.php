<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cari Destinasi - Tripnesia</title>

  <!-- Bootstrap CSS & Icons -->
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
    }

    .btn-primary {
      --bs-btn-bg: #0a84c6;
      --bs-btn-border-color: #0a84c6;
      --bs-btn-hover-bg: #0873ab;
      --bs-btn-hover-border-color: #0873ab;
    }

    .btn-outline-secondary {
      --bs-btn-color: #4b5563;
      --bs-btn-border-color: var(--tn-border);
    }

    .page {
      max-width: 960px;
    }

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

    /* Search & Filter Styles */
    .search-input {
      background: var(--tn-soft);
      border: 1px solid var(--tn-border);
      border-radius: 10px;
      font-size: .875rem;
    }

    .filter-pills {
      display: flex;
      gap: 8px;
      overflow-x: auto;
      padding-bottom: 6px;
      white-space: nowrap;
    }

    .filter-pills::-webkit-scrollbar {
      display: none;
    }

    .filter-pill {
      background: #fff;
      border: 1px solid var(--tn-border);
      padding: 6px 16px;
      border-radius: 20px;
      font-size: .8rem;
      font-weight: 500;
      color: #4b5563;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      transition: all .15s;
    }

    .filter-pill.active {
      background-color: var(--bs-primary);
      color: #fff;
      border-color: var(--bs-primary);
    }

    .filter-pill:hover {
      border-color: #9ca3af;
    }

    /* Filter Box Panel */
    .filter-panel {
      background: #fff;
      border: 1px solid var(--tn-border);
      border-radius: 12px;
      padding: 16px;
      margin-top: 16px;
      margin-bottom: 24px;
      box-shadow: 0 2px 6px rgba(0,0,0,.02);
      display: none;
    }

    .filter-panel.show {
      display: block;
    }

    .filter-panel h6 {
      font-size: .85rem;
      font-weight: 600;
      color: #4b5563;
      margin-bottom: 12px;
    }

    /* Recommendation Cards */
    .dest-card {
      border: 1px solid var(--tn-border);
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,.04);
      overflow: hidden;
      background: #fff;
      padding: 12px;
      display: flex;
      gap: 12px;
      position: relative;
      transition: transform .15s, border-color .15s;
    }

    .dest-card:hover {
      transform: translateY(-2px);
      border-color: #cbd5e1;
    }

    .btn-bm {
      position: absolute; top: 10px; right: 10px;
      width: 34px; height: 34px; border-radius: 50%;
      border: 1px solid var(--tn-border); background: #fff;
      color: #0a84c6; display: flex; align-items: center; justify-content: center;
      box-shadow: 0 2px 4px rgba(0,0,0,.08);
    }
    .btn-bm:hover { background: #f0f9ff; }

    .dest-card img {
      width: 90px;
      height: 90px;
      border-radius: 10px;
      object-fit: cover;
      flex-shrink: 0;
    }

    .card-content {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      flex: 1;
    }

    .card-info h2 {
      font-size: .95rem;
      font-weight: 700;
      color: #111827;
      margin-bottom: 2px;
    }

    .card-info .location {
      font-size: .75rem;
      color: #6b7280;
      margin-bottom: 4px;
    }

    .card-info .price {
      font-size: .85rem;
      font-weight: 700;
      color: #111827;
      margin-bottom: 2px;
    }

    .card-info .duration {
      font-size: .75rem;
      color: #6b7280;
    }

    .detail-btn {
      align-self: flex-end;
      padding: 4px 10px;
      border: 1px solid #38bdf8;
      color: #0284c7;
      border-radius: 6px;
      font-size: .75rem;
      font-weight: 600;
      text-decoration: none;
      background: #fff;
      transition: background .15s;
    }

    .detail-btn:hover {
      background-color: #f0f9ff;
    }

    footer {
      border-top: 1px solid var(--tn-border);
    }
  </style>
</head>

<body>

  <!-- Header -->
  <header class="border-bottom bg-white sticky-top">
    <div class="page container d-flex align-items-center justify-content-between py-2">
      <a href="<?= base_url('/'); ?>">
        <img src="<?= base_url('assets/images/logo.svg'); ?>" alt="Tripnesia, Jelajahi Indonesia, Temukan Ceritamu" height="36">
      </a>
      <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuDrawer" aria-controls="menuDrawer" aria-label="Menu">
        <i class="bi bi-list fs-5"></i>
      </button>
    </div>
  </header>

  <!-- Drawer Menu -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="menuDrawer" aria-labelledby="menuDrawerLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="menuDrawerLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('/'); ?>">Beranda</a></li>
        <li class="nav-item"><a class="nav-link menu-link active" href="<?= base_url('cari'); ?>">Cari</a></li>
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('simpan'); ?>">Simpan</a></li>
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('profile'); ?>">Profile</a></li>
      </ul>
    </div>
  </div>

  <main class="page container py-4">

    <!-- Form Pencarian & Filter Pills -->
    <form action="#" method="post" class="mb-3">
      <div class="input-group mb-3">
        <span class="input-group-text search-input border-end-0"><i class="bi bi-search text-secondary"></i></span>
        <input type="search" id="cari" name="cari" class="form-control search-input border-start-0" placeholder="Cari destinasi, kota, atau aktivitas...">
        <button type="submit" class="d-none">Cari</button>
      </div>

      <div class="filter-pills" id="filterPills">
        <button type="button" class="filter-pill active" data-target="semua">Semua</button>
        <button type="button" class="filter-pill" data-target="budget">Budget</button>
        <button type="button" class="filter-pill" data-target="durasi">Durasi</button>
        <button type="button" class="filter-pill" data-target="jenis">Jenis</button>
      </div>
    </form>

    <!-- Panel Filter Budget -->
    <div class="filter-panel" id="panel-budget">
      <h6>Pilih Rentang Budget</h6>
      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="r_budget" id="b1" value="50000">
        <label class="form-check-label small" for="b1">Rp 50.000 - Rp 100.000</label>
      </div>
      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="r_budget" id="b2" value="100000">
        <label class="form-check-label small" for="b2">Rp 100.000 - Rp 250.000</label>
      </div>
      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="r_budget" id="b3" value="500000" checked>
        <label class="form-check-label small" for="b3">Rp 500.000 - Rp 800.000</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="r_budget" id="b4" value="600000">
        <label class="form-check-label small" for="b4">Rp 600.000 - Rp 1.000.000</label>
      </div>
    </div>

    <!-- Panel Filter Durasi -->
    <div class="filter-panel" id="panel-durasi">
      <h6>Pilih Durasi</h6>
      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="r_durasi" id="d1" value="1-hari">
        <label class="form-check-label small" for="d1">1 Hari</label>
      </div>
      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="r_durasi" id="d2" value="2-hari" checked>
        <label class="form-check-label small" for="d2">2 Hari 1 Malam</label>
      </div>
      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="r_durasi" id="d3" value="3-hari">
        <label class="form-check-label small" for="d3">3 Hari 2 Malam</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="r_durasi" id="d4" value="lebih">
        <label class="form-check-label small" for="d4">Lebih dari 3 hari</label>
      </div>
    </div>

    <!-- Panel Filter Jenis -->
    <div class="filter-panel" id="panel-jenis">
      <h6>Pilih Jenis Destinasi</h6>
      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="r_jenis" id="j1" value="pantai" checked>
        <label class="form-check-label small" for="j1">Pantai</label>
      </div>
      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="r_jenis" id="j2" value="air-terjun">
        <label class="form-check-label small" for="j2">Air Terjun</label>
      </div>
      <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="r_jenis" id="j3" value="kebun-binatang">
        <label class="form-check-label small" for="j3">Kebun Binatang</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="r_jenis" id="j4" value="gunung">
        <label class="form-check-label small" for="j4">Gunung</label>
      </div>
    </div>

    <!-- Hasil Rekomendasi -->
    <section>
      <div class="mb-3">
        <h1 class="h6 fw-bold mb-0">Hasil Rekomendasi</h1>
      </div>

      <!-- Daftar Destinasi -->
      <ul class="list-unstyled d-flex flex-column gap-3" id="destinationList">
        <!-- Item 1: Curug Cimahi -->
        <li class="dest-item" data-slug="curugcimahi" data-category="air-terjun" data-duration="1-hari" data-budget="250000">
          <article class="dest-card">
            <img src="<?= base_url('assets/images/curugcimahi.png'); ?>" alt="Curug Cimahi">
            <button type="button" class="btn-bm" title="Simpan"><i class="bi bi-bookmark"></i></button>
            <div class="card-content">
              <div class="card-info">
                <h2>Curug Cimahi</h2>
                <p class="location"><i class="bi bi-geo-alt"></i> Bandung</p>
                <p class="price">Rp 150.000 - Rp 250.000</p>
                <p class="duration"><i class="bi bi-clock"></i> 1 Hari</p>
              </div>
              <a href="<?= base_url('detailwisata/curugcimahi'); ?>" class="detail-btn">Lihat Detail</a>
            </div>
          </article>
        </li>
        <!-- Item 2: Kebun Raya Bogor -->
        <li class="dest-item" data-slug="kebunrayabogor" data-category="kebun-binatang" data-duration="1-hari" data-budget="50000">
          <article class="dest-card">
            <img src="<?= base_url('assets/images/kebunrayabogor.png'); ?>" alt="Kebun Raya Bogor">
            <button type="button" class="btn-bm" title="Simpan"><i class="bi bi-bookmark"></i></button>
            <div class="card-content">
              <div class="card-info">
                <h2>Kebun Raya Bogor</h2>
                <p class="location"><i class="bi bi-geo-alt"></i> Bogor</p>
                <p class="price">Rp 15.500 - Rp 50.000</p>
                <p class="duration"><i class="bi bi-clock"></i> 1 hari</p>
              </div>
              <a href="<?= base_url('detailwisata/kebunrayabogor'); ?>" class="detail-btn">Lihat Detail</a>
            </div>
          </article>
        </li>
        <!-- Item 3: Pantai Sawarna -->
        <li class="dest-item" data-slug="pantaisawarna" data-category="pantai" data-duration="2-hari" data-budget="850000">
          <article class="dest-card">
            <img src="<?= base_url('assets/images/pantaisawarna.png'); ?>" alt="Pantai Sawarna">
            <button type="button" class="btn-bm" title="Simpan"><i class="bi bi-bookmark"></i></button>
            <div class="card-content">
              <div class="card-info">
                <h2>Pantai Sawarna</h2>
                <p class="location"><i class="bi bi-geo-alt"></i> Banten</p>
                <p class="price">Rp 500.000 - Rp 850.000</p>
                <p class="duration"><i class="bi bi-clock"></i> 2 Hari 1 Malam</p>
              </div>
              <a href="<?= base_url('detailwisata/pantaisawarna'); ?>" class="detail-btn">Lihat Detail</a>
            </div>
          </article>
        </li>
        <!-- Item 4: Taman Safari -->
        <li class="dest-item" data-slug="tamansafari" data-category="kebun-binatang" data-duration="2-hari" data-budget="1000000">
          <article class="dest-card">
            <img src="<?= base_url('assets/images/tamansafari.png'); ?>" alt="Taman Safari Indonesia">
            <button type="button" class="btn-bm" title="Simpan"><i class="bi bi-bookmark"></i></button>
            <div class="card-content">
              <div class="card-info">
                <h2>Taman Safari Indonesia</h2>
                <p class="location"><i class="bi bi-geo-alt"></i> Cisarua, Kab Bogor</p>
                <p class="price">Rp 600.000 - Rp 1.000.000</p>
                <p class="duration"><i class="bi bi-clock"></i> 2 Hari 1 Malam</p>
              </div>
              <a href="<?= base_url('detailwisata/tamansafari'); ?>" class="detail-btn">Lihat Detail</a>
            </div>
          </article>
        </li>
      </ul>

      <!-- Empty state: muncul kalau hasil pencarian kosong -->
      <div id="emptyState" class="text-center py-5 d-none">
        <p class="mb-3">Yah, destinasi tidak ditemukan <i class="bi bi-search"></i></p>
        <button type="button" id="btnReset" class="btn btn-outline-secondary btn-sm">Reset Pencarian</button>
      </div>
    </section>
  </main>

  <footer class="text-center text-secondary small py-3 bg-white">
    <i class="bi bi-c-circle"></i> Copyright TripNesia 2026
  </footer>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script pencarian & filter -->
  <script>
    const inputCari  = document.getElementById('cari');
    const formCari   = inputCari.closest('form');
    const pills      = document.querySelectorAll('.filter-pill');
    const panels     = document.querySelectorAll('.filter-panel');
    const destItems  = document.querySelectorAll('.dest-item');
    const emptyState = document.getElementById('emptyState');
    const btnReset   = document.getElementById('btnReset');

    // Rentang budget tiap pilihan (sesuai label di panel Budget)
    const rentangBudget = {
      b1: [50000, 100000],
      b2: [100000, 250000],
      b3: [500000, 800000],
      b4: [600000, 1000000]
    };

    // "Rp 150.000 - Rp 250.000" -> [150000, 250000]
    function ambilAngka(teks) {
      return (teks.match(/[\d.]+/g) || []).map(n => parseInt(n.replace(/\./g, ''), 10));
    }

    // Satu fungsi yang menggabungkan pencarian + filter yang aktif
    function terapkanFilter() {
      const kataKunci = inputCari.value.trim().toLowerCase();
      const pillAktif = document.querySelector('.filter-pill.active').dataset.target;
      let adaHasil = false;

      destItems.forEach(item => {
        const nama   = item.querySelector('h2').textContent.toLowerCase();
        const lokasi = item.querySelector('.location').textContent.toLowerCase();
        const jenis  = item.dataset.category.replace(/-/g, ' ');

        // 1) Pencarian kata kunci: nama, lokasi, atau jenis
        let cocok = (nama + ' ' + lokasi + ' ' + jenis).includes(kataKunci);

        // 2) Filter budget (rentang harga kartu beririsan dengan rentang pilihan)
        if (cocok && pillAktif === 'budget') {
          const radio = document.querySelector('input[name="r_budget"]:checked');
          if (radio) {
            const [minR, maxR] = rentangBudget[radio.id];
            const [minH, maxH] = ambilAngka(item.querySelector('.price').textContent);
            cocok = minH <= maxR && maxH >= minR;
          }
        }

        // 3) Filter durasi
        if (cocok && pillAktif === 'durasi') {
          const radio = document.querySelector('input[name="r_durasi"]:checked');
          if (radio) cocok = item.dataset.duration === radio.value;
        }

        // 4) Filter jenis
        if (cocok && pillAktif === 'jenis') {
          const radio = document.querySelector('input[name="r_jenis"]:checked');
          if (radio) cocok = item.dataset.category === radio.value;
        }

        item.classList.toggle('d-none', !cocok);
        if (cocok) adaHasil = true;
      });

      emptyState.classList.toggle('d-none', adaHasil);
    }

    // Klik tab Semua / Budget / Durasi / Jenis
    pills.forEach(pill => {
      pill.addEventListener('click', () => {
        pills.forEach(p => p.classList.remove('active'));
        pill.classList.add('active');

        panels.forEach(panel => panel.classList.remove('show'));
        const target = pill.dataset.target;
        if (target !== 'semua') {
          document.getElementById('panel-' + target).classList.add('show');
        }
        terapkanFilter();
      });
    });

    // Ganti pilihan radio di dalam panel
    document.querySelectorAll('.filter-panel input[type="radio"]').forEach(radio => {
      radio.addEventListener('change', terapkanFilter);
    });

    // Ketik di kolom cari (juga saat klik tombol X di kolom cari)
    inputCari.addEventListener('input', terapkanFilter);
    inputCari.addEventListener('search', terapkanFilter);

    // Tekan Enter jangan sampai memuat ulang halaman
    formCari.addEventListener('submit', (e) => {
      e.preventDefault();
      terapkanFilter();
    });

    // Tombol Reset di empty state
    btnReset.addEventListener('click', () => {
      inputCari.value = '';
      pills.forEach(p => p.classList.remove('active'));
      document.querySelector('.filter-pill[data-target="semua"]').classList.add('active');
      panels.forEach(panel => panel.classList.remove('show'));
      terapkanFilter();
    });
  </script>
  <script>
  const CSRF_H = "<?= csrf_header(); ?>", CSRF_V = "<?= csrf_hash(); ?>";

  function setIkon(btn, saved) {
    btn.querySelector("i").className = saved ? "bi bi-bookmark-fill" : "bi bi-bookmark";
  }

  // Tandai yang sudah disimpan
  fetch("<?= base_url('simpan/daftar'); ?>").then(r => r.json()).then(d => {
    document.querySelectorAll(".dest-item").forEach(li => {
      setIkon(li.querySelector(".btn-bm"), d.slugs.includes(li.dataset.slug));
    });
  });

  // Klik ikon = simpan / hapus
  document.querySelectorAll(".dest-item .btn-bm").forEach(btn => {
    btn.addEventListener("click", async () => {
      const slug = btn.closest(".dest-item").dataset.slug;
      const res = await fetch("<?= base_url('simpan/toggle'); ?>", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
          "X-Requested-With": "XMLHttpRequest",
          [CSRF_H]: CSRF_V
        },
        body: "slug=" + encodeURIComponent(slug)
      });
      if (res.status === 401) { location.href = "<?= base_url('login'); ?>"; return; }
      setIkon(btn, (await res.json()).saved);
    });
  });
</script>
</body>
</html>