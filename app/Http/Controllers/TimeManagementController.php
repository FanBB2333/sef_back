<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TimeManagementController extends Controller
{
    //
    public function update(Request $request){
        $list = $request->all();
//        var_dump($list);
        $primary = $request->input("aaa");
        $Re = $request->input("ReTime");
        $cnt = $request->input("maxcnt");
//        $bool=DB::update('update TimeManagement set primary_start= ? , primary_end= ? , re_start = ? , re_end = ? , max_user = ? where ID=1 ',[$primary[0],$primary[1], $Re[0], $Re[1], $cnt]);
        return $primary;
    }
}
