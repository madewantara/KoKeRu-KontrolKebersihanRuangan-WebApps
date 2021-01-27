@extends('layouts.app', ['page' => __('Maps'), 'pageSlug' => 'maps'])

@section('content')
  <div class="container text-center">
        <h1 class="text-white"><b>Cetak Laporan</b></h1>
        <hr style="border-top-color:#ff4a57; border-top-width:3pt;">
  </div>
  <br><br>
  <div class="container">
    <div class="card-body bg-white" style="border-radius:5px">
          <div class="form-group">
              <label for="label">Tanggal Awal</label>
              <input type="date" name="date_awal" id="date_awal" class="form-control">
          </div>
          <div class="form-group">
              <label for="label">Tanggal Akhir</label>
              <input type="date" name="date_akhir" id="date_akhir" class="form-control">
          </div>
          <div class="form-group">
              <label for="label">Pilih Status</label>
              <select class="form-control" id="status">
                <option value="u">Semua</option>
                <option value="Sudah">Sudah</option>
                <option value="Belum">Belum</option>
              </select>
          </div>
          <a href="" onclick="this.href='/cetak_pdf_tgl/'+document.getElementById('date_awal').value + '/' + document.getElementById('date_akhir').value + '/' + document.getElementById('status').value" target="_blank" class="btn btn-success  animation-on-hover">Cetak</a>
          <a href="/cetak_excel" class="btn btn-info  animation-on-hover">Cetak Excel</a>
    </div>
  </div>
@endsection