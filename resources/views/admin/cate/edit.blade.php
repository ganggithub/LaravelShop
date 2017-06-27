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
                            
                            <input type="text" class="form-control">
                            
                            <select class="form-control">
                                @foreach($data as $cate)
                                    <option>{{ $cate -> id }}</option>
                                    <option>{{ $cate -> name }}</option>
                                    <option>{{ $cate -> pid }}</option>
                                    <option>{{ $cate -> pid }}</option>
                                @endforeach
                            </select>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                </div><!--/.col (left) -->
                <!-- right column -->
                
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div>

@endsection