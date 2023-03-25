<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    use HasFactory;

    public $table='loginfo';

    protected $primaryKey='log_id'; 

    protected $fillable=['user_id','position','log_date','timeIn','timeOut'];

    public function user(){
        return $this->belongsTo(User::Class);
    }
}
