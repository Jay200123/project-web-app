<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orderinfo';
    protected $fillable = ['student_id'];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
