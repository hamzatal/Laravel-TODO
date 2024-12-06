<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        :root {
            --background-light: linear-gradient(135deg, #a5b4fc 0%, #818cf8 50%, #6366f1 100%);
            --background-dark: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
            --container-light: rgba(255, 255, 255, 0.95);
            --container-dark: rgba(30, 41, 59, 0.95);
            --text-light: #1e293b;
            --text-dark: #f1f5f9;
            --btn-primary-light: #4f46e5;
            --btn-primary-dark: #6366f1;
            --btn-primary-text-light: #ffffff;
            --btn-primary-text-dark: #ffffff;
            --border-light: rgba(255, 255, 255, 0.1);
            --border-dark: rgba(255, 255, 255, 0.05);
            --input-bg-light: rgba(255, 255, 255, 0.9);
            --input-bg-dark: rgba(15, 23, 42, 0.7);
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: var(--background-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }

        body.dark {
            background: var(--background-dark);
        }

        body::before {
            content: '';
            position: absolute;
            width: 150%;
            height: 150%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            top: -25%;
            left: -25%;
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 3rem;
            background: var(--container-light);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid var(--border-light);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            position: relative;
            z-index: 1;
        }

        .dark .container {
            background: var(--container-dark);
            border-color: var(--border-dark);
        }

        .theme-toggle {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0.75rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            z-index: 2;
        }

        .dark .theme-toggle {
            color: var(--text-dark);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(to right, #4f46e5, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .dark .login-header h1 {
            background: linear-gradient(to right, #818cf8, #a5b4fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-header p {
            color: var(--text-light);
        }

        .dark .login-header p {
            color: var(--text-dark);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-light);
        }

        .dark .form-label {
            color: var(--text-dark);
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            border: 1px solid var(--border-light);
            background: var(--input-bg-light);
            color: var(--text-light);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .dark .form-input {
            background: var(--input-bg-dark);
            border-color: var(--border-dark);
            color: var(--text-dark);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--btn-primary-light);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .remember-me label {
            color: var(--text-light);
            font-size: 0.875rem;
        }

        .dark .remember-me label {
            color: var(--text-dark);
        }

        .buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            flex: 1;
        }

        .btn-primary {
            background: var(--btn-primary-light);
            color: var(--btn-primary-text-light);
        }

        .dark .btn-primary {
            background: var(--btn-primary-dark);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-light);
            border: 2px solid currentColor;
        }

        .dark .btn-secondary {
            color: var(--text-dark);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .forgot-password {
            display: block;
            text-align: right;
            color: var(--text-light);
            text-decoration: none;
            font-size: 0.875rem;
            margin-top: 1rem;
        }

        .dark .forgot-password {
            color: var(--text-dark);
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .nav-buttons {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            display: flex;
            gap: 1rem;
            z-index: 2;
        }

        .nav-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            background: transparent;
            color: var(--text-light);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .dark .nav-btn {
            color: var(--text-dark);
        }

        .nav-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 640px) {
            .container {
                padding: 2rem;
                margin: 1rem;
            }

            .buttons {
                flex-direction: column;
            }

            .nav-buttons {
                position: relative;
                top: 0;
                left: 0;
                justify-content: center;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="nav-buttons">
        <a href="/" class="nav-btn">Home</a>
    </div>

    <button id="theme-toggle" class="theme-toggle">
        🌞
    </button>

    <div class="container">
        <div class="login-header">
            <h1>Welcome Back</h1>
          
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-input" type="email" name="email" required autofocus autocomplete="username">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password">
            </div>

            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Remember me</label>
            </div>

            <div class="buttons">
                <button type="submit" class="btn btn-primary">Log in</button>
                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
            </div>

            @if (Route::has('password.request'))
            <a class="forgot-password" href="{{ route('password.request') }}">
                Forgot your password?
            </a>
            @endif
        </form>
    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark');
            themeToggle.textContent = '🌜';
        }

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark');
            if (body.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
                themeToggle.textContent = '🌜';
            } else {
                localStorage.setItem('theme', 'light');
                themeToggle.textContent = '🌞';
            }
        });

        function validateForm() {
            let valid = true;

            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');

            // Reset error messages
            emailError.textContent = '';
            passwordError.textContent = '';

            // Email validation
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;
            if (!emailPattern.test(emailInput.value)) {
                emailError.textContent = 'Please enter a valid email address.';
                valid = false;
            }

            // Password validation
            if (passwordInput.value.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters long.';
                valid = false;
            }

            return valid;
        }
    </script>
</body>
</html>