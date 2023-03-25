<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    use HasFactory;

    public $table='students';

    protected $primaryKey = 'student_id';

    protected $fillable = ['title','fname','lname','section','phone','address','town','city','student_image','user_id'];

    public function members(){
        return $this->belongsToMany(Member::class, 'student_id');
    } 

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
