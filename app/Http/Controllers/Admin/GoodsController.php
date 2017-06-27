<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class GoodsController extends Controller
{
    //
    public function add()
    {
    	// select *, concat(path, ',', id) as pathinfo from cate order by pathinfo;
    	$res = DB::table("cate") -> select("*", DB::raw("concat(path, ',', id) as pathinfo")) -> orderBy("pathinfo") -> get();
    	
    	foreach($res as $k => $v)
    	{
    		$num = substr_count($v -> path, ",");
    		$pre = str_repeat("|--", $num);
    		$res[$k] -> name = $pre.$v -> name;
    	}

    	// dd($res);
    	return view('admin.goods.add', ['data' => $res]);
    }

    public function insert(Request $request)
    {
    	// dd($request -> all());
    	$res = $request -> except("_token");
    	// echo 0;
    	dd($res);
    	if($request -> hasFile("img"))
    	{
    		// echo 1;
    		if($request -> file("img") -> isValid())
    		{	
    			// echo 2;
    			$s = $request -> file("img") -> getClientOriginalExtension();
    			$fileName = time().mt_rand(0000000,999999999).'.'.$s;
    			// echo $fileName;

    			$request -> file("img") -> move('./uploads/', $fileName);
    		}

    		$this -> validate($request, [
                'name' => "required",
                'price' => "required",
                'cate' => "required",
    			], [
    				"name.required" => "商品名称",
    				"price.required" => "商品价格",
    				"cate.required" => "类别不能为空"
    			]);

    		$res = DB::table("goods") -> insert($res);
    		if($res)
    		{
    			return redirect("/admin/goods/index") -> with(['info' => "添加成功"]);
    		}else
    		{
    			return back() -> with(['info' => "添加失败"]);
    		}
    	}
    }


    public function index()
    {
    	return view('admin.goods.index');
    }
}
