<?php
namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManagerTableSeeder extends Seeder
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
                'id_manager' => 'MG001',
                'nama_manager' => 'Andra Adhiatma',
                'email_manager' => 'andra@gmail.com',
                'password_manager' => Hash::make('secret'),
                'telp_manager' => '812345678',
                'alamat_manager' => 'Cepu Griya Asri Blok BL no 7'
            ] 
        ];
        DB::table('manager')->insert($data);
    }
}