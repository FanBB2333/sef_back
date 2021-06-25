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

    public function chooseCourse($stu_id, $cid){
        $bool=DB::insert("insert into course_select values(?,?,?)",[$stu_id,$cid,0]);

        return $bool;
    }

    public function managerChooseCourse($stu_id, $cid){
        $query = "select * from course_select where Student_id='";
        $query.=$stu_id;
        $query.="' and Course_id=";
        $query.=$cid;
        $q = DB::select($query);
        // var_dump(count($q));

        $bool=DB::update('update course_select set IsSelected=1 where Student_id=? and Course_id=? ',[$stu_id, $cid]);
        if(count($q) == 0){
            $t=DB::insert("insert into course_select values(?,?,?)",[$stu_id,$cid,1]);
        }
        return 1;
    }
}
