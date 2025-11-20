<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $total = 10000; // jumlah user yang diinginkan
        $batch = 2000;  // batch per insert (atur 1000-5000 tergantung RAM)

        $now = now();

        for ($i = 1; $i <= $total; $i += $batch) {
            $insert = [];

            for ($j = 0; $j < $batch && ($i + $j) <= $total; $j++) {
                $num = $i + $j;
                $insert[] = [
                    'name' => 'User ' . $num,
                    'email' => "user{$num}@example.com",
                    'email_verified_at' => $now,
                    'password' => bcrypt('password'),
                    'remember_token' => Str::random(10),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            DB::table('users')->insert($insert);

            echo "Inserted up to user: " . ($i + count($insert) - 1) . PHP_EOL;
        }
    }
}
