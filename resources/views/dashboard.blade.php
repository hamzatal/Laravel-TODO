<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.2/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .checkbox:checked {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }

        .checkbox:checked:hover {
            background-color: #2563eb;
        }

        .checkbox:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }
    </style>
</head>
<body x-data="{ showModal: false, isDarkMode: false }">
    <div :class="{ 'bg-gray-100 dark:bg-gray-900': true }">
        <!-- Header with Navbar -->
        <header class="bg-white dark:bg-gray-800 shadow">
            <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
                <a href="#" class="text-2xl font-bold text-gray-800 dark:text-white">Todo Dashboard</a>
                <div class="flex items-center space-x-4">
                    <button @click="showModal = true" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                        <i class="fas fa-plus mr-2"></i> Add New Task
                    </button>
                    <button @click="isDarkMode = !isDarkMode" class="bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 px-4 py-2 rounded-lg transition">
                        <i class="fas fa-moon"></i>
                    </button>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 transition-colors duration-300">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-caret-down"></i>
                        </button>
                        <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 shadow-lg rounded-lg border border-gray-200 dark:border-gray-600 py-2 z-10">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-300">
                                <i class="fas fa-user-circle mr-2"></i> Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-300">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="py-12" :class="{ 'bg-gray-100 dark:bg-gray-900': true }">
            <div class="container mx-auto px-4">
                <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg p-8">
                    <!-- Welcome Section -->
                    <div class="welcome-text text-center mb-8">
                        <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Welcome to Your To-Do Dashboard</h1>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">Organize your tasks and stay on top of your to-do list with our modern design.</p>
                    </div>

                    <!-- To-Do List Section -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Your Tasks</h3>

                        @if($todos->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400">No tasks found.</p>
                        @else
                        <ul class="space-y-4">
                            @foreach($todos as $todo)
                            <li class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-4 flex justify-between items-center">
                                <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="flex-1 flex items-center gap-4">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="title" value="{{ $todo->title }}" class="border-0 dark:bg-transparent dark:text-gray-200 px-0 py-0 text-gray-800 font-medium text-lg flex-1" {{ $todo->is_completed ? 'readonly' : '' }}>
                                    <textarea name="description" rows="2" class="border dark:border-gray-600 px-2 py-1 rounded-lg w-full text-gray-800 dark:text-gray-200 bg-transparent" {{ $todo->is_completed ? 'readonly' : '' }}>{{ $todo->description }}</textarea>
                                    <input type="checkbox" name="is_completed" {{ $todo->is_completed ? 'checked' : '' }} onchange="this.form.submit()" class="checkbox h-5 w-5 text-blue-500 dark:text-blue-400">
                                </form>
                                <div class="flex items-center gap-2">
                                    @if(!$todo->is_completed)
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                                        <i class="fas fa-sync-alt mr-2"></i> Update
                                    </button>
                                    @endif
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                                            <i class="fas fa-trash-alt mr-2"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </main>

        <!-- Add Task Modal -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50" x-cloak>
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-md">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Add New Task</h2>
                <form action="{{ route('todos.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-800 dark:text-gray-200 font-medium mb-2">Task Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter task title" class="border dark:border-gray-600 px-2 py-1 rounded-lg w-full text-gray-800 dark:text-gray-200 bg-transparent" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-800 dark:text-gray-200 font-medium mb-2">Task Description</label>
                        <textarea id="description" name="description" rows="3" placeholder="Enter task description" class="border dark:border-gray-600 px-2 py-1 rounded-lg w-full text-gray-800 dark:text-gray-200 bg-transparent"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg mr-2 transition" @click="showModal = false">
                            <i class="fas fa-times mr-2"></i> Cancel
                        </button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                            <i class="fas fa-plus mr-2"></i> Add Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.body.classList.toggle('dark', window.localStorage.getItem('darkMode') === 'true');

        // Toggle dark mode and save preference
        function toggleDarkMode() {
            const isDark = document.body.classList.toggle('dark');
            window.localStorage.setItem('darkMode', isDark);
        }
    </script>
</body>
</html>
