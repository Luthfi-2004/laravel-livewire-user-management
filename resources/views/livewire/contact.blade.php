<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- HEADER SECTION -->
    <div class="text-center mb-16">
        <h2 class="text-indigo-400 font-semibold tracking-wide uppercase">Get in Touch</h2>
        <p class="mt-2 text-3xl font-extrabold text-white sm:text-4xl">Hubungi Kami</p>
        <p class="mt-4 text-lg text-gray-400">Punya pertanyaan atau ide proyek? Kirim pesan saja!</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        
        <!-- BAGIAN KIRI: INFO & MAP -->
        <div class="space-y-8">
            <!-- Info Card -->
            <div class="bg-white/5 border border-white/10 p-8 rounded-2xl shadow-xl backdrop-blur-sm">
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-indigo-500/20 p-3 rounded-lg text-indigo-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-lg">Lokasi Kami</h4>
                            <p class="text-gray-400">Telukjambe, Karawang<br>Jawa Barat, Indonesia</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="bg-indigo-500/20 p-3 rounded-lg text-indigo-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-lg">Email</h4>
                            <p class="text-gray-400">luthfi.rafanandanaufal@gmail.com</p>
                            <p class="text-gray-500 text-sm">Senin - Jumat, 09:00 - 17:00</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Embed (Iframe) -->
            <div class="rounded-2xl overflow-hidden border border-white/10 shadow-lg h-80 relative grayscale hover:grayscale-0 transition duration-500">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126906.95559465773!2d107.23678859539604!3d-6.303096555940705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69775e79ef397b%3A0x1c9c85911c4b81a!2sKarawang%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1708500000000!5m2!1sen!2sid" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- BAGIAN KANAN: FORM -->
        <div class="bg-white/5 border border-white/10 p-8 rounded-2xl shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-32 h-32 bg-indigo-500 rounded-full blur-3xl opacity-20"></div>

            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-500/10 border border-green-500/20 text-green-400 flex items-center gap-3 animate-pulse">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit="save" class="space-y-6 relative z-10">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
                        <input wire:model.blur="form.name" type="text" class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" placeholder="John Doe">
                        @error('form.name') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                        <input wire:model.blur="form.email" type="email" class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" placeholder="john@example.com">
                        @error('form.email') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Subject -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Subjek</label>
                    <input wire:model.blur="form.subject" type="text" class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" placeholder="Kerjasama Project...">
                    @error('form.subject') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Pesan</label>
                    <textarea wire:model.blur="form.message" rows="4" class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" placeholder="Ceritakan detail kebutuhanmu..."></textarea>
                    @error('form.message') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Button with Loading State -->
                <div>
                    <button 
                        type="submit" 
                        wire:loading.attr="disabled"
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <!-- Tampilan Normal (Hilang saat Loading) -->
                        <span wire:loading.remove wire:target="save" class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            Kirim Pesan
                        </span>

                        <!-- Tampilan Saat Loading (Muncul saat proses) -->
                        <span wire:loading wire:target="save" class="flex items-center gap-2">
                            <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Sedang Mengirim...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>