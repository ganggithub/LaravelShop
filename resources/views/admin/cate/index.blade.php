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
                <li><a href="#"><i class="fa fa-dashboard"></i> 首页 </a></li>
                <li><a href="#">分类</a></li>
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
        
        <table class="table table-bordered table-striped dataTable" id="example1" role="grid" aria-describedby="example1_info">
            <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 181px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 224px;" aria-label="Browser: activate to sort column ascending">类名</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Platform(s): activate to sort column ascending">父类</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 155px;" aria-label="Engine version: activate to sort column ascending">状态</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110px;" aria-label="CSS grade: activate to sort column ascending">CSS grade</th>
            </tr>
            </thead>
            <tbody>
            
                <tr role="row" class="odd">
                    <td class="sorting_1">Gecko</td>
                    <td>Firefox 1.0</td>
                    <td>Win 98+ / OSX.2+</td>
                    <td>1.7</td>
                    <td>A</td>
                </tr>
                
            </tbody>
            
        </table>

    </div><!-- /.box-body -->
</div><!-- /.box -->


</div><!--/.col (left) -->
<!-- right column -->

            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div>

@endsection