@extends("admin.layout")

@section("content")

<div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                分类
                <small>列表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">General Elements</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">修改页</h3>
                        </div>
                        <div class="box-body">
                            <form action="{{ url('/admin/cate/insert') }}" method="post">

                            {{ csrf_field()}}
                            <input name="cate" type="text" class="form-control">
                            
                            <div class="col-md-12" style="height: 20px"></div>

                            <select name="pid" class="form-control">
                                @foreach($data as $cate)
                                    <option value="{{ $cate -> id}}">{{ $cate -> name }}</option>
                                @endforeach
                            </select>

                            <div class="col-md-12" style="height: 20px"></div>

                            <button class="btn btn-primary" type="submit">添加分类</button>
                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                </div><!--/.col (left) -->
                <!-- right column -->
                
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div>

@endsection