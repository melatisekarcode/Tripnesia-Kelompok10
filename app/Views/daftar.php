<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tripnesia - Daftar</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bs-primary: #0a84c6;
            --bs-primary-rgb: 10, 132, 198;
            --tn-border: #dfe5ee;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            color: #111827;
            background: #fff;
        }

        .page { width: 100%; max-width: 960px; margin: 0 auto; }

        .register-section {
            min-height: calc(100vh - 65px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .register-card { width: 100%; max-width: 390px; padding: 28px 26px; background: #fff; }

        .brand { display: flex; justify-content: center; align-items: center; margin-bottom: 30px; }
        .brand img { display: block; width: 175px; max-width: 100%; height: auto; object-fit: contain; }

        .tab-container {
            display: flex;
            width: 100%;
            padding: 3px;
            margin-bottom: 28px;
            background: #f8f9fa;
            border: 1px solid #c9cdd1;
            border-radius: 8px;
        }

        .tab-button {
            flex: 1;
            padding: 8px;
            border: 1px solid transparent;
            border-radius: 5px;
            background: transparent;
            color: #111827;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
        }

        .tab-button.active { background: #fff; border-color: #e5e7eb; color: #0a84c6; }

        .form-label { display: block; margin-bottom: 7px; font-size: 13px; color: #111827; }

        .form-control {
            width: 100%;
            height: 43px;
            padding: 10px 12px;
            border: 1px solid #c8ced5;
            border-radius: 8px;
            background: #f9fafb;
            font-size: 13px;
        }

        .form-control::placeholder { color: #9ca3af; }
        .form-control:focus { border-color: #0a84c6; box-shadow: 0 0 0 3px rgba(10, 132, 198, .12); background: #fff; }

        .password-group { position: relative; }
        .password-group .form-control { padding-right: 40px; }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            padding: 0;
            border: 0;
            background: transparent;
            color: #6b7280;
            font-size: 16px;
            line-height: 1;
        }

        .btn-register {
            width: 100%;
            height: 43px;
            margin-top: 1px;
            border: 1px solid #0a84c6;
            border-radius: 8px;
            background: #0a84c6;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-register:hover { border-color: #0873ab; background: #0873ab; color: #fff; }

        .footer {
            width: 100%;
            padding: 18px 12px;
            border-top: 1px solid var(--tn-border);
            background: #f8fafc;
            color: #6b7280;
            text-align: center;
            font-size: 12px;
        }
        .footer i { margin-right: 5px; }

        @media (max-width: 575.98px) {
            .register-section { min-height: calc(100vh - 55px); padding: 24px 16px; }
            .register-card { max-width: 420px; padding: 22px 10px; }
            .brand { margin-bottom: 28px; }
            .brand img { width: 165px; }
            .footer { font-size: 11px; }
        }
    </style>
</head>

<body>

    <main class="page">
        <section class="register-section">
            <div class="register-card">

                <!-- Logo Tripnesia -->
                <header class="brand">
                    <a href="<?= base_url('/'); ?>">
                        <img src="<?= base_url('assets/images/logo.svg'); ?>"
                             alt="Tripnesia - Jelajahi Indonesia, Temukan Cerita">
                    </a>
                </header>

                <!-- Tab Masuk dan Daftar -->
                <div class="tab-container">
                    <a href="<?= base_url('login'); ?>" class="tab-button">Masuk</a>
                    <a href="<?= base_url('daftar'); ?>" class="tab-button active" aria-current="page">Daftar</a>
                </div>

                <!-- Pesan error dari server -->
                <?php $errors = session()->getFlashdata('errors'); ?>
                <?php if (! empty($errors)): ?>
                    <div class="alert alert-danger py-2 small" role="alert">
                        <ul class="mb-0 ps-3">
                            <?php foreach ($errors as $error): ?>
                                <li><?= esc($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Form Daftar -->
                <form id="registerForm" action="<?= base_url('daftar'); ?>" method="post">
                    <?= csrf_field(); ?>

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="<?= esc(old('name')); ?>"
                               placeholder="Masukkan Nama"
                               autocomplete="name"
                               required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               class="form-control"
                               id="email"
                               name="email"
                               value="<?= esc(old('email')); ?>"
                               placeholder="Masukkan Email"
                               autocomplete="username"
                               required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="password-group">
                            <input type="password"
                                   class="form-control"
                                   id="password"
                                   name="password"
                                   placeholder="Masukkan Password"
                                   autocomplete="new-password"
                                   minlength="6"
                                   required>

                            <button type="button" class="toggle-password" data-target="password" aria-label="Tampilkan password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                        <div class="password-group">
                            <input type="password"
                                   class="form-control"
                                   id="confirmPassword"
                                   name="confirmPassword"
                                   placeholder="Masukkan Password"
                                   autocomplete="new-password"
                                   minlength="6"
                                   required>

                            <button type="button" class="toggle-password" data-target="confirmPassword" aria-label="Tampilkan konfirmasi password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-register">Daftar</button>

                    <!-- Link Masuk / Login -->
                    <div class="text-center mt-3" style="font-size: 12px; color: #6b7280;">
                        Sudah punya akun? <a href="<?= base_url('login'); ?>" style="color: #0a84c6; text-decoration: none; font-weight: 600;">Masuk</a>
                    </div>
                </form>

            </div>
        </section>
    </main>

    <footer class="footer">
        <i class="bi bi-c-circle"></i>
        Copyright TripNesia 2026
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Tampilkan atau sembunyikan password
        document.querySelectorAll(".toggle-password").forEach(function (button) {
            button.addEventListener("click", function () {
                const input = document.getElementById(this.getAttribute("data-target"));
                const icon = this.querySelector("i");

                if (input.type === "password") {
                    input.type = "text";
                    icon.classList.replace("bi-eye", "bi-eye-slash");
                } else {
                    input.type = "password";
                    icon.classList.replace("bi-eye-slash", "bi-eye");
                }
            });
        });

        // Cek cepat di browser; validasi utama tetap dilakukan di server (Auth::prosesDaftar)
        document.getElementById("registerForm").addEventListener("submit", function (event) {
            const pass = document.getElementById("password").value;
            const confirm = document.getElementById("confirmPassword").value;

            if (pass !== confirm) {
                event.preventDefault();
                alert("Konfirmasi password tidak sama. Silakan periksa kembali.");
            }
        });
    </script>

</body>
</html>