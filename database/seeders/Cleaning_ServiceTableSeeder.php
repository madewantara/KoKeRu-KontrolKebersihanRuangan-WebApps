<?php
namespace Database\Seeders;

use App\Models\CleaningService;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Cleaning_ServiceTableSeeder extends Seeder
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
                'id_CS' => 'CS001',
                'nama_CS' => 'Made Dewantara',
                'email_CS' => 'made@gmail.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '812345678',
                'alamat_CS' => 'Cibinog Griya Asri Blok BL no 7'
            ],
            [
                'id_CS' => 'CS002',
                'nama_CS' => 'Fadhillah Ahya',
                'email_CS' => 'ahya@gmail.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '812345678',
                'alamat_CS' => 'Cibinog Griya Asri Blok BL no 7'
            ],
            [
                'id_CS' => 'CS003',
                'nama_CS' => 'Bagus Sajiwo',
                'email_CS' => 'bagus@gmail.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '879632452',
                'alamat_CS' => 'Perum Gombel No 88'
            ],
            [
                'id_CS' => 'CS004',
                'nama_CS' => 'Aditya Rahmat',
                'email_CS' => 'adit@gmail.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '817474569',
                'alamat_CS' => 'Pedurungan Indah, no 9'
            ],
            [
                'id_CS' => 'CS005',
                'nama_CS' => 'Auliya Daffa Isy',
                'email_CS' => 'auliya@gmail.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '871111253',
                'alamat_CS' => 'Gunung Pati Regency No 8'
            ],
            [
                'id_CS' => 'CS006',
                'name_CS' => 'Adristi Fauziah Larasati',
                'email_CS' => 'adristi@gmail.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '812145659',
                'alamat_CS' => 'Bogor Raya Permai No 3'
            ],
            [
                'id_CS' => 'CS007',
                'nama_CS' => 'Andien Dwi Novika',
                'email_CS' => 'andien@gmail.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '896363545',
                'alamat_CS' => 'Permata Tembalang No 17'
            ],
            [
                'id_CS' => 'CS008',
                'name_CS' => 'Maulana Kafie Diara',
                'email_CS' => 'kafie@gmail.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '812456975',
                'alamat_CS' => 'Metropolitan Bekasi No 33'
            ],
            [
                'id_CS' => 'CS009',
                'nama_CS' => 'Rezza Aldy',
                'email_CS' => 'rezza@gmail.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '845697859',
                'alamat_CS' => 'Srondol Indah No 21'
            ],
            [
                'id_CS' => 'CS010',
                'nama_CS' => 'Gamas Adi',
                'email_CS' => 'gamas@gmail.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '875631245',
                'alamat_CS' => 'Perum Gontor Tembalang No 25'
            ],
            [
                'id_CS' => 'MG001',
                'nama_CS' => 'Andra Adhiatma Nugraha',
                'email_CS' => 'andra@admin.com',
                'password_CS' => Hash::make('secret'),
                'telp_CS' => '811145263',
                'alamat_CS' => 'Perum Ungaran Jaya No 97'
            ],       
        ];
        DB::table('cleaning_service')->insert($data);
    }
}