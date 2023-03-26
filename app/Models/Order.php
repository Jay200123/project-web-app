<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orderinfo';
    protected $fillable = ['student_id','date_placed','status'];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function products(){

        return $this->belongsToMany(Product::class, 'orderline', 'orderinfo_id','product_id');
    }
}
