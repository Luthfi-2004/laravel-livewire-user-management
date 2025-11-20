<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- HERO SECTION -->
    <div class="relative overflow-hidden rounded-2xl bg-indigo-600 px-6 py-16 shadow-xl sm:px-12 sm:py-24 lg:px-16">
        <div class="relative z-10 max-w-2xl">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                Welcome to Livewire Dashboard
            </h2>
            <p class="mt-6 text-lg leading-8 text-indigo-100">
                Manage your users efficiently with real-time data updates, sorting, and easy file uploads. Build with the power of TALL Stack.
            </p>
            <div class="mt-10 flex items-center gap-x-6">
                <a href="/users" wire:navigate class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                    Manage Users
                </a>
                <a href="/about" class="text-sm font-semibold leading-6 text-white">Learn more <span aria-hidden="true">→</span></a>
            </div>
        </div>
        
        <!-- Background Decoration -->
        <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)]" aria-hidden="true">
            <circle cx="512" cy="512" r="512" fill="url(#gradient)" fill-opacity="0.25" />
            <defs>
                <radialGradient id="gradient">
                    <stop stop-color="#ffffff" />
                    <stop offset="1" stop-color="#ffffff" />
                </radialGradient>
            </defs>
        </svg>
    </div>

    <!-- STATS GRID -->
    <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        
        <!-- Card 1: Total Users -->
        <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 transition duration-300">
            <dt class="truncate text-sm font-medium text-gray-400">Total Users</dt>
            <dd class="mt-2 text-3xl font-semibold tracking-tight text-white">{{ $totalUsers }}</dd>
            <div class="mt-4 flex items-center text-sm text-green-400">
                <svg class="mr-1.5 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                </svg>
                All time data
            </div>
        </div>

        <!-- Card 2: New Users (Week) -->
        <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 transition duration-300">
            <dt class="truncate text-sm font-medium text-gray-400">New Users (7 Days)</dt>
            <dd class="mt-2 text-3xl font-semibold tracking-tight text-white">{{ $newUsers }}</dd>
             <div class="mt-4 flex items-center text-sm text-indigo-400">
                Growth metric
            </div>
        </div>

        <!-- Card 3: System Status -->
        <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 transition duration-300">
            <dt class="truncate text-sm font-medium text-gray-400">System Status</dt>
            <dd class="mt-2 text-3xl font-semibold tracking-tight text-white">Online</dd>
             <div class="mt-4 flex items-center text-sm text-green-400">
                <span class="relative flex h-2 w-2 mr-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                Operational
            </div>
        </div>
    </div>

    <!-- RECENT USERS LIST -->
    <div class="mt-10">
        <h3 class="text-lg font-semibold leading-6 text-white mb-4">Recently Joined</h3>
        <div class="overflow-hidden rounded-xl border border-white/10 bg-white/5">
            <ul role="list" class="divide-y divide-white/10">
                @foreach($recentUsers as $user)
                <li class="px-6 py-4 hover:bg-white/5 transition duration-150">
                    <div class="flex items-center gap-x-4">
                        @if($user->avatar)
                            <img src="{{ asset('storage/'.$user->avatar) }}" alt="" class="h-10 w-10 rounded-full bg-gray-800 object-cover ring-1 ring-white/10">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff" alt="" class="h-10 w-10 rounded-full bg-gray-800 ring-1 ring-white/10">
                        @endif
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-white">{{ $user->name }}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-400">{{ $user->email }}</p>
                        </div>
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-xs leading-5 text-gray-400">Joined {{ $user->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="border-t border-white/10 bg-white/5 px-6 py-3">
                <a href="/users" wire:navigate class="text-sm font-semibold leading-6 text-indigo-400 hover:text-indigo-300">View all users <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </div>

</div>