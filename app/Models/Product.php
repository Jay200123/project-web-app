<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    use HasFactory;

    public $table='products';

    protected $primaryKey='product_id';

    protected $fillable = ['description','price','product_image'];

    public function  orders(){
        return $this->belongsToMany(Order::class, 'orderline','orderinfo_id','product_id');
       }

       public function getSearchResult(): SearchResult
       {
        $url = route('product.show', $this->product_id);
        return new SearchResult(
            $this,
            $this->description,
            $url
        );
       }
}
