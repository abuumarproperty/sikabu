<?php

namespace Database\Seeders;

use App\Models\Deposit;
use App\Models\Land;
use App\Models\Payment;
use App\Models\Purchase;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Didi Riwanda',
            'avatar' => 'didiriwanda.png',
            'username' => 'didiriwanda',
            'email' => 'didiriwanda02@gmail.com',
            'password' => bcrypt('password'),
            'status' => 'admin',
        ]);

        Land::factory()->create([
            'nama' => 'Al-Madinah 1',
        ]);

        Land::factory()->create([
            'nama' => 'Al-Madinah 2'
        ]);

        Land::factory()->create([
            'nama' => 'Al-Madinah 3'
        ]);

        Purchase::factory()->create([
            'nama' => 'Kredit'
        ]);

        Purchase::factory()->create([
            'nama' => 'Cash Bertahap'
        ]);

        Purchase::factory()->create([
            'nama' => 'Cash Keras'
        ]);

        Deposit::factory()->create([
            'nama' => 'Angsuran'
        ]);

        Deposit::factory()->create([
            'nama' => 'Dp'
        ]);

        Deposit::factory()->create([
            'nama' => 'Panjar (Booking)'
        ]);

        Deposit::factory()->create([
            'nama' => 'Pelunasan'
        ]);

        Payment::factory()->create([
            'nama' => 'Tunai'
        ]);

        Payment::factory()->create([
            'nama' => 'Transfer'
        ]);
    }
}
