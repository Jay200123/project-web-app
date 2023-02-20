<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public $table='statusline';

    protected $primaryKey='info_id';

    public $timestamps = false;

    protected $fillable = ['info_id', 'date_paid', 'amount'];

    public function members(){
        return $this->belongsTo(Member::class, 'info_id');
    }


}
