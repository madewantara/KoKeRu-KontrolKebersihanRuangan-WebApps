<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'id' => 'MG001',
                'name' => 'Andra Adhiatma Nugraha',
                'email' => 'andra@admin.com',
                'email_verified_at' => now(),
                'is_admin' => 1,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'CS001',
                'name' => 'Made Dewantara',
                'email' => 'made@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => 0,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'CS003',
                'name' => 'Bagus Sajiwo',
                'email' => 'bagus@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => 0,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'CS004',
                'name' => 'Aditya Rahmat',
                'email' => 'aditya@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => 0,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'CS005',
                'name' => 'Auliya Daffa Isy',
                'email' => 'auliya@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => 0,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'CS006',
                'name' => 'Adristi Fauziah',
                'email' => 'adristi@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => 0,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'CS007',
                'name' => 'Andien Dwi Novika',
                'email' => 'andien@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => 0,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'CS008',
                'name' => 'Maulana Kafie Diara',
                'email' => 'kafie@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => 0,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'CS009',
                'name' => 'Rezza Aldy',
                'email' => 'rezza@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => 0,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'CS010',
                'name' => 'Gamas Adi',
                'email' => 'gamas@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => 0,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 'CS002',
                'name' => 'Fadhillah Ahya',
                'email' => 'ahya@gmail.com',
                'email_verified_at' => now(),
                'is_admin' => 0,
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],       
        ];
        DB::table('users')->insert($data);
    }
}