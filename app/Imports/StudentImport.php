<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Student;
use App\Models\User;
class StudentImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){

            $user = new User();
                $user->name = $row['fname'].''.$row['lname'];
                $user->email = $row['email'];
                $user->password = bcrypt($row['password']);
                $user->role = 'unregistered';
                $user->save();

                $student  = new Student();

                $student->title = $row['title'];
                $student->fname = $row['fname'];
                $student->lname = $row['lname'];
                $student->section = $row['section'];
                $student->phone = $row['phone'];
                $student->address = $row['address'];
                $student->town = $row['town'];
                $student->city = $row['city'];
                $student->student_image = $row['images'];
                $student->user_id = $user->id;
                
                $student->user()->associate($user);
                $student->save();

        }
    }
}
