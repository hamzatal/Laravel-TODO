<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: -3px;
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
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .container {
            width: 100%;
            max-width: 500px;
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

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(to right, #4f46e5, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .dark .register-header h1 {
            background: linear-gradient(to right, #818cf8, #a5b4fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .register-header p {
            color: var(--text-light);
        }

        .dark .register-header p {
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

        .form-input,
        .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            border: 1px solid var(--border-light);
            background: var(--input-bg-light);
            color: var(--text-light);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .dark .form-input,
        .dark .form-select {
            background: var(--input-bg-dark);
            border-color: var(--border-dark);
            color: var(--text-dark);
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--btn-primary-light);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236366f1'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.5rem;
            padding-right: 2.5rem;
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

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .login-link {
            display: block;
            text-align: center;
            color: var(--text-light);
            text-decoration: none;
            font-size: 0.875rem;
            margin-top: 1.5rem;
        }

        .dark .login-link {
            color: var(--text-dark);
        }

        .login-link:hover {
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

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
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
        <div class="register-header">
            <h1>Create Account</h1>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input id="name" class="form-input" type="text" name="name" required autofocus autocomplete="name">
                @error('name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-input" type="email" name="email" required autocomplete="username">
                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- <div class="form-group">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-select" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div> -->

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password">
                @error('password')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="buttons">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            <a href="{{ route('login') }}" class="login-link">
                Already have an account? Log in
            </a>
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
    </script>
</body>

</html>
