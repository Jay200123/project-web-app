<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $table = 'serviceinfo';

    protected $primaryKey='service_id';

    protected $fillable=['fname','lname','section','email','cost','options','quantity','date_placed','filename','service_file'];
}
