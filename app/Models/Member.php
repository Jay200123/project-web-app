<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $table='membershipinfo';

    public $timestamps = false;

    protected $primaryKey='info_id';

    protected $fillable = ['student_id', 'date_placed', 'status'];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function stats()
    {
        return $this->belongsTo(Status::class,'info_id');
    }
}
