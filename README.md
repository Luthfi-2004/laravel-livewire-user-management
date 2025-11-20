Livewire Dashboard App 🚀

Aplikasi User Management modern yang dibangun menggunakan Laravel 11 dan Livewire 3 (TALL Stack). Aplikasi ini dilengkapi dengan sistem CRUD lengkap, otentikasi, manajemen peran (Admin/User), dan antarmuka Dark Mode yang responsif.

✨ Fitur Utama

Full CRUD User Management: Membuat, Membaca, Mengubah, dan Menghapus data user.

Real-time Search & Sorting: Pencarian dan pengurutan data tanpa reload halaman (SPA feel).

Image Upload: Upload foto profil dengan preview instan dan penanganan file otomatis.

Authentication: Sistem Login, Register, dan Logout menggunakan Laravel Breeze.

Role-Based Access Control (RBAC):

Admin: Akses penuh (Create, Edit, Delete).

Guest/User Biasa: Hanya bisa melihat data (Read Only).

Global Toast Notifications: Notifikasi pop-up melayang yang interaktif menggunakan Alpine.js.

Contact Form: Formulir kontak yang terintegrasi dengan SMTP Email dan validasi real-time.

Responsive Dark Mode UI: Tampilan modern menggunakan Tailwind CSS.

🛠️ Teknologi yang Digunakan

Framework: Laravel 11

Frontend: Livewire 3 + Volt

Styling: Tailwind CSS

Interactivity: Alpine.js

Database: MySQL

💻 Cara Install di Localhost

Ikuti langkah-langkah ini untuk menjalankan project di komputer Anda:

Clone Repository

git clone [https://github.com/USERNAME-KAMU/livewire-dashboard-app.git](https://github.com/USERNAME-KAMU/livewire-dashboard-app.git)
cd livewire-dashboard-app


Install Dependencies

composer install
npm install


Setup Environment
Duplikat file .env.example menjadi .env:

cp .env.example .env


Buka file .env dan sesuaikan konfigurasi database (DB_DATABASE, DB_USERNAME, dll) dan mail server (MAIL_USERNAME, MAIL_PASSWORD).

Generate Key

php artisan key:generate


Migrasi Database
Pastikan database sudah dibuat di MySQL/Laragon/XAMPP, lalu jalankan:

php artisan migrate


Setup Storage Link (Penting agar gambar profil muncul)

php artisan storage:link


Jalankan Aplikasi

npm run dev
php artisan serve


Buka browser dan akses: http://127.0.0.1:8000

🔑 Cara Membuat Akun Admin

Secara default, user yang mendaftar (Register) adalah User Biasa (Read Only). Untuk mengubah user menjadi Admin:

Daftar akun baru melalui halaman Register.

Buka terminal di project folder, lalu masuk ke Tinker:

php artisan tinker


Jalankan perintah berikut (ganti email sesuai akun Anda):

User::where('email', 'email@anda.com')->update(['is_admin' => true]);


Ketik exit untuk keluar.

Refresh browser, sekarang Anda memiliki akses penuh!

📷 Screenshots

(Anda bisa menambahkan screenshot aplikasi di sini nanti)

Dibuat dengan ❤️ menggunakan Laravel & Livewire.
