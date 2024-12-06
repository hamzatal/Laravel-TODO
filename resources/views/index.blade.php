<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'primary': '#4f46e5',
                        'primary-hover': '#4338ca',
                        'text': '#111827',
                        'text-secondary': '#6b7280',
                        'bg-light': '#f3f4f6',
                        'bg-dark': '#1f2937',
                        'border-light': '#d1d5db',
                        'border-dark': '#374151'
                    },
                    boxShadow: {
                        'card': '0 8px 32px rgba(0, 0, 0, 0.1)',
                        'dark-card': '0 8px 32px rgba(0, 0, 0, 0.4)',
                        'interactive': '0 10px 25px rgba(0, 0, 0, 0.2)',
                    },
                },
            },
        }
    </script>
</head>

<body class="font-inter bg-bg-light dark:bg-bg-dark min-h-screen flex flex-col items-center justify-center p-4 transition-colors duration-300">

    <main class="w-full max-w-xl bg-white dark:bg-gray-800 p-6 rounded-lg shadow-card dark:shadow-dark-card text-center">
        <h1 class="text-4xl font-bold text-primary dark:text-primary mb-4 flex items-center justify-center space-x-2">
            <i class="fas fa-list"></i> <span>To-Do List</span>
        </h1>
        <p class="text-lg text-text-secondary dark:text-gray-400">Organize your tasks with ease!</p>
    </main>

    <form id="todo-form" action="/todos/store" method="POST" class="w-full max-w-xl bg-white dark:bg-gray-800 mt-8 p-6 rounded-lg shadow-card dark:shadow-dark-card transition-transform transform hover:scale-105 text-center">
        @csrf
        <div class="flex gap-4 mb-4 items-center">
            <input type="text" name="title" placeholder="To-Do Title" class="flex-1 px-4 py-3 border-2 border-border-light dark:border-border-dark rounded-lg focus:border-primary focus:ring-4 focus:ring-primary/20 transition duration-300 outline-none dark:bg-gray-700 dark:text-white" required>
            <button type="submit" class="px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-primary-hover shadow-md transition duration-300 flex items-center space-x-2">
                <i class="fas fa-plus"></i> <span>Add</span>
            </button>
        </div>
        <textarea name="description" placeholder="Description" class="w-full px-4 py-3 border-2 border-border-light dark:border-border-dark rounded-lg focus:border-primary focus:ring-4 focus:ring-primary/20 transition duration-300 outline-none resize-none h-24 dark:bg-gray-700 dark:text-white"></textarea>
    </form>

    <section class="w-full max-w-xl mt-6">
        <ul class="space-y-4">
            @foreach ($todos as $todo)
            <li class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-card dark:shadow-dark-card flex justify-between items-center transition duration-300 transform hover:scale-105 hover:shadow-interactive">
                <form action="/todos/toggle-complete/{{ $todo->id }}" method="POST" class="flex items-center flex-1">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="is_completed" {{ $todo->is_completed ? 'checked' : '' }} class="w-5 h-5 mr-4 accent-primary cursor-pointer" onchange="this.form.submit()">
                    <input type="hidden" name="title" value="{{ $todo->title }}">
                    <input type="hidden" name="description" value="{{ $todo->description }}">
                    <span class="{{ $todo->is_completed ? 'line-through text-text-secondary dark:text-gray-500' : 'text-text font-semibold dark:text-white' }} flex items-center space-x-2">
                        <i class="fas fa-tasks"></i> <span>{{ $todo->title }}</span>
                    </span>
                    <p class="ml-4 text-text-secondary dark:text-gray-400">{{ $todo->description }}</p>
                </form>
            </li>
            @endforeach
        </ul>
    </section>

    <script>
        document.getElementById('todo-form').addEventListener('submit', (event) => {
            event.preventDefault();
            const titleInput = document.querySelector('#todo-form input[name="title"]');
            if (titleInput.value.trim() === '') {
                alert('Please enter a title for your to-do item.');
                titleInput.focus();
                return;
            }
            event.target.submit();
        });
    </script>
</body>

</html>