<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kata Sandi Baru</title>

  <!-- Bootstrap 5 & Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --tn-primary: #0b84c6;
      --tn-primary-dark: #0a72ad;
      --tn-border: #d5dbe1;
      --tn-muted: #6b7680;
      --tn-ok: #198754;
    }

    body {
      font-family: "Plus Jakarta Sans", system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
      color: #1c2329;
      background-color: #fff;
    }

    .page-wrap { max-width: 420px; }

    .page-title { font-weight: 700; font-size: 1.6rem; }
    .page-subtitle { color: var(--tn-muted); font-size: .85rem; }

    .form-label { font-weight: 600; font-size: .8rem; margin-bottom: .35rem; }

    .input-group-text {
      background-color: #f8f9fa;
      border-color: var(--tn-border);
      color: var(--tn-muted);
    }
    .form-control {
      background-color: #f8f9fa;
      border-color: var(--tn-border);
      font-size: .85rem;
      padding-top: .6rem;
      padding-bottom: .6rem;
    }
    .form-control:focus {
      background-color: #fff;
      border-color: var(--tn-primary);
      box-shadow: 0 0 0 .2rem rgba(11, 132, 198, .15);
    }
    .btn-toggle {
      background-color: #f8f9fa;
      border: 1px solid var(--tn-border);
      color: var(--tn-muted);
    }
    .btn-toggle:hover { background-color: #eef1f4; color: #1c2329; }

    /* Checklist syarat kata sandi */
    .rule { font-size: .8rem; color: var(--tn-muted); }
    .rule .bi {
      font-size: 1.15rem;
      color: #b8c0c8;
      transition: color .15s;
    }
    .rule.valid { color: #1c2329; }
    .rule.valid .bi { color: var(--tn-ok); }

    .btn-primary {
      --bs-btn-bg: var(--tn-primary);
      --bs-btn-border-color: var(--tn-primary);
      --bs-btn-hover-bg: var(--tn-primary-dark);
      --bs-btn-hover-border-color: var(--tn-primary-dark);
      --bs-btn-active-bg: var(--tn-primary-dark);
      --bs-btn-active-border-color: var(--tn-primary-dark);
      --bs-btn-disabled-bg: var(--tn-primary);
      --bs-btn-disabled-border-color: var(--tn-primary);
      font-weight: 600;
      font-size: .9rem;
      padding: .65rem 1rem;
    }

    footer { font-size: .75rem; color: var(--tn-muted); }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

  <main class="flex-grow-1 d-flex align-items-center">
    <div class="container page-wrap py-5">

      <div class="text-center mb-4">
        <h1 class="page-title mb-2">Kata Sandi Baru</h1>
        <p class="page-subtitle mb-0">Masukkan kata sandi baru untuk akun anda</p>
      </div>

      <form action="login.html" method="get" id="formSandi" novalidate>

        <!-- Kata sandi baru -->
        <div class="mb-3">
          <label for="password" class="form-label">Kata Sandi Baru</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="Masukkan kata sandi baru" minlength="8" required
                   autocomplete="new-password">
            <button class="btn btn-toggle" type="button" data-toggle-password="password"
                    aria-label="Tampilkan atau sembunyikan kata sandi">
              <i class="bi bi-eye"></i>
            </button>
          </div>
        </div>

        <!-- Konfirmasi kata sandi baru -->
        <div class="mb-4">
          <label for="confirm-password" class="form-label">Konfirmasi Kata Sandi Baru</label>
          <div class="input-group has-validation">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                   placeholder="Ulangi kata sandi baru" minlength="8" required
                   autocomplete="new-password">
            <button class="btn btn-toggle" type="button" data-toggle-password="confirm-password"
                    aria-label="Tampilkan atau sembunyikan konfirmasi kata sandi">
              <i class="bi bi-eye"></i>
            </button>
            <div class="invalid-feedback">Kata sandi tidak sama.</div>
          </div>
        </div>

        <!-- Syarat kata sandi -->
        <ul class="list-unstyled mb-4 d-grid gap-2" aria-live="polite">
          <li class="rule d-flex align-items-center gap-2" id="rule-length">
            <i class="bi bi-check-circle-fill"></i> Minimal 8 Karakter
          </li>
          <li class="rule d-flex align-items-center gap-2" id="rule-case">
            <i class="bi bi-check-circle-fill"></i> Mengandung huruf besar dan kecil
          </li>
          <li class="rule d-flex align-items-center gap-2" id="rule-number">
            <i class="bi bi-check-circle-fill"></i> Mengandung angka
          </li>
        </ul>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>

    </div>
  </main>

  <footer class="border-top py-3 text-center">
    <i class="bi bi-c-circle me-1"></i>Copyright TripNesia 2026
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const form = document.getElementById('formSandi');
    const pw = document.getElementById('password');
    const cpw = document.getElementById('confirm-password');

    // Tampil/sembunyikan kata sandi
    document.querySelectorAll('[data-toggle-password]').forEach(btn => {
      btn.addEventListener('click', () => {
        const input = document.getElementById(btn.dataset.togglePassword);
        const icon = btn.querySelector('i');
        const show = input.type === 'password';
        input.type = show ? 'text' : 'password';
        icon.classList.toggle('bi-eye', !show);
        icon.classList.toggle('bi-eye-slash', show);
      });
    });

    // Checklist syarat kata sandi
    const rules = {
      'rule-length': v => v.length >= 8,
      'rule-case':   v => /[a-z]/.test(v) && /[A-Z]/.test(v),
      'rule-number': v => /\d/.test(v)
    };

    function updateRules() {
      Object.entries(rules).forEach(([id, test]) => {
        document.getElementById(id).classList.toggle('valid', test(pw.value));
      });
    }

    function checkMatch() {
      const mismatch = cpw.value.length > 0 && cpw.value !== pw.value;
      cpw.classList.toggle('is-invalid', mismatch);
      return !mismatch;
    }

    pw.addEventListener('input', () => { updateRules(); if (cpw.value) checkMatch(); });
    cpw.addEventListener('input', checkMatch);

    // Validasi sebelum kirim (front end saja)
    form.addEventListener('submit', e => {
      const allValid = Object.values(rules).every(test => test(pw.value));
      if (!allValid || !pw.value || !cpw.value || !checkMatch()) {
        e.preventDefault();
        if (!pw.value) pw.focus();
        else if (!allValid) pw.focus();
        else cpw.focus();
      }
    });
  </script>
</body>
</html>