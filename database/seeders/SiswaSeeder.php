<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nis' => 234234,
                'id_user' => 12,
                'id_kelas' => Hash::make(123),
                'nama_siswa' => 'Aldo',
                'jenis_kelamin' => 'laki-laki',
                'foto_siswa' => 'images/guy.png'

            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            Siswa::create($val);
        }
    }
}
