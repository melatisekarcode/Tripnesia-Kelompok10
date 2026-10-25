<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tripnesia - Lupa Kata Sandi</title>

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

        .forgot-section {
            min-height: calc(100vh - 65px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .forgot-card { position: relative; width: 100%; max-width: 390px; padding: 28px 26px; background: #fff; }

        .forgot-content { padding-top: 0; }

        .forgot-heading {
            margin: 0 0 12px;
            color: #080808;
            text-align: center;
            font-size: 22px;
            line-height: 30px;
            font-weight: 700;
        }

        .forgot-description {
            margin: 0 0 28px;
            color: #9299a5;
            text-align: center;
            font-size: 12px;
            line-height: 18px;
        }

        .form-label { display: block; margin-bottom: 7px; color: #222; font-size: 13px; }

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
        .form-control:focus { border-color: var(--bs-primary); box-shadow: 0 0 0 3px rgba(10, 132, 198, .12); }

        .btn-send {
            width: 100%;
            height: 43px;
            margin-top: 21px;
            border: 1px solid var(--bs-primary);
            border-radius: 8px;
            background: var(--bs-primary);
            color: #fff;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-send:hover { border-color: #0873ab; background: #0873ab; color: #fff; }

        .back-login { display: block; margin-top: 18px; text-align: center; color: #111827; font-size: 12px; text-decoration: none; }
        .back-login:hover { color: #0a84c6; }

        .footer {
            width: 100%;
            padding: 18px 12px;
            border-top: 1px solid var(--tn-border);
            background: #f8fafc;
            text-align: center;
            color: #6b7280;
            font-size: 12px;
        }
        .footer i { margin-right: 5px; }

        @media (max-width: 575.98px) {
            .forgot-section { min-height: calc(100vh - 55px); padding: 24px 16px; }
            .forgot-card { max-width: 420px; padding: 22px 10px; }
            .footer { font-size: 11px; }
        }

        @media (max-width: 360px) {
            .forgot-heading { font-size: 20px; }
        }
    </style>
</head>

<body>

    <main class="page">
        <section class="forgot-section">
            <div class="forgot-card">

                <div class="forgot-content">

                    <h1 class="forgot-heading">Lupa Kata Sandi ?</h1>

                    <p class="forgot-description">
                        Masukkan Email anda untuk reset password
                    </p>

                    <!-- Pesan dari server -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success py-2 small" role="alert">
                            <?= esc(session()->getFlashdata('success')); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger py-2 small" role="alert">
                            <?= esc(session()->getFlashdata('error')); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Hanya muncul saat development & email belum disetel -->
                    <?php if (session()->getFlashdata('dev_link')): ?>
                        <div class="alert alert-warning py-2 small" role="alert">
                            <strong>Mode development:</strong> email belum dikonfigurasi, gunakan tautan ini:<br>
                            <a href="<?= esc(session()->getFlashdata('dev_link')); ?>" class="text-break">
                                <?= esc(session()->getFlashdata('dev_link')); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <form id="forgotForm" action="<?= base_url('lupa-sandi'); ?>" method="post">
                        <?= csrf_field(); ?>

                        <div>
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   value="<?= esc(old('email')); ?>"
                                   placeholder="Masukkan Email"
                                   autocomplete="email"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-send" id="sendButton">Kirim</button>
                    </form>

                    <a href="<?= base_url('login'); ?>" class="back-login">
                        <i class="bi bi-arrow-left"></i> Kembali ke halaman login
                    </a>

                </div>

            </div>
        </section>
    </main>

    <footer class="footer">
        <i class="bi bi-c-circle"></i>
        Copyright TripNesia 2026
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>