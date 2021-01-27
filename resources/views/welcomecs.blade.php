@extends('layouts.appcs')

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
            <?php
                $gambar="noimage.png";
                $gambar2="noimage.png";
                $gambar3="noimage.png";
                $gambar4="noimage.png";
                $gambar5="noimage.png";
            ?>
            @foreach($pr as $pr)
        <div class="col-lg-4 col-md-6">
            <div class="flip-card mb-4">
                <div class="flip-card-inner">
                    @if($pr->status_task == 'Sudah')
                    <div class="flip-card-front bg-success text-center">
                    @else
                    <div class="flip-card-front bg-danger text-center">
                    @endif
                        <div class="container mt-5">
                            <h3>{{$pr->nama_ruangan}}</h3>
                        </div>
                        <h1 class="text">{{$pr->id_ruangan}}</h1>
                        <h4>{{$pr->name}}</h4>
                    </div>
                    <?php
                        $id = $pr->id_ruangan;
                    ?>
                    <div class="flip-card-back">
                        <img class="img-fluid" src="data:image/jpg;base64, {{base64_encode($pr->foto_ruangan)}}" alt="images">
                        <button type="button" class="btn" data-toggle="modal" data-target="#myModall{{$id}}">Upload </button>
                        <button type="button" class="btn" data-toggle="modal" data-target="#myModall1{{$id}}">Lihat Bukti </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="myModall{{$id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bukti Photo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id_ruangan" value="{{$id}}">
                            <p>Bukti Pekerjaan 1</p>
                            <input type="file" id="bukti" name="bukti" multiple class="mdl-textfield__input">
                            <br><br>
                            <p>Bukti Pekerjaan 2</p>
                            <input type="file" id="bukti2" name="bukti2" multiple class="mdl-textfield__input">
                            <br><br>
                            <p>Bukti Pekerjaan 3</p>
                            <input type="file" id="bukti3" name="bukti3" multiple class="mdl-textfield__input">
                            <br><br>
                            <p>Bukti Pekerjaan 4</p>
                            <input type="file" id="bukti4" name="bukti4" multiple class="mdl-textfield__input">
                            <br><br>
                            <p>Bukti Pekerjaan 5</p>
                            <input type="file" id="bukti5" name="bukti5" multiple class="mdl-textfield__input">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary ml-auto mr-2">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                    </div>   
                </div>
            </div>
        </div>

        <?php
            $bukti = array($pr->bukti_task, $pr->bukti_task2, $pr->bukti_task3, $pr->bukti_task4, $pr->bukti_task5);
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="myModall1{{$id}}">
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
                    @for($j = 0; $j < count($bukti); $j++)
                        @if($bukti[$j] != NULL)
                            <?php 
                                $f = finfo_open();
                                $data = finfo_buffer($f, $bukti[$j], FILEINFO_MIME_TYPE);
                                $split = explode( '/', $data );
                                $type = $split[1];
                            ?>
                            @if ($type == 'mp4' || $type == 'webm')
                                <div class="col-lg-6 col-md-6 mb-3" style="margin-left:-15%">
                                    <video class ="mt-4" width="300" height="150" controls>
                                        <source src="data:video/mp4;base64, {{base64_encode($bukti[$j])}}" type="video/mp4">
                                    </video>
                                </div>
                            @else
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <img class="img-fluid" src="data:image/jpg;base64, {{base64_encode($bukti[$j])}}" alt="images">
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
        @endforeach            
        </div>
    </div>
@endsection