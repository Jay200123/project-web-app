<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public $table='statusline';

    public $timestamps = false;

    protected $fillable = ['info_id', 'date_paid', 'amount'];


}
