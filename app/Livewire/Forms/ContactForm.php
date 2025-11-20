<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Form
{
    #[Validate('required|min:3', message: 'Nama minimal 3 karakter ya.')]
    public $name = '';

    #[Validate('required|email', message: 'Emailnya gak valid nih.')]
    public $email = '';

    #[Validate('required|min:5', message: 'Subjeknya terlalu pendek.')]
    public $subject = '';

    #[Validate('required|min:10', message: 'Pesan jangan pelit-pelit, minimal 10 karakter.')]
    public $message = '';

    public function send()
    {
        $this->validate();

        // Kirim email ke alamat tujuan
        // Pastikan file .env kamu sudah disetting SMTP-nya
        $body = "Nama: {$this->name}\nEmail: {$this->email}\n\nPesan:\n{$this->message}";

        Mail::raw($body, function ($message) {
            $message->to('luthfi.rafanandanaufal@gmail.com')
                    ->subject('Pesan Baru: ' . $this->subject);
        });

        sleep(2); // Biar kelihatan loadingnya (efek dramatis)
        
        $this->reset();
    }
}