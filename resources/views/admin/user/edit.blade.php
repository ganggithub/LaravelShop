@extends("admin.layout")

@section("content")
<div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                修改页
                <small>修改</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">修改页</a></li>
                <li class="active">基本信息</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">修改</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

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

                        <form role="form" action="{{ url('/admin/user/update') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $user -> id }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">用户名</label>
                                    <input type="text" name="name" value="{{ $user -> name}}" id="exampleInputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhone">手机号</label>
                                    <input type="text" name="phone" value="{{ $user -> phone }}" maxlength="11" id="exampleInputPhone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">邮箱</label>
                                    <input type="email" name="email" value="{{ $user -> email }}" id="exampleInputEmail" class="form-control">
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </form>
                    </div><!-- /.box -->

                </div><!--/.col (left) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div>
@endsection