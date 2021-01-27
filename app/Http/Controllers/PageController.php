<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\task;
use App\Models\users;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        {
            $cs = DB::table('users')
            ->join('task_ruangan','users.id', 'task_ruangan.id_CS')
            ->join('ruangan','ruangan.id_ruangan', 'task_ruangan.id_ruang')
            ->get();
            return view('pages.icons', compact('cs'));
        }
    }



    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables_view()
    {
        $distribusi = DB::table('users')
        ->join('task_ruangan','task_ruangan.id_CS', '=', 'users.id')
        ->join('ruangan','task_ruangan.id_ruang', '=', 'ruangan.id_ruangan')
        ->get();
        return view('pages.tables', compact('distribusi'));
    }

    /**
     * Display tables page
     * @return \Illuminate\View\View
     */
    public function tables_create()
    {
        // $distribusi_create = users::all();
        $cs = DB::table('users')
        ->get();

        $ruang = DB::table('ruangan')
        ->leftjoin('task_ruangan','task_ruangan.id_ruang', '=', 'ruangan.id_ruangan')
        ->where('id_CS', '=', null) 
        ->get();

        return view('pages.tables_create', compact('cs','ruang'));
    }
    
    /**
     * Display tables page
     * @param \Illuminate\Http\Request
     * @param \Illuminate\Http\Respone
     * @return \Illuminate\View\View
     */
    public function tables_store(Request $request)
    {
        $task = new task ;
        $task->id_ruang = $request->id_ruangan;
        $task->id_CS = $request->id;
        $task->status_task = 'Belum';
        $task->save();
        return redirect('tables');
    }

    /**
     * Display tables page
     * @return \Illuminate\View\View
     * @return \Illuminate\View\Response
     */
    public function tables_destroy($id_task)
    {
        $db=DB::table('task_ruangan')->where('id_task',$id_task);
        $db->delete();
        return redirect('/tables');
    }

    /**
     * Display tables page
     * @return \Illuminate\View\View
     * @return \Illuminate\View\Response
     */
    public function tables_edit($id_task)
    {
     
        // $task = DB::table('task_ruangan')
        // ->get();
        $cs = DB::table('users')
        ->get();

        $ruang = DB::table('ruangan')
        ->leftjoin('task_ruangan','task_ruangan.id_ruang', '=', 'ruangan.id_ruangan')
        ->where('id_task', '=', $id_task) 
        ->get();

        return view('pages.tables_edit', compact('cs', 'ruang'));

    }

    public function tables_edit_store(Request $request)
    {
        
        $task = DB::table('task_ruangan')
                    ->where('id_ruang', $request->id_ruangan)
                    ->update([
                        'id_CS' => $request->id
                    ]);
        return redirect('tables');

    }

    public function tables_reset()
    {
        $reset = DB::table('task_ruangan')
                    ->where('status_task', 'Sudah')            
                    ->update([
                        'status_task' => 'Belum',
                        'bukti_task' => NULL,
                        'bukti_task2' => NULL,
                        'bukti_task3' => NULL,
                        'bukti_task4' => NULL,
                        'bukti_task5' => NULL
                    ]);
        return redirect('/tables');
    }


    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function rtl()
    {
        return view('pages.rtl');
    }
    
    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {   
        $distribusi = DB::table('users')
        ->join('task_ruangan','task_ruangan.id_CS', '=', 'users.id')
        ->join('ruangan','task_ruangan.id_ruang', '=', 'ruangan.id_ruangan')
        ->get();
        return view('pages.maps', compact('distribusi'));
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('pages.typography');
    }

    /**
     * Display upgrade page
     *
     * @return \Illuminate\View\View
     */
    public function upgrade()
    {
        return view('pages.upgrade');
    }
}