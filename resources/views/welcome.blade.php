<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
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
            text-align: center;
            padding: 3rem;
            background: var(--container-light);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid var(--border-light);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            position: relative;
            z-index: 1;
            opacity: 1;
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
        }

        .dark .theme-toggle {
            color: var(--text-dark);
        }

        .theme-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(15deg);
        }

        .welcome-text {
            color: var(--text-light);
            margin-bottom: 2.5rem;
        }

        .dark .welcome-text {
            color: var(--text-dark);
        }

        .welcome-text h1 {
            font-size: 2.75rem;
            margin-bottom: 1rem;
            font-weight: 700;
            background: linear-gradient(to right, #4f46e5, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.025em;
        }

        .dark .welcome-text h1 {
            background: linear-gradient(to right, #818cf8, #a5b4fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .btn {
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1),
                       0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        .btn-login {
            background: var(--btn-primary-light);
            color: var(--btn-primary-text-light);
        }

        .dark .btn-login {
            background: var(--btn-primary-dark);
            color: var(--btn-primary-text-dark);
        }

        .btn-register {
            background: transparent;
            color: var(--text-light);
            border: 2px solid currentColor;
        }

        .dark .btn-register {
            color: var(--text-dark);
        }

        .logout-btn {
            
            margin: 25px;
            background: transparent;
            color: var(--text-dark);
            border: none;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        .dark .logout-btn {
            color: var(--text-dark);
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 640px) {
            .container {
                padding: 2rem;
                margin: 1rem;
            }

            .welcome-text h1 {
                font-size: 2.25rem;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <button id="theme-toggle" class="theme-toggle">
        🌞
    </button>

    <div class="container">
    <div class="welcome-text">
        <h1>Welcome Back</h1>
    </div>

    @if (Route::has('login'))
        @auth
            <div class="buttons">
                @if (auth()->user()->role == 'user')
                    <!-- If the user is an admin, show the ToDo List button -->
                    <a href="{{ url('/todos') }}" class="btn btn-register">ToDo List</a>
                @else
                    <!-- If the user is not an admin (i.e., a user), show the Dashboard button -->
                    <a href="{{ url('/dashboard') }}" class="btn btn-login">Dashboard</a>
                @endif
            </div>

            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button style="margin: 30px; background-color:red; color:white" type="submit" class="btn btn-logout">Logout</button>
            </form>
        @else
            <div class="buttons">
                <a href="{{ route('login') }}" class="btn btn-login">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-register">Register</a>
                @endif
            </div>
        @endauth
    @endif
</div>


    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;
        
        // Check for saved theme preference
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