<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskRuangan extends Model
{
    use HasFactory;
    protected $table = 'task_ruangan';
    protected $fillable = ['id_task', 'id_ruang', 'bukti_task'];
	protected $primaryKey = "id_task";
	public $timestamps = false;
}
