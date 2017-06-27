<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Crypt;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        // $res = DB::table("users") -> paginate(2);

        // dd($request -> input("select"));
        $num = $request -> input("num", 10);

        $key = $request -> input("keyword", "");

        // $fild = DB::table("users") ;
        // var_dump($request -> all());
        $data = DB::table("users") -> where("name", "like", "%".$key."%")  -> paginate($num);
        // dd($res);


    	return view("admin.user.index", ["data" => $data, 'request' => $request ->all()]);
    }

    public function add(Request $request)
    {
        // dd($request -> except("_token"));

        // dd($arr);
/*
        $res = $request -> input("name");
        if(!$res)
        {
            return back() -> with(["name" => "用户名不能为空"]);
        }
*/

        $this -> validate($request, [
                'name' => "required",
                'email' => "required|email",
                'password' => "required",
                'repwd' => "required|same:password",
                "phone" => "required|max:11|min:11"
            ],
            [
                'name.required' => "用户名不能为空",
                'email.required' => "邮箱不能为空",
                'password.required' => "密码不能不能为空",
                'repwd.required' => "重复密码不能为空",
                'repwd.same' => "两次密码必须一致",
                "phone.required" => "手机号不能为空",
                "phone.max" => "手机号只能是11位",
                "phone.min" => "手机号只能是11位"

            ]

            );
        $arr = $request -> except("_token", "repwd");
        $arr['rememeber_token'] = str_random(70);
        $arr["created_at"] = date("Y-m-d H:i:s");
        $arr['updated_at'] = date("Y-m-d H:i:s");
        $arr['password'] = Crypt::encrypt($arr['password']);


        $res = DB::table("users") -> insert($arr);

        if($res)
        {
            return redirect("/admin/index/index") -> with(['info' => "执行成功"]);
        }else
        {
            return redirect("/admin/user/add") -> with(["info" => "执行失败"]);
        }

    }

    // 用户添加操作
    public function insert()
    {
    	return view("admin.user.insert");
    }


    // 修改编辑
    public function edit($id)
    {
        $user = DB::table("users") -> where("id", $id) -> first();

        // dd($user);

        return view("admin.user.edit", ["user" => $user]);
    }


    public function update(Request $request)
    {
        // dd($request -> all());

        $data = $request -> except("_token", "id");
        $data['updated_at'] = date("Y-m—d H:i:s", time());

        $this -> validate($request,
                [
                    "name" => "required",
                    "email" => "required | email",
                    "phone" => "required|max:11|min:11"

                ],
                [
                    "name.required" => "用户名不能为空",
                    "phone.required" => "手机号不能为空",
                    "phone.max" => "手机号要输11位",
                    "phone.min" => "手机号要输11位",
                    "email.required" => "邮箱不能为空",
                    "email.email" => "邮箱格式不正确"
                ]

            );

        $res = DB::table("users") -> where("id", $request -> id) -> update($data);

        if($res)
        {
            return redirect("/admin/user/index") -> with(['info' => "修改成功"]);
        }else
        {
            return back() -> with(['info' => "修改失败"]);
        }
    }


    public function delete($id)
    {
        $res = DB::table("users") -> where("id", $id) -> delete();
        
        if($res)
        {
            return redirect("/admin/user/index") -> with(['info' => "删除成功"]);
        }else
        {
            return back() -> with(['info' => "删除失败"]);
        }
    }

    public function ajax(Request $request)
    {
        // return 111;
        $id = $request -> input("id");
        $data = DB::table("users") -> where("id", $id) -> first();

        if( $data -> status == "0")
        {
            $res = DB::table("users") -> where('id', $id) -> update(['status' => "1"]);

            if($res)
            {
                return response() -> json(0);
            }else
            {
                return response() -> json(1);
            }
        }else
        {
            $res = DB::table("users") -> where('id', $id) -> update(['status' => "0"]);

            if($res)
            {
                return response() -> json(2);
            }else
            {
                return response() -> json(3);
            }
        }

    }

    public function ajaxUpdate(Request $request)
    {
        // echo 111;
        $name = $request -> input("name");

        $res = DB::table("users") -> where('name', $name) -> first();
        if($res)
        {
            return response() -> json("1");
            
        }else
        {
            $result = DB::table("users") -> where('id', $request -> input('id')) -> update(['name' => $name]);


            if($result)
            {
                return response() -> json("0");
            }else
            {
                return response() -> json("2");

            }
        }


    }
}
