<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\CetakLaporan;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\laporan;



class CetakController extends Controller
{
    public function CetakPerTanggal($date_awal, $date_akhir, $status){   
        $cetak = DB::table('users')
        ->join('cleaning_service','cleaning_service.id_CS', '=', 'users.id')
        ->join('task_ruangan','task_ruangan.id_CS', '=', 'cleaning_service.id_CS')
        ->join('ruangan','ruangan.id_ruangan','task_ruangan.id_ruang')
        ->join('laporan_kebersihan','laporan_kebersihan.id_ruangan', '=', 'ruangan.id_ruangan')
        ->whereBetween('laporan_kebersihan.tanggal',[$date_awal, $date_akhir])
        ->where('laporan_kebersihan.status_task', 'like', '%'.$status.'%')
        ->get();
        return view('pages.cetak_pdf_tgl', compact('cetak'));
    }

    public function cetakexcel(){
        return Excel::download(new CetakLaporan, 'Laporan.xlsx');
    }


}
