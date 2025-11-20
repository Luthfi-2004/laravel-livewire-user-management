<div class="flex justify-center gap-10 px-4">
    
    <!-- KOLOM KIRI: FORM (Hanya muncul jika Login DAN Admin) -->
    @if(auth()->check() && auth()->user()->is_admin)
    <div class="w-1/3 my-10">
         <div class="py-2">
            <div class="sm:mx-auto">
                <h2 class="mt-8 text-center text-2xl font-bold tracking-tight text-white">
                    {{ $editingUserId ? 'Edit User' : 'Create New User' }}
                </h2>
            </div>

            <!-- ALERT LAMA SUDAH DIHAPUS BIAR BERSIH -->

            <div class="mt-8">
                <form wire:submit="{{ $editingUserId ? 'updateUser' : 'createNewUser' }}" class="space-y-6">
                    <!-- Name -->
                     <div>
                        <label class="block text-sm font-medium text-gray-100">Name</label>
                        <div class="mt-2">
                            <input wire:model="name" type="text" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-none ring-1 ring-white/10 focus:ring-2 focus:ring-indigo-500 sm:text-sm" />
                            @error('name') <p class="mt-2 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-100">Email</label>
                        <div class="mt-2">
                            <input wire:model="email" type="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-none ring-1 ring-white/10 focus:ring-2 focus:ring-indigo-500 sm:text-sm" />
                            @error('email') <p class="mt-2 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-100">Password</label>
                        <div class="mt-2">
                            <input wire:model="password" type="password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-none ring-1 ring-white/10 focus:ring-2 focus:ring-indigo-500 sm:text-sm" />
                            @error('password') <p class="mt-2 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <!-- File -->
                    <div class="col-span-full">
                        <label class="block text-sm font-medium text-white">Profile Picture</label>
                        <div wire:key="avatar-field-{{ $iteration }}">
                            @if($avatar && !$errors->has('avatar')) 
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-6 relative">
                                    <div class="text-center">
                                        <button type="button" wire:click="resetAvatar" class="absolute top-2 right-2 text-gray-400 hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg></button>
                                        <img src="{{ $avatar->temporaryUrl() }}" class="rounded-lg w-32 h-32 object-cover border border-gray-600 mx-auto">
                                        <p class="mt-2 text-xs text-gray-400">Click X to change</p>
                                    </div>
                                </div>
                            @else
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-6">
                                    <div class="text-center">
                                        <svg class="mx-auto size-12 text-gray-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" /></svg>
                                        <div class="mt-4 flex text-sm text-gray-400 justify-center">
                                            <label for="avatar-{{ $iteration }}" class="relative cursor-pointer text-indigo-400 hover:text-indigo-300">
                                                <span>Upload a file</span>
                                                <input wire:model.live="avatar" id="avatar-{{ $iteration }}" type="file" class="sr-only" accept="image/*" />
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-400">Any Image up to 50MB</p>
                                    </div>
                                </div>
                            @endif
                             <div wire:loading wire:target="avatar" class="text-sm text-indigo-400 animate-pulse mt-2 text-center">Uploading...</div>
                            @error('avatar') <p class="mt-2 text-xs text-red-500 text-center">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <!-- Button -->
                    <div>
                         <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold text-white hover:bg-indigo-400">
                            {{ $editingUserId ? 'Update User' : 'Create New User' }}
                        </button>
                    </div>
                </form>
            </div>
         </div>
    </div>
    @endif

    <!-- KOLOM KANAN: LIST USER -->
    <div class="{{ (auth()->check() && auth()->user()->is_admin) ? 'w-1/3' : 'w-full max-w-4xl' }} my-10 transition-all duration-500">
        <div class="sm:mx-auto mb-8">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-white">Users List</h2>
            @if(!auth()->check())
                <p class="text-center text-gray-400 text-sm mt-2">Login as Admin to manage users</p>
            @elseif(!auth()->user()->is_admin)
                <p class="text-center text-gray-400 text-sm mt-2">You are viewing as Guest (Read Only)</p>
            @endif
        </div>
        
        <div class="mb-6 flex gap-2">
            <div class="relative flex-1">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" /></svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search users..." class="block w-full rounded-md border-0 bg-white/5 py-2 pl-10 text-white ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-indigo-500 sm:text-sm" >
            </div>
             <div class="w-1/3">
                <select wire:model.live="sort" class="block w-full rounded-md border-0 bg-white/5 py-2 pl-3 text-white ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-indigo-500 sm:text-sm [&>option]:text-black">
                    <option value="desc">Newest</option>
                    <option value="asc">Oldest</option>
                </select>
            </div>
        </div>

        <ul role="list" class="divide-y divide-white/10">
            @foreach ($users as $user)
                <li class="flex justify-between gap-x-6 py-5" wire:key="{{ $user->id }}">
                    <div class="flex min-w-0 gap-x-4">
                        @if($user->avatar)
                             <img src="{{ asset('storage/'.$user->avatar) }}" class="size-12 flex-none rounded-full bg-gray-800 object-cover" />
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff" class="size-12 flex-none rounded-full bg-gray-800" />
                        @endif
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-white">{{ $user->name }}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-400">{{ $user->email }}</p>
                            @if($user->is_admin)
                                <span class="inline-flex items-center rounded-md bg-indigo-400/10 px-2 py-1 text-xs font-medium text-indigo-400 ring-1 ring-inset ring-indigo-400/30 mt-1">Admin</span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Tombol Action -->
                    @if(auth()->check() && auth()->user()->is_admin)
                    <div class="flex gap-2 items-center">
                        <button wire:click="edit({{ $user->id }})" class="text-indigo-400 hover:text-indigo-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                        </button>
                        <!-- PERHATIKAN: Pakai confirmDelete(), bukan delete() langsung -->
                        <button wire:click="confirmDelete({{ $user->id }})" class="text-red-400 hover:text-red-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                        </button>
                    </div>
                    @endif
                </li>
            @endforeach
        </ul>
        <div class="mt-5">{{ $users->links() }}</div>
    </div>

    <!-- CUSTOM DELETE MODAL (POP-UP HITAM) -->
    <!-- Ini pengganti alert putih bawaan browser -->
    @if($confirmingUserDeletion)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm transition-opacity">
        <div class="bg-gray-900 border border-white/10 p-6 rounded-xl shadow-2xl w-full max-w-md transform transition-all scale-100">
            <div class="text-center">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:h-10 sm:w-10 mb-4">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Delete Account?</h3>
                <p class="text-gray-400 text-sm mb-6">
                    Are you sure you want to delete this user? This action cannot be undone and all data will be permanently removed.
                </p>
            </div>
            <div class="flex justify-center gap-3">
                <button wire:click="cancelDelete" class="px-4 py-2 rounded-lg text-sm font-semibold text-gray-300 hover:text-white hover:bg-white/10 transition border border-white/10">
                    Cancel
                </button>
                <button wire:click="deleteUser" class="px-4 py-2 rounded-lg text-sm font-semibold bg-red-600 text-white hover:bg-red-700 transition shadow-lg shadow-red-500/20">
                    Yes, Delete it
                </button>
            </div>
        </div>
    </div>
    @endif

</div>