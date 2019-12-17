<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/*
    Query Syntax:-
    1.  My_model::get_one_row($table,$where=null,$order=null,$limit=null);
        My_model::get_one_row('about_manage',['ab_id'=>'2'],'ab_id,desc','0,1');

    2.  My_model::get_all_row($table,$where=null,$order=null,$limit=null);
        My_model::get_all_row('about_manage',['ab_id'=>'2'],'ab_id,desc','0,1');

    3.  My_model::insert($table,$data);
        My_model::insert('about_manage',$data);

    4.  My_model::data_update($table,$where,$data);
        My_model::data_update('about_manage',['ab_id'=>'2'],$data);

    5.  My_model::data_delete($table,$where);
        My_model::data_delete('about_manage',['ab_id'=>'2']);

    6.  My_model::delete_img($table,$where,$path,$img);
        My_model::delete_img('about_manage',['ab_id'=>'2'],public_path('upload/about/'),'about_img');
*/

class My_model extends Model
{
    public static function get_one_row($table,$where=null,$order=null,$limit=null)
    {
        $query = DB::table($table);
        if($where) { $query->where($where); }
        if($order) { $O=explode(',',$order); $query->orderBy($O[0],$O[1]); }
        if($limit) { $L=explode(',',$limit); $query->skip($L[0])->take($L[1]); }
        return $query->first();
    }

    public static function object_raw($table,$where=null,$order=null,$limit=null)
    {
        $query = DB::table($table);
        if($where) { $query->whereRaw($where); }
        if($order) { $O=explode(',',$order); $query->orderBy($O[0],$O[1]); }
        if($limit) { $L=explode(',',$limit); $query->skip($L[0])->take($L[1]); }
        return $query->first();
    }

    public static function get_all_row($table,$where=null,$order=null,$limit=null)
    {
        $query = DB::table($table);
        if($where) { $query->where($where); }
        if($order) { $O=explode(',',$order); $query->orderBy($O[0],$O[1]); }
        if($limit) { $L=explode(',',$limit); $query->skip($L[0])->take($L[1]); }
        return $query->get();
    }

    public static function array_raw($table,$where=null,$order=null,$limit=null)
    {
        $query = DB::table($table);
        if($where) { $query->whereRaw($where); }
        if($order) { $O=explode(',',$order); $query->orderBy($O[0],$O[1]); }
        if($limit) { $L=explode(',',$limit); $query->skip($L[0])->take($L[1]); }
        return $query->get();
    }

    public static function rand_all($table,$where=null,$limit=null)
    {
        $query = DB::table($table);
        if($where) { $query->where($where); }
        $query->inRandomOrder();
        if($limit) { $L=explode(',',$limit); $query->skip($L[0])->take($L[1]); }
        return $query->get();
    }

    public static function rand_one($table,$where=null,$limit=null)
    {
        $query = DB::table($table);
        if($where) { $query->where($where); }
        $query->inRandomOrder();
        if($limit) { $L=explode(',',$limit); $query->skip($L[0])->take($L[1]); }
        return $query->first();
    }

    public static function insert($table,$data)
    {
    	DB::table($table)->insert($data);
    }

    public static function data_update($table,$where,$data)
    {
        DB::table($table)->where($where)->update($data);
    }

    public static function data_delete($table,$where)
    {
        DB::table($table)->where($where)->delete();
    }

    public static function dbClearFile($table, $where, $path, $files)
    {
        foreach ($files as $file) {
            $old_data = DB::table($table)->select($file)->where($where)->first();
            if($old_data->$file && file_exists($path.$old_data->$file)) { unlink($path.$old_data->$file); }
        }
    }

    public static function basic_data()
    {
       $data = DB::table('basic_manage')->first();
       session()->put('basic_data',$data);
    }

}
