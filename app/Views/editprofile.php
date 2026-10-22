<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profil - TripNesia</title>

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
    .btn-primary { --bs-btn-bg: #0a84c6; --bs-btn-border-color: #0a84c6; --bs-btn-hover-bg: #0873ab; --bs-btn-hover-border-color: #0873ab; --bs-btn-active-bg: #0873ab; --bs-btn-disabled-bg: #0a84c6; --bs-btn-disabled-border-color: #0a84c6; }
    .btn-outline-secondary { --bs-btn-color: #4b5563; --bs-btn-border-color: var(--tn-border); }

    .page { max-width: 960px; }
    .content { max-width: 420px; }

    .btn-back { width: 36px; height: 36px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; padding: 0; border: 1px solid var(--tn-border); background: #fff; color: #111827; text-decoration: none; }

    /* Avatar */
    .avatar-wrap { position: relative; width: 150px; height: 150px; margin: 0 auto; }
    .avatar { width: 100%; height: 100%; border-radius: 50%; border: 8px solid #0a84c6; background: #fff; display: flex; align-items: center; justify-content: center; overflow: hidden; color: #374151; font-size: 4.5rem; }
    .avatar img { width: 100%; height: 100%; object-fit: cover; }
    .btn-camera { position: absolute; right: -4px; bottom: 8px; width: 34px; height: 34px; border-radius: 50%; border: 0; background: #9fd0f2; color: #111827; display: flex; align-items: center; justify-content: center; font-size: .9rem; box-shadow: 0 2px 4px rgba(0,0,0,.15); }

    /* Baris data */
    .field-row { display: flex; align-items: center; gap: 12px; padding: 14px 4px; border-bottom: 1px solid #c9cdd1; }
    .field-row:first-child { border-top: 1px solid #c9cdd1; }
    .field-icon { width: 30px; height: 30px; border-radius: 8px; background: #8cc4f0; color: #fff; display: flex; align-items: center; justify-content: center; font-size: .95rem; flex-shrink: 0; }
    .field-body { flex: 1; min-width: 0; }
    .field-label { font-size: .7rem; color: #6b7280; display: block; margin-bottom: 2px; }
    .field-input { width: 100%; border: 1px solid transparent; border-radius: 8px; background: transparent; padding: 2px 6px; margin-left: -6px; font-size: .85rem; color: #111827; }
    .field-input:focus { outline: none; }
    .field-input::placeholder { color: #9ca3af; }
    .field-input:not([readonly]) { background: #f9fafb; border-color: #c8ced5; padding: 6px 8px; margin-left: 0; }
    .field-input:not([readonly]):focus { border-color: #0a84c6; box-shadow: 0 0 0 3px rgba(10,132,198,.12); background: #fff; }
    .field-input:not([readonly]):invalid { border-color: #dc3545; }
    .btn-edit, .btn-eye { border: 0; background: transparent; color: #374151; font-size: 1rem; padding: 6px; border-radius: 8px; }
    .btn-edit:hover, .btn-eye:hover { background: var(--tn-soft); }
    .btn-edit.editing { color: #0a84c6; }

    #toast-wrap { position: fixed; top: 64px; left: 0; right: 0; z-index: 1090; display: flex; justify-content: center; pointer-events: none; }
    #toast-wrap .toast { pointer-events: auto; }
    footer { border-top: 1px solid var(--tn-border); background: #f8fafc; }
  </style>
</head>

<body class="d-flex flex-column min-vh-100">

  <!-- Header -->
  <header class="border-bottom bg-white">
    <div class="page container py-2">
      <a href="<?= base_url('beranda.php') ?>" class="menu-item">
        <img src="<?= base_url('assets/images/logo.svg') ?>" alt="Tripnesia..." height="40">
      </a>
    </div>
  </header>

  <!-- Toast simpan -->
  <div id="toast-wrap">
    <div id="simpanToast" class="toast align-items-center bg-white border shadow" role="status" aria-live="polite" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <i class="bi bi-check-circle-fill text-success me-2"></i>
          <span id="toastMsg"></span>
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Tutup"></button>
      </div>
    </div>
  </div>

  <main class="page container py-3 flex-grow-1">

    <a href="<?= base_url('profile') ?>" class="btn-back mb-2" aria-label="Kembali ke Profil">
      <i class="bi bi-chevron-left"></i>
    </a>

    <div class="content mx-auto">

      <!-- Foto & nama -->
      <section aria-labelledby="profil-pengguna" class="text-center mb-4">
        <h1 id="profil-pengguna" class="visually-hidden">Edit Profil</h1>

        <div class="avatar-wrap mb-3">
          <div class="avatar" id="avatar" role="img" aria-label="Foto profil pengguna">
            <i class="bi bi-person"></i>
          </div>
          <button type="button" class="btn-camera" id="btnCamera" aria-label="Ubah foto profil">
            <i class="bi bi-camera-fill"></i>
          </button>
          <input type="file" id="fotoInput" accept="image/*" class="d-none">
        </div>

        <p class="fw-bold mb-0" id="namaTampil">MELPANSYANATPAL</p>
      </section>

      <!-- Informasi akun -->
      <section aria-labelledby="informasi-akun">
        <h2 id="informasi-akun" class="visually-hidden">Informasi Akun</h2>

        <form id="editForm" novalidate>

          <div class="field-row">
            <span class="field-icon" aria-hidden="true"><i class="bi bi-person-fill"></i></span>
            <div class="field-body">
              <label for="username" class="field-label">Nama Pengguna</label>
              <input type="text" id="username" name="username" class="field-input" value="MELPANSYANATPAL" required readonly>
            </div>
            <button type="button" class="btn-edit" aria-label="Edit nama pengguna"><i class="bi bi-pencil-fill"></i></button>
          </div>

          <div class="field-row">
            <span class="field-icon" aria-hidden="true"><i class="bi bi-envelope-fill"></i></span>
            <div class="field-body">
              <label for="email" class="field-label">Email</label>
              <input type="email" id="email" name="email" class="field-input" placeholder="Email" readonly>
            </div>
            <button type="button" class="btn-edit" aria-label="Edit email"><i class="bi bi-pencil-fill"></i></button>
          </div>

          <div class="field-row">
            <span class="field-icon" aria-hidden="true"><i class="bi bi-telephone-fill"></i></span>
            <div class="field-body">
              <label for="phone" class="field-label">No Handphone</label>
              <input type="tel" id="phone" name="phone" class="field-input" placeholder="No Handphone" pattern="^(\+62|62|0)8[0-9]{8,12}$" title="Contoh: 081234567890" readonly>
            </div>
            <button type="button" class="btn-edit" aria-label="Edit nomor handphone"><i class="bi bi-pencil-fill"></i></button>
          </div>

          <div class="field-row">
            <span class="field-icon" aria-hidden="true"><i class="bi bi-key-fill"></i></span>
            <div class="field-body">
              <label for="password" class="field-label">Password</label>
              <input type="password" id="password" name="password" class="field-input" placeholder="Password" minlength="6" readonly>
            </div>
            <button type="button" class="btn-eye d-none" id="btnEye" aria-label="Tampilkan password"><i class="bi bi-eye"></i></button>
            <button type="button" class="btn-edit" aria-label="Edit password"><i class="bi bi-pencil-fill"></i></button>
          </div>

          <div class="d-flex gap-2 mt-4">
            <button type="button" class="btn btn-outline-secondary flex-fill" id="btnBatal" disabled>Batal</button>
            <button type="submit" class="btn btn-primary flex-fill" id="btnSimpan" disabled>Simpan Perubahan</button>
          </div>
        </form>
      </section>

    </div>
  </main>

  <footer class="text-center text-secondary small py-3">
    <i class="bi bi-c-circle"></i> Copyright TripNesia 2026
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const $ = id => document.getElementById(id);
    const form = $("editForm");
    const inputs = [...form.querySelectorAll(".field-input")];
    let awal = {};   // nilai sebelum diedit, dipakai tombol Batal

    function simpanAwal() { inputs.forEach(i => awal[i.id] = i.value); }
    simpanAwal();

    function tampilToast(pesan) {
      $("toastMsg").textContent = pesan;
      bootstrap.Toast.getOrCreateInstance($("simpanToast"), { delay: 3500 }).show();
    }

    // Ada kolom yang sedang diedit? -> aktifkan tombol Batal & Simpan
    function perbaruiTombol() {
      const aktif = inputs.some(i => !i.readOnly);
      $("btnSimpan").disabled = !aktif;
      $("btnBatal").disabled = !aktif;
    }

    // Kunci semua kolom kembali (mode lihat)
    function kunciSemua() {
      inputs.forEach(i => {
        i.readOnly = true;
        i.closest(".field-row").querySelector(".btn-edit").classList.remove("editing");
      });
      $("password").type = "password";
      $("btnEye").classList.add("d-none");
      $("btnEye").innerHTML = '<i class="bi bi-eye"></i>';
      perbaruiTombol();
    }

    // Tombol pensil: buka kolom untuk diedit
    form.querySelectorAll(".btn-edit").forEach(btn => {
      btn.addEventListener("click", () => {
        const input = btn.closest(".field-row").querySelector(".field-input");
        input.readOnly = !input.readOnly;
        btn.classList.toggle("editing", !input.readOnly);
        if (input.id === "password") $("btnEye").classList.toggle("d-none", input.readOnly);
        if (!input.readOnly) input.focus();
        perbaruiTombol();
      });
    });

    // Lihat/sembunyikan password
    $("btnEye").addEventListener("click", function () {
      const tampil = $("password").type === "password";
      $("password").type = tampil ? "text" : "password";
      this.innerHTML = tampil ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
    });

    // Batal: kembalikan nilai awal
    $("btnBatal").addEventListener("click", () => {
      inputs.forEach(i => i.value = awal[i.id]);
      kunciSemua();
    });

    // Simpan (front-end saja, belum ke backend)
    form.addEventListener("submit", e => {
      e.preventDefault();
      const salah = inputs.find(i => !i.readOnly && !i.checkValidity());
      if (salah) { salah.reportValidity(); return; }

      $("namaTampil").textContent = $("username").value.trim() || awal.username;
      simpanAwal();
      kunciSemua();
      tampilToast("Perubahan berhasil disimpan.");
    });

    // Ubah foto profil: pratinjau saja
    $("btnCamera").addEventListener("click", () => $("fotoInput").click());
    $("fotoInput").addEventListener("change", () => {
      const file = $("fotoInput").files[0];
      if (!file) return;
      $("avatar").innerHTML = `<img src="${URL.createObjectURL(file)}" alt="Foto profil pengguna">`;
      tampilToast("Foto profil diperbarui.");
    });
  </script>
</body>
</html>