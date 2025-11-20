<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        // Ambil 6 user terbaru dari database
        // Ini akan menampilkan data asli, bukan dummy
        $team = User::latest()->take(6)->get();

        return view('livewire.about', [
            'team' => $team
        ]);
    }
}