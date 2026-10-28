 <?php $login = (bool) session()->get('isLoggedIn'); ?>
 <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tripnesia - Beranda</title>

  <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "z41seo8e6r");
</script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --bs-primary: #0a84c6;
      --bs-primary-rgb: 10, 132, 198;
      --tn-border: #dfe5ee;
      --tn-soft: #f1f5fb;
    }
    body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; color: #111827; }
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

    /* Logo navbar: ukuran dikunci supaya tidak membesar */
    .brand-logo { height: 48px; width: auto; display: block; }
    @media (min-width: 768px) {
      .brand-logo { height: 56px; }
    }

    .hero h1 { font-weight: 800; line-height: 1.2; }
    .search-input { background: var(--tn-soft); border: 1px solid var(--tn-border); border-radius: 10px; }
    .feature-btn { text-decoration: none; color: #374151; font-size: .75rem; text-align: center; border: 0; background: none; }
    .feature-icon { width: 56px; height: 56px; border-radius: 16px; background: var(--tn-soft); border: 1.5px solid var(--tn-border); display: flex; align-items: center; justify-content: center; font-size: 1.25rem; margin: 0 auto 6px; transition: background .15s; }
    .feature-btn:hover .feature-icon { background: #e4ebf7; }
    .dest-card { cursor: pointer; border: 1px solid var(--tn-border); border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,.06); overflow: hidden; height: 100%; transition: transform .15s, border-color .15s; background: #fff; text-align: left; width: 100%; padding: 0; }
    .dest-card:hover { transform: translateY(-2px); }
    .dest-card.active { border-color: var(--bs-primary); box-shadow: 0 0 0 2px rgba(10,132,198,.25); }
    .dest-card img { width: 100%; aspect-ratio: 4 / 3; object-fit: cover; display: block; }
    .btn-bm { position: absolute; top: 12px; right: 12px; width: 36px; height: 36px; border-radius: 50%;
      border: 1px solid var(--tn-border); background: #fff; color: #0a84c6;
      display: flex; align-items: center; justify-content: center; }
    .btn-bm:hover { background: #f0f9ff; }
    .dest-card .info { padding: 8px; font-size: .7rem; }
    .detail-card { border: 1px solid var(--tn-border); border-radius: 14px; }
    .detail-card img { width: 100%; max-width: 110px; aspect-ratio: 1; object-fit: cover; border-radius: 10px; }
    .cost-box { background: var(--tn-soft); border: 1px solid var(--tn-border); border-radius: 10px; font-size: .8rem; }
    footer { border-top: 1px solid var(--tn-border); }
    @media (min-width: 768px) {
      .detail-card img { max-width: 160px; }
      .dest-card .info { font-size: .85rem; }
    }
  </style>
</head>

<body>

  <!-- Header -->
  <header class="border-bottom bg-white sticky-top">
    <div class="page container d-flex align-items-center justify-content-between py-2">
      <a href="<?= base_url('/'); ?>">
        <img src="<?= base_url('assets/images/logo.svg'); ?>" alt="Logo Tripnesia" class="brand-logo">
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
        <li class="nav-item"><a class="nav-link menu-link active" href="<?= base_url('/'); ?>">Beranda</a></li>
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('cari'); ?>">Cari</a></li>
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('simpan'); ?>">Simpan</a></li>
        <li class="nav-item"><a class="nav-link menu-link" href="<?= base_url('profile'); ?>">Profile</a></li>
      </ul>
      <div class="mt-auto">
        <?php if ($login): ?>
          <a href="<?= base_url('logout'); ?>" class="btn btn-outline-secondary w-100">Keluar</a>
        <?php else: ?>
          <a href="<?= base_url('login'); ?>" class="btn btn-primary w-100">Masuk</a>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <main class="page container py-4">

    <!-- Hero -->
    <section class="hero mb-4">
      <h1 class="h2">Rencanakan Liburan<br>Sesuai Budget-mu !</h1>
      <p class="text-secondary small">
        Temukan rekomendasi destinasi wisata, lihat estimasi biaya, dan atur perjalanan impianmu.
      </p>

      <form id="formCari" action="<?= base_url('cari'); ?>" method="get">
        <div class="input-group mb-2">
          <span class="input-group-text search-input border-end-0"><i class="bi bi-search text-secondary"></i></span>
          <input type="text" id="pencarian" name="pencarian" class="form-control search-input border-start-0" placeholder="Cari destinasi, kota, atau aktivitas...">
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">Cari Destinasi</button>
      </form>
    </section>

    <!-- Fitur -->
    <section id="fitur" class="mb-4">
      <div class="row g-2 text-center">
        <div class="col-3">
          <a class="feature-btn d-block" href="<?= $login ? '#detail' : base_url('login'); ?>">
            <span class="feature-icon"><i class="bi bi-credit-card"></i></span>
            Rekomendasi Budget
          </a>
        </div>
        <div class="col-3">
          <a class="feature-btn d-block" href="#destinasi">
            <span class="feature-icon"><i class="bi bi-star"></i></span>
            Destinasi Populer
          </a>
        </div>
        <div class="col-3">
          <button type="button" class="feature-btn d-block w-100" data-bs-toggle="modal" data-bs-target="#filterModal">
            <span class="feature-icon"><i class="bi bi-funnel"></i></span>
            Filter Budget
          </button>
        </div>
        <div class="col-3">
          <a class="feature-btn d-block" href="<?= base_url('simpan'); ?>">
            <span class="feature-icon"><i class="bi bi-heart"></i></span>
            Destinasi Favorit
          </a>
        </div>
      </div>
    </section>

    <!-- Destinasi populer -->
    <section id="destinasi" class="mb-4">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h2 class="h6 fw-bold mb-0">Destinasi Populer</h2>
        <small id="filterInfo" class="text-secondary"></small>
      </div>
      <div class="row g-2" id="destList">
        <div class="col-4" data-id="kebunraya" data-harga="15500">
          <button type="button" class="dest-card">
            <img src="<?= base_url('assets/images/kebunrayabogor.png'); ?>" alt="Kebun Raya Bogor">
            <div class="info">
              <div class="fw-bold">Kebun Raya</div>
              <div class="fw-semibold">Rp 15.500</div>
              <div class="text-secondary">1 Hari</div>
            </div>
          </button>
        </div>
        <div class="col-4" data-id="sawarna" data-harga="500000">
          <button type="button" class="dest-card <?= $login ? 'active' : ''; ?>">
            <img src="<?= base_url('assets/images/pantaisawarna.png'); ?>" alt="Pantai Sawarna">
            <div class="info">
              <div class="fw-bold">Pantai Sawarna</div>
              <div class="fw-semibold">Rp 500.000</div>
              <div class="text-secondary">2 Hari 1 Malam</div>
            </div>
          </button>
        </div>
        <div class="col-4" data-id="safari" data-harga="1000000">
          <button type="button" class="dest-card">
            <img src="<?= base_url('assets/images/tamansafari.png'); ?>" alt="Taman Safari Indonesia">
            <div class="info">
              <div class="fw-bold">Taman Safari Indonesia</div>
              <div class="fw-semibold">Rp 1.000.000</div>
              <div class="text-secondary">3 Hari 2 Malam</div>
            </div>
          </button>
        </div>
      </div>
      <p id="emptyMsg" class="text-secondary small text-center my-3 d-none">Tidak ada destinasi pada rentang budget ini.</p>
    </section>

    <!-- Detail destinasi (berubah saat kartu dipilih) -->
    <section id="detail" class="detail-card p-3 position-relative <?= $login ? '' : 'd-none'; ?>">
      <button type="button" class="btn-bm" id="btnBm" title="Simpan"><i class="bi bi-bookmark" id="iconBm"></i></button>
      <div class="d-flex gap-3 mb-3">
        <img id="dImg" src="<?= base_url('assets/images/pantaisawarna.png'); ?>" alt="Pantai Sawarna">
        <div>
          <h3 class="h6 fw-bold mb-1" id="dNama">Pantai Sawarna</h3>
          <div class="small text-secondary"><i class="bi bi-geo-alt"></i> <span id="dLokasi">Banten</span></div>
          <div class="fw-bold" id="dHarga">Rp 500.000 - Rp 850.000</div>
          <div class="small text-secondary" id="dDurasi">2 Hari 1 Malam</div>
        </div>
      </div>

      <div class="cost-box p-3 mb-3">
        <div class="fw-bold text-uppercase small mb-2">Rincian Estimasi Biaya (Per Orang)</div>
        <ul class="list-unstyled mb-2" id="dRincian"></ul>
        <hr class="my-2">
        <div class="d-flex justify-content-between fw-bold">
          <span>Total Estimasi</span><span id="dTotal"></span>
        </div>
      </div>

      <div class="d-flex justify-content-end">
        <a id="btnDetail" href="<?= base_url('detailwisata/pantaisawarna'); ?>" class="btn btn-primary btn-sm px-3">Lihat Destinasi</a>
      </div>
    </section>
  </main>

  <!-- Modal filter budget -->
  <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="filterModalLabel">Filter Budget</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="form-check mb-2"><input class="form-check-input" type="radio" name="budget" id="b0" value="0" checked><label class="form-check-label" for="b0">Semua budget</label></div>
          <div class="form-check mb-2"><input class="form-check-input" type="radio" name="budget" id="b1" value="100000"><label class="form-check-label" for="b1">Hingga Rp 100.000</label></div>
          <div class="form-check mb-2"><input class="form-check-input" type="radio" name="budget" id="b2" value="600000"><label class="form-check-label" for="b2">Hingga Rp 600.000</label></div>
          <div class="form-check"><input class="form-check-input" type="radio" name="budget" id="b3" value="1000000"><label class="form-check-label" for="b3">Hingga Rp 1.000.000</label></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary" id="btnTerapkan" data-bs-dismiss="modal">Terapkan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal lihat detail -->
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel">Detail Destinasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <img id="mImg" class="img-fluid rounded mb-3" alt="">
          <h6 class="fw-bold" id="mNama"></h6>
          <p class="small text-secondary mb-1" id="mLokasi"></p>
          <p class="small mb-0" id="mDeskripsi"></p>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center text-secondary small py-3">
    <i class="bi bi-c-circle"></i> Copyright TripNesia 2026
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Data dummy destinasi (front-end saja, nanti diganti data dari database lewat fetch)
    const DESTINASI = {
      kebunraya: {
        slug: "kebunrayabogor",
        nama: "Kebun Raya Bogor", lokasi: "Jawa Barat", durasi: "1 Hari",
        halaman: "<?= base_url('detailwisata/kebunrayabogor'); ?>",
        img: "<?= base_url('assets/images/kebunrayabogor.png'); ?>",
        deskripsi: "Kebun botani luas di tengah Kota Bogor, cocok untuk wisata santai bersama keluarga.",
        rincian: [["Transportasi PP", 50000], ["Penginapan", 0], ["Makan & Minum", 40000], ["Aktivitas & Tiket Masuk", 15500]]
      },
      sawarna: {
        slug: "pantaisawarna",
        nama: "Pantai Sawarna", lokasi: "Banten", durasi: "2 Hari 1 Malam",
        halaman: "<?= base_url('detailwisata/pantaisawarna'); ?>",
        img: "<?= base_url('assets/images/pantaisawarna.png'); ?>",
        deskripsi: "Pantai dengan tebing karang dan ombak besar di pesisir selatan Banten.",
        rincian: [["Transportasi PP", 300000], ["Penginapan (1 malam)", 300000], ["Makan & Minum", 150000], ["Aktivitas & Tiket Masuk", 100000]],
        min: 500000
      },
      safari: {
        slug: "tamansafari",
        nama: "Taman Safari Indonesia", lokasi: "Jawa Barat", durasi: "3 Hari 2 Malam",
        halaman: "<?= base_url('detailwisata/tamansafari'); ?>",
        img: "<?= base_url('assets/images/tamansafari.png'); ?>",
        deskripsi: "Taman safari dengan koleksi satwa dari berbagai penjuru dunia di kawasan Puncak.",
        rincian: [["Transportasi PP", 100000], ["Penginapan (2 malam)", 500000], ["Makan & Minum", 250000], ["Aktivitas & Tiket Masuk", 150000]]
      }
    };

    const rp = n => "Rp " + n.toLocaleString("id-ID");
    const $ = id => document.getElementById(id);
    const LOGIN = <?= $login ? 'true' : 'false'; ?>;
    const URL_LOGIN = "<?= base_url('login'); ?>";

    // Cari destinasi: wajib login
    $("formCari").addEventListener("submit", e => {
      if (!LOGIN) { e.preventDefault(); location.href = URL_LOGIN; }
    });
    let terpilih = "sawarna";

    // ===== Simpan destinasi =====
    // (dideklarasikan di atas supaya sudah ada sebelum tampilkan() dipanggil)
    const SIMPAN = new Set();
    const CSRF_H = "<?= csrf_header(); ?>", CSRF_V = "<?= csrf_hash(); ?>";

    function ikonSimpan() {
      const saved = SIMPAN.has(DESTINASI[terpilih].slug);
      $("iconBm").className = saved ? "bi bi-bookmark-fill" : "bi bi-bookmark";
    }

    // Tampilkan detail destinasi yang dipilih
    function tampilkan(id) {
      const d = DESTINASI[id];
      const total = d.rincian.reduce((s, r) => s + r[1], 0);
      const awal = d.min || total;
      terpilih = id;

      $("dImg").src = d.img; $("dImg").alt = d.nama;
      $("dNama").textContent = d.nama;
      $("dLokasi").textContent = d.lokasi;
      $("dDurasi").textContent = d.durasi;
      $("dHarga").textContent = awal === total ? rp(total) : rp(awal) + " - " + rp(total);
      $("dTotal").textContent = rp(total);
      $("dRincian").innerHTML = d.rincian.map(r =>
        `<li class="d-flex justify-content-between"><span>${r[0]}</span><span>${rp(r[1])}</span></li>`).join("");

      $("btnDetail").href = d.halaman;

      document.querySelectorAll("#destList .dest-card").forEach(c => c.classList.remove("active"));
      document.querySelector(`#destList [data-id="${id}"] .dest-card`).classList.add("active");
      ikonSimpan();
    }

    // Klik kartu destinasi -> detail berubah
    document.querySelectorAll("#destList [data-id]").forEach(col => {
      col.addEventListener("click", () => {
        if (!LOGIN) { location.href = URL_LOGIN; return; }
        tampilkan(col.dataset.id);
      });
    });
    // Filter budget
    $("btnTerapkan").addEventListener("click", () => {
      if (!LOGIN) { location.href = URL_LOGIN; return; }
      const max = Number(document.querySelector('input[name="budget"]:checked').value);
      let tampil = 0;
      document.querySelectorAll("#destList [data-id]").forEach(col => {
        const ok = max === 0 || Number(col.dataset.harga) <= max;
        col.classList.toggle("d-none", !ok);
        if (ok) tampil++;
      });
      $("emptyMsg").classList.toggle("d-none", tampil > 0);
      $("filterInfo").textContent = max ? "Maks. " + rp(max) : "";
    });

    // Ambil daftar yang sudah disimpan, lalu perbarui ikon bookmark
    fetch("<?= base_url('simpan/daftar'); ?>").then(r => r.json()).then(d => {
      d.slugs.forEach(s => SIMPAN.add(s));
      ikonSimpan();
    });

    // Klik ikon bookmark = simpan / hapus
    $("btnBm").addEventListener("click", async () => {
      const slug = DESTINASI[terpilih].slug;
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
      const d = await res.json();
      d.saved ? SIMPAN.add(slug) : SIMPAN.delete(slug);
      ikonSimpan();
    });

    if (LOGIN) tampilkan(terpilih);
  </script>
</body>
</html>