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

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
