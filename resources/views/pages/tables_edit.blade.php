@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="container text-center">
      <h1 class="text-white"><b>Ubah Distribusi Ruangan</b></h1>
      <hr style="border-top-color:#ff4a57; border-top-width:3pt;">
  </div>
  <br><br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-body">
          <div class="table-responsive">
              <form method="POST" action="/tables">
                  @method('patch')
                  @csrf
                  <div class="form-group mt-3">
                      <label >Nama Cleaning Service</label>
                      <select name="id" id="id" class="form-control ">
                          <option value="">--Pilih Cleaning Service--</option>
                          @foreach ($cs as $cs)
                          <option value="{{ $cs->id }}">{{ $cs->name }}</option>
                          @endforeach
                      </select>
      
                    </div>
                    <div class="form-group">  
                      @foreach ($ruang as $ruang)
                          <label>Nama Ruangan</label>
                          <label class="form-control">{{$ruang->nama_ruangan}}</label>
                          <input type="hidden" name="id_ruangan" value="{{$ruang->id_ruangan}}">
                      @endforeach                 
                  </div>
                  <button type="submit" class="btn btn-primary">Ubah</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection