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

    protected $fillable = ['user_id', 'date_placed', 'status'];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students(){
        return $this->belongsTo(Student::class, 'user_id');
    }

    public function stats()
    {
        return $this->belongsTo(Status::class,'info_id');
    }
}
