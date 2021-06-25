<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ViewStudent extends Controller
{
    //
    public function viewStudent($course_id){
        $query = "select name,ID,class,commu from course_select,student where student.ID = course_select.Student_id and course_select.Course_id=".$course_id;
        $list = DB::select($query);

        return $list;
    }
}
