<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tripnesia - Bantuan &amp; Support</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bs-primary: #0a84c6;
            --bs-primary-rgb: 10, 132, 198;
            --tn-border: #dfe5ee;
            --tn-soft: #dbeafe;
            --tn-text: #111827;
            --tn-muted: #6b7280;
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            color: var(--tn-text);
            background: #fff;
        }

        /* Ukuran halaman sama dengan halaman lain */
        .page { max-width: 960px; }

        /* Lebar isi halaman (lebih lebar dari sebelumnya, ubah angka ini kalau mau disesuaikan) */
        .content { max-width: 640px; }

        .btn-back {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            border: 1px solid var(--tn-border);
            background: #fff;
            color: #111827;
            text-decoration: none;
            transition: border-color .15s, color .15s, background .15s;
        }

        .btn-back:hover {
            border-color: var(--bs-primary);
            color: var(--bs-primary);
            background: rgba(10, 132, 198, .08);
        }

        /* Judul */
        .page-title { margin-bottom: 22px; }

        .page-title h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
        }

        .page-title p {
            margin: 4px 0 0;
            font-size: 13px;
            line-height: 1.4;
            color: var(--tn-muted);
        }

        /* Pencarian */
        .search-wrap {
            position: relative;
            margin-bottom: 26px;
        }

        .search-wrap i {
            position: absolute;
            top: 50%;
            left: 13px;
            transform: translateY(-50%);
            font-size: 15px;
            color: var(--tn-muted);
        }

        .search-wrap .form-control {
            width: 100%;
            height: 43px;
            padding: 10px 12px 10px 38px;
            border: 1px solid #c8ced5;
            border-radius: 8px;
            background: #f9fafb;
            font-size: 13px;
        }

        .search-wrap .form-control::placeholder { color: #9ca3af; }

        .search-wrap .form-control:focus {
            border-color: var(--bs-primary);
            box-shadow: 0 0 0 3px rgba(10, 132, 198, .12);
            background: #fff;
        }

        .section-title {
            margin: 0 0 14px;
            font-size: 15px;
            font-weight: 700;
        }

        .block { margin-bottom: 28px; }

        /* ===== Kartu FAQ (accordion) ===== */
        .faq-item {
            border: 1px solid #eef0f4;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 1px 5px rgba(0, 0, 0, .10);
            overflow: hidden;
            transition: border-color .15s, box-shadow .15s;
        }

        .faq-item:hover,
        .faq-item.open {
            border-color: var(--bs-primary);
            box-shadow: 0 2px 10px rgba(10, 132, 198, .18);
        }

        .faq-toggle {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 14px;
            border: 0;
            background: transparent;
            color: inherit;
            text-align: left;
        }

        .faq-toggle:focus-visible {
            outline: 2px solid var(--bs-primary);
            outline-offset: -2px;
        }

        .faq-toggle h3 {
            margin: 0 0 3px;
            font-size: 14px;
            font-weight: 700;
        }

        .faq-toggle p {
            margin: 0;
            font-size: 12.5px;
            line-height: 1.45;
            color: var(--tn-muted);
        }

        .faq-toggle .chevron {
            font-size: 14px;
            color: #9ca3af;
            transition: transform .2s;
        }

        .faq-toggle[aria-expanded="true"] .chevron {
            transform: rotate(180deg);
            color: var(--bs-primary);
        }

        /* Isi jawaban */
        .faq-answer {
            margin: 0 14px 14px;
            padding: 12px;
            border-left: 3px solid var(--bs-primary);
            border-radius: 0 8px 8px 0;
            background: #f4f9fd;
            font-size: 13px;
            line-height: 1.55;
        }

        .faq-answer ul {
            margin: 6px 0 0;
            padding-left: 18px;
        }

        .faq-answer li { margin-bottom: 2px; }

        .faq-answer a {
            color: var(--bs-primary);
            font-weight: 600;
            text-decoration: none;
        }

        .faq-answer a:hover { text-decoration: underline; }

        .icon-box {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #bfdbfe;
            border-radius: 8px;
            background: var(--tn-soft);
            color: var(--bs-primary);
            font-size: 18px;
        }

        .empty-msg {
            padding: 14px;
            text-align: center;
            font-size: 13px;
            color: var(--tn-muted);
        }

        /* ===== Kartu kontak ===== */
        .contact-row {
            display: flex;
            justify-content: center;
            gap: 16px;
        }

        .contact-card {
            flex: 1;
            max-width: 220px;
            padding: 16px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 1px 5px rgba(0, 0, 0, .10);
            text-align: center;
        }

        .contact-card .icon-box {
            margin: 0 auto 10px;
            background: #fff;
            border: 1.5px solid var(--bs-primary);
        }

        .contact-card h3 {
            margin: 0 0 10px;
            font-size: 14px;
            font-weight: 700;
        }

        .btn-contact {
            display: block;
            padding: 8px 0;
            border-radius: 6px;
            background: var(--tn-soft);
            color: var(--bs-primary);
            font-size: 12.5px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-contact:hover {
            background: var(--bs-primary);
            color: #fff;
        }

        footer {
            border-top: 1px solid var(--tn-border);
            background: #f8fafc;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <header class="border-bottom bg-white">
        <div class="page container py-2">
            <a href="<?= base_url('/'); ?>">
                <img src="<?= base_url('assets/images/logo.svg'); ?>"
                     alt="Tripnesia, Jelajahi Indonesia, Temukan Ceritamu" height="40">
            </a>
        </div>
    </header>

    <main class="page container py-3 flex-grow-1">

        <!-- Tombol kembali ke profil -->
        <a href="<?= base_url('profile'); ?>" class="btn-back mb-2" aria-label="Kembali ke Profil">
            <i class="bi bi-chevron-left"></i>
        </a>

        <div class="content mx-auto pt-2 pb-3">

            <!-- Judul -->
            <section class="page-title" aria-labelledby="judul-bantuan">
                <h1 id="judul-bantuan">Bantuan &amp; Support</h1>
                <p>Butuh bantuan? Temukan jawaban atas pertanyaanmu atau hubungi kami.</p>
            </section>

            <!-- Pencarian (menyaring daftar pertanyaan) -->
            <form id="searchForm" action="#" method="get" role="search">
                <label for="search-help" class="visually-hidden">Cari bantuan</label>
                <div class="search-wrap">
                    <i class="bi bi-search"></i>
                    <input type="search" class="form-control" id="search-help" name="q"
                           placeholder="Cari pertanyaan, topik, atau kata kunci..."
                           autocomplete="off">
                </div>
            </form>

            <!-- Pertanyaan yang sering diajukan -->
            <section class="block" aria-labelledby="faq">
                <h2 id="faq" class="section-title">Pertanyaan yang sering diajukan</h2>

                <div class="d-grid gap-2" id="faqList">

                    <!-- 1 -->
                    <div class="faq-item">
                        <button class="faq-toggle collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#jawab1"
                                aria-expanded="false" aria-controls="jawab1">
                            <span class="icon-box"><i class="bi bi-link-45deg"></i></span>
                            <div class="flex-grow-1">
                                <h3>Cara menemukan destinasi sesuai budget</h3>
                                <p>Dapatkan rekomendasi tempat wisata yang cocok dengan budget kamu.</p>
                            </div>
                            <i class="bi bi-chevron-down chevron"></i>
                        </button>
                        <div id="jawab1" class="collapse" data-bs-parent="#faqList">
                            <div class="faq-answer">
                                Gunakan fitur <strong>Filter Budget</strong> di halaman Beranda, lalu pilih batas
                                biaya perjalananmu. Daftar destinasi akan otomatis menyesuaikan.
                                <ul>
                                    <li>Buka halaman <a href="<?= base_url('/'); ?>">Beranda</a> dan ketuk ikon Filter Budget.</li>
                                    <li>Pilih rentang budget yang kamu inginkan, lalu ketuk <em>Terapkan</em>.</li>
                                    <li>Lihat rincian estimasi biaya per orang di setiap destinasi.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="faq-item">
                        <button class="faq-toggle collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#jawab2"
                                aria-expanded="false" aria-controls="jawab2">
                            <span class="icon-box"><i class="bi bi-bullseye"></i></span>
                            <div class="flex-grow-1">
                                <h3>Rekomendasi destinasi populer di Indonesia</h3>
                                <p>Lihat destinasi favorit berdasarkan kategori dan musim terbaik.</p>
                            </div>
                            <i class="bi bi-chevron-down chevron"></i>
                        </button>
                        <div id="jawab2" class="collapse" data-bs-parent="#faqList">
                            <div class="faq-answer">
                                Destinasi populer ditampilkan di bagian <strong>Destinasi Populer</strong> pada
                                Beranda, misalnya Kebun Raya Bogor, Pantai Sawarna, dan Taman Safari Indonesia.
                                Ketuk salah satu kartu untuk melihat lokasi, durasi, dan estimasi biayanya.
                            </div>
                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="faq-item">
                        <button class="faq-toggle collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#jawab3"
                                aria-expanded="false" aria-controls="jawab3">
                            <span class="icon-box"><i class="bi bi-gem"></i></span>
                            <div class="flex-grow-1">
                                <h3>Tips liburan hemat</h3>
                                <p>Panduan mengatur anggaran, transportasi, dan akomodasi agar liburan tetap seru.</p>
                            </div>
                            <i class="bi bi-chevron-down chevron"></i>
                        </button>
                        <div id="jawab3" class="collapse" data-bs-parent="#faqList">
                            <div class="faq-answer">
                                Beberapa cara agar liburan tetap hemat:
                                <ul>
                                    <li>Tentukan total budget dan bagi ke transportasi, penginapan, makan, dan tiket.</li>
                                    <li>Berangkat di hari kerja karena harga biasanya lebih murah.</li>
                                    <li>Pesan penginapan dan transportasi jauh-jauh hari.</li>
                                    <li>Berbagi biaya dengan teman atau keluarga.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="faq-item">
                        <button class="faq-toggle collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#jawab4"
                                aria-expanded="false" aria-controls="jawab4">
                            <span class="icon-box"><i class="bi bi-calendar-event"></i></span>
                            <div class="flex-grow-1">
                                <h3>Waktu terbaik untuk berkunjung</h3>
                                <p>Kapan waktu paling pas ke suatu destinasi wisata?</p>
                            </div>
                            <i class="bi bi-chevron-down chevron"></i>
                        </button>
                        <div id="jawab4" class="collapse" data-bs-parent="#faqList">
                            <div class="faq-answer">
                                Umumnya musim kemarau (sekitar April sampai Oktober) cocok untuk wisata pantai dan
                                alam terbuka. Hindari akhir pekan panjang dan libur sekolah kalau ingin suasana
                                lebih tenang dan harga lebih terjangkau.
                            </div>
                        </div>
                    </div>

                    <!-- 5 -->
                    <div class="faq-item">
                        <button class="faq-toggle collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#jawab5"
                                aria-expanded="false" aria-controls="jawab5">
                            <span class="icon-box"><i class="bi bi-diamond"></i></span>
                            <div class="flex-grow-1">
                                <h3>Itinerary &amp; paket perjalanan</h3>
                                <p>Contoh itinerary untuk berbagai durasi perjalanan.</p>
                            </div>
                            <i class="bi bi-chevron-down chevron"></i>
                        </button>
                        <div id="jawab5" class="collapse" data-bs-parent="#faqList">
                            <div class="faq-answer">
                                Setiap destinasi menampilkan durasi yang disarankan, misalnya 1 hari, 2 hari 1
                                malam, atau 3 hari 2 malam, lengkap dengan rincian estimasi biaya. Simpan
                                destinasi favoritmu di halaman <a href="<?= base_url('simpan'); ?>">Simpan</a> untuk
                                membandingkannya nanti.
                            </div>
                        </div>
                    </div>

                    <p id="emptyMsg" class="empty-msg d-none mb-0">
                        Tidak ada pertanyaan yang cocok dengan pencarianmu.
                    </p>
                </div>
            </section>

            <!-- Hubungi Kami -->
            <section class="block" aria-labelledby="hubungi-kami">
                <h2 id="hubungi-kami" class="section-title">Hubungi Kami</h2>

                <div class="contact-row">
                    <article class="contact-card">
                        <span class="icon-box"><i class="bi bi-envelope"></i></span>
                        <h3>Email</h3>
                        <a href="mailto:cs@tripnesia.co.id" class="btn-contact">Cek Email</a>
                    </article>

                    <article class="contact-card">
                        <span class="icon-box"><i class="bi bi-telephone"></i></span>
                        <h3>Telepon</h3>
                        <a href="tel:+6281212345678" class="btn-contact">Hubungi</a>
                    </article>
                </div>
            </section>


        </div>

    </main>

    <footer class="text-center text-secondary small py-3">
        <i class="bi bi-c-circle"></i> Copyright TripNesia 2026
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const items = document.querySelectorAll("#faqList .faq-item");

        // Tandai kartu yang sedang terbuka (untuk sorotan biru)
        items.forEach(item => {
            const panel = item.querySelector(".collapse");
            panel.addEventListener("show.bs.collapse", () => item.classList.add("open"));
            panel.addEventListener("hide.bs.collapse", () => item.classList.remove("open"));
        });

        // Pencarian: saring pertanyaan berdasarkan judul, deskripsi, dan isi jawaban
        const searchInput = document.getElementById("search-help");

        function saring() {
            const kata = searchInput.value.trim().toLowerCase();
            let tampil = 0;

            items.forEach(item => {
                const cocok = item.textContent.toLowerCase().includes(kata);
                item.classList.toggle("d-none", !cocok);
                if (cocok) tampil++;
            });

            document.getElementById("emptyMsg").classList.toggle("d-none", tampil > 0);
        }

        searchInput.addEventListener("input", saring);
        document.getElementById("searchForm").addEventListener("submit", e => {
            e.preventDefault();
            saring();
        });
    </script>
</body>
</html>