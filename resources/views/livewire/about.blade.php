<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- HEADER -->
    <div class="text-center mb-16">
        <h2 class="text-base font-semibold text-indigo-400 tracking-wide uppercase">Our Story</h2>
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">
            Meet Our Amazing Team
        </p>
        <p class="mt-4 max-w-2xl text-xl text-gray-400 mx-auto">
            Orang-orang hebat di balik aplikasi ini.
        </p>
    </div>

    <!-- TEAM GRID -->
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($team as $member)
        <div class="bg-gray-800/50 rounded-xl overflow-hidden border border-white/10 hover:border-indigo-500/50 transition duration-300 group hover:-translate-y-1">
            <div class="p-8 flex flex-col items-center text-center">
                
                <!-- LOGIKA GAMBAR (Avatar Asli vs Placeholder) -->
                @if($member->avatar)
                    <!-- Jika User punya foto upload -->
                    <img class="h-32 w-32 rounded-full object-cover ring-4 ring-indigo-500/20 group-hover:ring-indigo-500 transition-all duration-300 shadow-lg" 
                         src="{{ asset('storage/'.$member->avatar) }}" 
                         alt="{{ $member->name }}">
                @else
                    <!-- Jika User tidak punya foto (pakai inisial) -->
                    <img class="h-32 w-32 rounded-full object-cover ring-4 ring-indigo-500/20 group-hover:ring-indigo-500 transition-all duration-300 shadow-lg" 
                         src="https://ui-avatars.com/api/?name={{ urlencode($member->name) }}&background=random&color=fff" 
                         alt="{{ $member->name }}">
                @endif

                <div class="mt-6">
                    <h3 class="text-xl font-bold text-white">{{ $member->name }}</h3>
                    <p class="text-sm font-medium text-indigo-400 mt-1">{{ $member->email }}</p>
                </div>
                
                <p class="mt-4 text-sm text-gray-400 leading-relaxed">
                    Bergabung sejak {{ $member->created_at->format('d M Y') }}. 
                    Member aktif yang berkontribusi dalam project ini.
                </p>
                
                <!-- Social Icons -->
                <div class="mt-6 flex justify-center gap-4">
                    <a href="#" class="p-2 bg-white/5 rounded-full text-gray-400 hover:text-white hover:bg-indigo-600 transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>