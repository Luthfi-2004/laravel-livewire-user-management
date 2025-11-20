<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'totalUsers' => User::count(),
            'newUsers' => User::where('created_at', '>=', now()->subDays(7))->count(),
            'recentUsers' => User::latest()->take(3)->get()
        ]);
    }
}