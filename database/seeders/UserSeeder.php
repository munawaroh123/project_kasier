<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        $user = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('abcdefgh'),
                'jk'  => 'P',
                'tgl_lahir'  => '2005-11-08',
                'nomor_telepon'  => '087720379351',
                'alamat'  => 'Bumi pasanggarahan regency',
                'role' => 'admin',


                
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'role' => 'kasir',
                'password' => bcrypt('ijklmnop'),
                'jk'  => 'L',
                'tgl_lahir'  => '2005-11-09',
                'nomor_telepon'  => '087720379352',
                'alamat'  => 'JL pasir hayam',
                'role' => 'kasir',
            ],
        
 ];

        foreach ($user as $key => $value){
            User::create($value);
        }
    
    }
}
