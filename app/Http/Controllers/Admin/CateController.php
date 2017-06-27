<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class CateController extends Controller
{
    //添加分类显示模板
    public function add()
    {
    	$cates = DB::table("cate")
    		 -> select(["*", DB::raw("concat(path, ',', id) as pathinfo")]) 
    		 -> orderBy("pathinfo")
    		 -> get();
    	// dd($cates);

    	foreach($cates as $k => $v)
    	{
    		$num = substr_count($v -> path, ",");
			// echo $num;
			$cates[$k] -> name = str_repeat("|--", $num). $v -> name;
    	}
    	
    	return view("admin.cate.add", ['data' => $cates]);
    }

    // 将提交过来的数据插入数据库
    public function insert(Request $request)
    {
    	$res = $request -> except("_token");
    	// dd($res);

    	
    	$ppath = DB::table("cate") -> where('id', $res['pid']) -> first() ->path;
    	// dd($path);
    	$path = $ppath.','.$res['pid'];

    	$result = DB::table("cate") -> insert(['name' => $res['cate'], 'pid' => $res['pid'], 'path' => $path]);

    	if($result)
    	{
    		return "添加成功";
    	}else
    	{
    		return "添加失败";
    	}
    	// dd($res);
    }

    public function index()
    {
        $cates = DB::table("cate") -> orderBy(DB::raw("concat(path, ',', id)")) -> get();
        
        return view("admin.cate.index", ['data' => $cates]);
    }
}
