<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | PT. Easystem Smart Tech</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="section-bg-light">
    <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh;">
        <div class="card card-modern p-5 fade-in-up" style="max-width:420px;width:100%;">
            <img src="{{ asset('images/logo4-easystem.png') }}" class="logo5">
            <div class="text-center mb-4">
                <h4 class="fw-bold mt-2">Login Admin</h4>
                <p class="text-secondary small mb-0">PT. Easystem Smart Tech</p>
            </div>

            @if (session('error'))
                <div class="alert alert-danger small">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger small">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (! empty($lockoutSeconds))
                <div class="alert alert-warning small text-center" id="lockout-box">
                    <i class="bi bi-lock-fill me-1"></i>
                    Coba lagi dalam <strong id="countdown-timer">--:--</strong>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-gradient w-100" id="btn-login">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </form>

            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="small text-secondary text-decoration-none">
                    <i class="bi bi-arrow-left"></i> Kembali ke Website
                </a>
            </div>
        </div>
    </div>

    <script>
        @if (! empty($lockoutSeconds))
        (function () {
            let sisaDetik = {{ $lockoutSeconds }};
            const timerEl = document.getElementById('countdown-timer');
            const btnLogin = document.getElementById('btn-login');
            const boxEl = document.getElementById('lockout-box');

            btnLogin.disabled = true;
            btnLogin.classList.add('opacity-50');

            function tampilkanWaktu(detik) {
                const menit = Math.floor(detik / 60);
                const detikSisa = detik % 60;
                return String(menit).padStart(2, '0') + ':' + String(detikSisa).padStart(2, '0');
            }

            timerEl.textContent = tampilkanWaktu(sisaDetik);

            const interval = setInterval(function () {
                sisaDetik--;

                if (sisaDetik <= 0) {
                    clearInterval(interval);
                    boxEl.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i> Anda sudah bisa login kembali.';
                    boxEl.classList.remove('alert-warning');
                    boxEl.classList.add('alert-success');
                    btnLogin.disabled = false;
                    btnLogin.classList.remove('opacity-50');
                    return;
                }

                timerEl.textContent = tampilkanWaktu(sisaDetik);
            }, 1000);
        })();
        @endif
    </script>
</body>
</html>