@extends("admin.layout")

@section("content")
<div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加用户
               <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">添加</a></li>
                <li class="active">基本信息</li>
            </ol>
        </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">快速注册</h3>
                </div>
                <form role="form" method="post" action="{{ url('/admin/index/add') }}">

                {{ csrf_field() }}
                <div class="box-body">


						@if(count($errors) > 0)
							<div class="alert alert-danger alert-dismissable">
		                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		                    <h4><i class="icon fa fa-ban"></i> 警告!</h4>
								<ul>
									@foreach($errors -> all() as $error)
									<li>{{
										$error
									}}</li>
									@endforeach
								</ul>
								@endif
							</div>
						

                        <div class="form-group">
                            <label for="exampleInputuserName">用户名</label>
                            <input type="text" name="name" placeholder="请输入用户名" id="exampleInputuserName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPass">密码</label>
                            <input type="password" name="password" placeholder="请输入密码" id="exampleInputPass" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputrePass">重复密码</label>
                            <input type="password" name="repwd" placeholder="请输入密码" id="exampleInputrePass" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone">手机号</label>
                            <input type="text" name="phone" maxlength="11" placeholder="请输入手机号" id="exampleInputPhone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">邮箱</label>
                            <input type="email" name="email" placeholder="请输入邮箱" id="exampleInputEmail" class="form-control">
                        </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">注册</button>
                    </div>
                    </div>

                    
                </form>
            </div>

        </div>
    </div>
</section>
<div>
@endsection