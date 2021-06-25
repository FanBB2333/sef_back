<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ViewResult extends Controller
{
    //
    public function viewResult($stu_id){
        $query = "select name,time,day from course_select,course where course.ID = course_select.Course_id and course_select.Student_id=".$stu_id;
        $list = DB::select($query);

        return $list;
    }
}
