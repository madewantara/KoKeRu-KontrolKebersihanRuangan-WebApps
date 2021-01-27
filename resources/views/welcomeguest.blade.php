@extends('layouts.appguest')

@section('content')
    <div class="header">
        <div class="container">
            <div class="header-body mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <h1 class="text-white" style="font-size:72pt;"><b>{{ __('Ko Ke Ru') }}</b></h1>
                        <h3 class="text-white" style="font-size:32pt">{{ __('Sistem Kontrol Kebersihan Ruangan') }}</h3>
                        <hr style="border-color:#ff4a57; border-width: 8px"></hr>
                    </div>
                </div>
            </div>
            <div class="date text-center">
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
            <div class="time text-center" id="curr_time">
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
                            $hasil = $cs->id_ruangan; 
                        ?>
                        @if ($cs->status_task == 'Sudah')
                            <div class="flip-card-front bg-success text-center">
                                <div class="container mt-5">
                                    <h3>{{$cs->nama_ruangan}}</h3>
                                </div>
                                <h1 class="text">{{$cs->id_ruangan}}</h1>
                                <p>{{$cs->nama_CS}}</p>
                            </div>
                            <div class="flip-card-back">
                                <img class="img-fluid" src="data:image/jpg;base64, {{base64_encode($cs->foto_ruangan)}}" alt="images">
                                <p style="color:white; text-align:center; margin-top: -65%; margin-left: 5%; margin-right: 5%;">{{$cs->deskripsi_ruangan}}</p>
                            </div>
                        @else
                            <div class="flip-card-front bg-danger text-center">
                                <div class="container mt-5">
                                    <h3>{{$cs->nama_ruangan}}</h3>
                                </div>
                                <h1 class="text">{{$cs->id_ruangan}}</h1>
                                <p>{{$cs->nama_CS}}</p>
                            </div>
                            <div class="flip-card-back">
                                <img class="img-fluid" src="data:image/jpg;base64, {{base64_encode($cs->foto_ruangan)}}" alt="images">
                                <p style="color:white; text-align:center; margin-top: -65%; margin-left: 5%; margin-right: 5%;">{{$cs->deskripsi_ruangan}}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection