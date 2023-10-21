<?php

namespace Database\Seeders;
use App\Models\WaliKelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WaliKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nis' => 'tatausaha',
                'id_user' => 'tatausaha',
                'id_kelas' => Hash::make('123'),
                'nama_siswa' => 'tatausaha',
                'jensi_kelamin' => 'tatausaha',
                'foto_siswa' => 'images/guy.png'

            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            WaliKelas::create($val);
        }
    }
}
