<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function search_by_name($name){
        // $student=DB::table("Class")->get();
        $query = "select course.name as cname, course.ID as cid, teacher.name as tname, time, credit, description from course,teacher where course.teacher_ID=teacher.ID and course.name like '%";
        $query .=$name;
        $query .= "%'";
        $classes = DB::select($query);
        // var_dump($student);
        return $classes;
    }


    public function search_by_id($id){
        $query = "select course.name as cname, course.ID as cid, teacher.name as tname, time, credit, description from course,teacher where course.teacher_ID=teacher.ID and course.ID=";
        $query .=$id;
        $classes = DB::select($query);
        return $classes;
    }

    public function search_by_teacher($t){
        $query = "select course.name as cname, course.ID as cid, teacher.name as tname, time, credit, description from course,teacher where course.teacher_ID=teacher.ID and teacher.name like '%";
        $query .=$t;
        $query .= "%'";
        $classes = DB::select($query);
        return $classes;
    }

    public function getAll(){
        $query = "select course.ID as ID, course.name as cname,credit, type, teacher.name as tname, day, time from course,teacher where course.teacher_ID=teacher.ID";
        $classes = DB::select($query);
        return $classes;

    }
}
