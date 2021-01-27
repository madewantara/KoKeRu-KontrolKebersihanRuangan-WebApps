@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

@section('content')
    <div class="container text-center">
        <h1 class="text-white"><b>Dashboard</b></h1>
        <hr style="border-top-color:#ff4a57; border-top-width:3pt;">
    </div>
    <br><br><br>
    <div class="header">
        <div class="container">
            <div class="date text-center text-white">
                <script>
                    var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
                    document.write(hari[new Date().getDay()])
                </script>, 
                <script>
                    document.write(new Date().getDate())
                </script> 
                <script>
                    var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                    document.write(months[new Date().getMonth()])
                </script> 
                <script>
                    document.write(new Date().getFullYear())
                </script>
            </div>
            <div class="time text-center text-white" id="curr_time">
                <script>
                    var div = document.getElementById('curr_time'); 
                    function time() {
                        div.innerHTML = "";
                        var d = new Date();
                        var s = d.getSeconds();
                        var m = d.getMinutes();
                        var h = d.getHours();
                        div.innerHTML = h + ":" + m + ":" + s;
                    }
                    setInterval(time, 1000);
                </script>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @foreach($cs as $cs)
            <div class="col-lg-4 col-md-6">
                <div class="flip-card mb-4">
                    <div class="flip-card-inner">
                        <?php
                            $hasil = $cs->id_ruang; 
                        ?>
                        @if ($cs->status_task == 'Sudah')
                            <div class="flip-card-front bg-success text-center">
                                <div class="container mt-5">
                                    <h3>{{$cs->nama_ruangan}}</h3>
                                </div>
                                <h1 class="text">{{$cs->id_ruang}}</h1>
                                <p>{{$cs->name}}</p>
                            </div>
                            <div class="flip-card-back">
                                <img class="img-fluid" src="data:image/jpg;base64, {{base64_encode($cs->foto_ruangan)}}" alt="images">
                                <button type="button" class="btn" data-toggle="modal" data-target="#myModal{{$hasil}}">Lihat Detil</button>
                            </div>
                        @else
                            <div class="flip-card-front bg-danger text-center">
                                <div class="container mt-5">
                                    <h3>{{$cs->nama_ruangan}}</h3>
                                </div>
                                <h1 class="text">{{$cs->id_ruang}}</h1>
                                <p>{{$cs->name}}</p>
                            </div>
                            <div class="flip-card-back">
                                <img class="img-fluid" src="data:image/jpg;base64, {{base64_encode($cs->foto_ruangan)}}" alt="images">
                                <button type="button" class="btn" data-toggle="modal" data-target="#myModal{{$hasil}}">Lihat Detil</button>
                            </div>
                        @endif
                    </div>
                </div>
                <?php
                    $bukti = array($cs->bukti_task, $cs->bukti_task2, $cs->bukti_task3, $cs->bukti_task4, $cs->bukti_task5);
                ?>
                <div class="modal fade" role="dialog" id="myModal{{$hasil}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Bukti Photo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row text-center justify-content-center">
                                @for($i = 0; $i < count($bukti); $i++)
                                    @if($bukti[$i] != NULL)
                                    <?php 
                                        $f = finfo_open();
                                        $data = finfo_buffer($f, $bukti[$i], FILEINFO_MIME_TYPE);
                                        $split = explode( '/', $data );
                                        $type = $split[1];
                                    ?>
                                        @if ($type == 'mp4' || $type == 'webm')
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <video class ="mt-4" style="margin-left:-15%" width="300" height="150" controls>
                                                    <source src="data:video/mp4;base64, {{base64_encode($bukti[$i])}}" type="video/mp4">
                                                </video>
                                            </div>
                                        @else
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <img class="img-fluid" src="data:image/jpg;base64, {{base64_encode($bukti[$i])}}" alt="images">
                                            </div>
                                        @endif
                                    @endif
                                @endfor
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary ml-auto" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection