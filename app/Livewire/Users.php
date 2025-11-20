<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{
    use WithFileUploads, WithPagination;
    
    // Filter & Sorting
    public $search = '';
    public $sort = 'desc';
    
    // State Form
    public $editingUserId = null;
    public $iteration = 1;

    public $confirmingUserDeletion = false;
    public $userIdToDelete = null;

    // Input Fields
    public $name = '';
    public $email = '';
    public $password = '';
    public $avatar;

    public function updatingSearch() { $this->resetPage(); }
    public function updatingSort() { $this->resetPage(); }

    public function resetAvatar()
    {
        $this->avatar = null;
        $this->iteration++;
        $this->resetValidation('avatar');
    }

    public function updatedAvatar()
    {
        $this->validateOnly('avatar', ['avatar' => 'nullable|image|max:51200']);
    }

    public function createNewUser() 
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            $this->dispatch('notify', message: 'Maaf, hanya Admin yang boleh menambah user!', type: 'error');
            return;
        }

        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3',
            'avatar' => 'nullable|image|max:51200' 
        ]);

        sleep(1);

        $avatarPath = null;
        if($this->avatar){
            $avatarPath = $this->avatar->store('avatar', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $avatarPath
        ]);

        $this->reset(['name', 'email', 'password', 'avatar']); 
        $this->iteration++; 
        
        $this->dispatch('notify', message: 'User created successfully');
    }

    public function edit($id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) return;

        $user = User::findOrFail($id);
        $this->editingUserId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = ''; 
        $this->resetValidation();
        $this->iteration++; 
    }

    public function updateUser()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            $this->dispatch('notify', message: 'Anda tidak memiliki izin!', type: 'error');
            return;
        }

        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns|unique:users,email,' . $this->editingUserId,
            'password' => 'nullable|min:3',
            'avatar' => 'nullable|image|max:51200'
        ]);

        $user = User::findOrFail($this->editingUserId);
        $data = ['name' => $this->name, 'email' => $this->email];

        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        if ($this->avatar) {
            if ($user->avatar) Storage::disk('public')->delete($user->avatar);
            $data['avatar'] = $this->avatar->store('avatar', 'public');
        }

        $user->update($data);
        $this->cancelEdit();
        
        $this->dispatch('notify', message: 'User updated successfully');
    }

    public function cancelEdit()
    {
        $this->reset(['name', 'email', 'password', 'avatar', 'editingUserId']);
        $this->resetValidation();
        $this->iteration++;
    }

    // --- MODAL DELETE LOGIC (BARU) ---
    
    // 1. Buka Modal Konfirmasi
    public function confirmDelete($id)
    {
        if (!auth()->check() || !auth()->user()->is_admin) return;
        
        $this->confirmingUserDeletion = true;
        $this->userIdToDelete = $id;
    }

    // 2. Batalkan Penghapusan
    public function cancelDelete()
    {
        $this->confirmingUserDeletion = false;
        $this->userIdToDelete = null;
    }

    // 3. Eksekusi Hapus (Dipanggil dari Modal)
    public function deleteUser()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            $this->dispatch('notify', message: 'Eits, dilarang menghapus sembarangan!', type: 'error');
            return;
        }

        if ($this->userIdToDelete == auth()->id()) {
             $this->dispatch('notify', message: 'Anda tidak bisa menghapus akun sendiri!', type: 'error');
             $this->cancelDelete();
             return;
        }

        $user = User::findOrFail($this->userIdToDelete);
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }
        $user->delete();
        
        // Tutup modal dan reset
        $this->confirmingUserDeletion = false;
        $this->userIdToDelete = null;

        $this->dispatch('notify', message: 'User deleted successfully');
    }

    public function render()
    {
        $users = User::query()
            ->where(function($query) {
                $query->where('name', 'like', '%'.$this->search.'%')
                      ->orWhere('email', 'like', '%'.$this->search.'%');
            })
            ->orderBy('created_at', $this->sort)
            ->paginate(6);

        return view('livewire.users', [
            'title' => 'Users',
            'users' => $users
        ]);
    }
}