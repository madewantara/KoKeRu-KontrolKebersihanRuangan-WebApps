@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="container text-center">
      <h1 class="text-white"><b>Distribusi Ruangan</b></h1>
      <hr style="border-top-color:#ff4a57; border-top-width:3pt;">
  </div>
  <br><br>
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <div class="card ">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table tablesorter " id="">
                        <a href="tables_create" class="btn btn-info btn-sm animation-on-hover float-left mb-3">Tambah Distribusi +</a>
                        <thead class=" text-primary">
                            <tr class="text-center">
                              <th scope="col">ID</th>
                              <th scope="col">Cleaning Service</th>
                              <th scope="col">Ruang</th>
                              <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($distribusi as $db)
                            <tr>
                                <td>
                                  {{ $loop->iteration }}
                                </td>
                                <td>
                                  {{ $db->name }}
                                </td>
                                <td>
                                  {{ $db->nama_ruangan }}
                                </td>
                                <td>
                                  <a href="tables_edit/{{ $db->id_task }}" class="btn btn-success btn-sm animation-on-hover">Edit</a>
                                  <a href="tables_destroy/{{$db->id_task}}" onclick="return confirm('Apakah anda yakin untuk reset seluruh status ruangan?')" class="btn btn-danger btn-sm animation-on-hover">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <a href="tables_reset" onclick="confirm('Apakah anda yakin untuk reset seluruh status ruangan?')" class="btn btn-danger btn-sm animation-on-hover float-right">Reset Seluruh Status</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection