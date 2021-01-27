<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\TaskRuangan;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->task=new TaskRuangan;
    }
    public function index(Request $request)
    {
        $pr = DB::table('task_ruangan')
        ->join('ruangan', 'ruangan.id_ruangan', 'task_ruangan.id_ruang')
        ->join('users', 'users.id', 'task_ruangan.id_CS')
        ->where('task_ruangan.id_CS',auth()->user()->id)
        ->get();
        return view('welcomecs', compact('pr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($_POST['submit'])){
            // $cek = $this->task
            //        ->where('id_ruang',$_POST['id_ruangan'])
            //        ->where('tanggal',date('Y-m-d'))
            //        ->first();
            $a = $request->bukti;
            if($a != NULL){
                $bukti = file_get_contents($a);
                $file = $bukti;
            }
            else{
                $file = NULL;
            }

            $a = $request->bukti2;
            if($a != NULL){
                $bukti2 = file_get_contents($a);
                $file2 = $bukti2;
            }
            else{
                $file2 = NULL;
            }

            $a = $request->bukti3;
            if($a != NULL){
                $bukti3 = file_get_contents($a);
                $file3 = $bukti3;
            }
            else{
                $file3 = NULL;
            }

            $a = $request->bukti4;
            if($a != NULL){
                $bukti4 = file_get_contents($a);
                $file4 = $bukti4;
            }
            else{
                $file4 = NULL;
            }

            $a = $request->bukti5;
            if($a != NULL){
                $bukti5 = file_get_contents($a);
                $file5 = $bukti5;
            }
            else{
                $file5 = NULL;
            }
            
            DB::table('task_ruangan')
                ->where('id_ruang', $request->id_ruangan)            
                ->update([
                    'status_task' => 'Sudah',
                    'bukti_task' => $file,
                    'bukti_task2' => $file2,
                    'bukti_task3' => $file3,
                    'bukti_task4' => $file4,
                    'bukti_task5' => $file5
            ]);
                // ->join('users', 'users.id', 'task_ruangan.id_CS')
                // ->where('id_ruang',$_POST['id_ruangan'])
                // ->update(['status_task' => 'Sudah', 'bukti_task' => $bukti, 'bukti_task2' => $bukti2, 'bukti_task3' => $bukti3, 'bukti_task4' => $bukti4, 'bukti_task5' => $bukti5]);

                    //code update
                    // $task=$this->task->find($cek->id_task);
                    // if($_FILES['bukti']['name']!=""){
                    // $task->bukti_task=addslashes(file_get_contents($_FILES['bukti']['tmp_name']));
                    // }
                    // if($_FILES['bukti2']['name']!=""){
                    // $task->bukti_task2=addslashes(file_get_contents($_FILES['bukti2']['tmp_name']));
                    // }
                    // if($_FILES['bukti3']['name']!=""){
                    // $task->bukti_task3=addslashes(file_get_contents($_FILES['bukti3']['tmp_name']));
                    // }
                    
                    // if($_FILES['bukti4']['name']!=""){
                    // $task->bukti_task4=addslashes(file_get_contents($_FILES['bukti4']['tmp_name']));
                    // }
                    // if($_FILES['bukti5']['name']!=""){
                    // $task->bukti_task5=addslashes(file_get_contents($_FILES['bukti5']['tmp_name']));
                    // }
                    // $task->save();
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}