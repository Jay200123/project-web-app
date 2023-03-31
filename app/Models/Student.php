<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Models\User;

class Student extends Model implements Searchable
{
    use HasFactory;

    public $table='students';

    protected $primaryKey = 'student_id';

    protected $fillable = ['title','fname','lname','section','phone','address','town','city','student_image','user_id'];

    public function members(){
        return $this->hasMany(Member::class, 'student_id');
    } 

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orders(){
        return $this->hasMany(Order::class, 'student_id');
    }

    public function logs(){
        return $this->hasMany(LogBook::class, 'student_id');
    }

    public function getSearchResult(): SearchResult
    {
     $url = route('student.show', $this->student_id);
     return new SearchResult(
         $this,
         $this->fname,
         $url
     );
    }

    
}
