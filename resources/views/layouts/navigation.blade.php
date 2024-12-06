<nav class="bg-white shadow-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
    <a href="{{ route('dashboard') }}" class="font-bold text-2xl text-gray-800 hover:text-gray-900 transition-colors duration-300">
      Todo Dashboard
    </a>

    <div class="flex items-center space-x-4">

      <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 transition-colors duration-300">
          <span>{{ Auth::user()->name }}</span>
          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </button>

        <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg border border-gray-200 py-2 z-10">
          <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-300">
            Profile
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors duration-300">
              Logout
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>