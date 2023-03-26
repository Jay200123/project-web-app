<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    use HasFactory;

    public $table='loginfo';

    protected $primaryKey='log_id'; 

    protected $fillable=['student_id','position','log_date','timeIn','timeOut'];

    public function student(){
        return $this->belongsTo(Student::Class, 'student_id');
    }
}
