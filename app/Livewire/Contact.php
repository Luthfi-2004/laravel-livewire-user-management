<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use Livewire\Component;

class Contact extends Component
{
    public ContactForm $form;

    public function save()
    {
        $this->form->send();
        
        // REVISI: Pakai Toast Melayang
        $this->dispatch('notify', message: 'Pesan berhasil dikirim! Kami akan segera membalas.');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}