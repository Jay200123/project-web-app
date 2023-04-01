<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Events extends Model implements Searchable
{
    use HasFactory;

    public $table='events';

    protected $primaryKey='event_id';

    protected $fillable = [ 'title','date_placed','date_occured','event_image'];

    public function getSearchResult(): SearchResult
    {
        $url = route('event.show', $this->event_id);
        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
}
