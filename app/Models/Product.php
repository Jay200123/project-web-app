<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table='products';

    protected $primaryKey='product_id';

    protected $fillable = ['description','price','product_image'];

    public function  orders(){
        return $this->belongsToMany(Order::class, 'orderline','orderinfo_id','product_id');
       }
}