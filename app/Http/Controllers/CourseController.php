<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function search_classes(){
        $student=DB::table("Class")->get();
        // var_dump($student);
        return $student;
    }
}
