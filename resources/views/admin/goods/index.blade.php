@extends("admin.layout")

@section("content")

<div class="content-wrapper" style="min-height: 916px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户数据表
                <small>详情表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="#">表</a></li>
                <li class="active">数据表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">用户列表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        {{ session("info") }}
        <form action="{{ url('/admin/user/index') }}" method="get">

            <div class="row">
                <div class="col-md-8">
                <div class="form-group">
                    <label>选择每页条数</label>
                    <select name="num" class="form-control">
                        <option value="10"
                        @if(!empty($request['num']) && $request['num'] == 10)
                            selected="selected" 
                        @endif
                        >
                         10
                        </option>
                        <option value="20"
                        @if(!empty($request['num']) && $request['num'] == 20)
                            selected="selected" 
                        @endif
                        >20</option>
                        <option value="50"
                        @if(!empty($request['num']) && $request['num'] == 50)
                            selected="selected" 
                        @endif
                        >50</option>
                        <option value="100"
                        @if(!empty($request['num']) && $request['num'] == 100)
                            selected="selected" 
                        @endif
                        >100</option>
                    </select>
                </div>
                </div>

            <div class="col-md-4">
            <div class="input-group input-group-sm">
                <input type="text" name="keyword" value="{{ $request['keyword'] or ''}}"class="form-control">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-info btn-flat">Go!</button>
                </span>
            </div>
            </div>

        </div>
</form>

    <div class="row"><div class="col-sm-12">

<table class="table table-bordered table-striped dataTable" id="example1" role="grid" aria-describedby="example1_info">
    <thead>
    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 181px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
        id
    </th>
    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 224px;" aria-label="Browser: activate to sort column ascending">用户名</th>
    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 198px;" aria-label="Platform(s): activate to sort column ascending">用户手机号</th>
    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 155px;" aria-label="Engine version: activate to sort column ascending">用户邮箱</th>
    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110px;" aria-label="CSS grade: activate to sort column ascending">用户状态</th>
    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 110px;" aria-label="CSS grade: activate to sort column ascending">操作</th></tr>
    </thead>
    <tbody>

            @foreach($data as $user)
            
                @if( ($user -> id)/2 == 0)
                    <tr role="row" class="odd">
                @else
                    <tr role="row" class="even">
                @endif
                    <td class="sorting_1" name="ids">{{ $user -> id }}</td>
                    <td name="name">{{ $user -> name }}</td>
                    <td>{{ $user -> phone }}</td>
                    <td>{{ $user -> email }}</td>
                    <td class="lang">
                        @if( $user -> status == "0")
                            启用
                        @else
                            禁用
                        @endif
                    </td>
                    <td><a href="{{ url('/admin/user/edit') }}/{{ $user -> id }}">修改</a><a href="{{ url('/admin/user/delete') }}/{{ $user -> id}}">删除</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {!! $data -> appends($request) -> render() !!}
    </div>
    </div>
    </div>
    </div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div>


<script type="text/javascript">
    window.onload = function()
    {
        // alert($);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".lang").on("click", function()
                {
                    var lang = $(this);
                    var id = $(this).parent().children().first().html();
                    $.post("/admin/user/ajax", {id:id}, function(data)
                        {
                            // alert(data);
                            if(data == '0')
                            {
                                lang.html("禁用");
                            }else if(data == "2")
                            {
                                lang.html("启用");
                            }

                        }, "json");
                });
    


            function dbl()
            {
                var td = $(this);
                        var name = td.html();
                        var inp = $("<input type='text' />");
                        inp.val(name);
                        td.html(inp);

                        var id = td.prev().html();
                        inp.select();

                        inp.on("blur", function()
                            {
                                var newname = inp.val();
                                
                                $.post('/admin/user/ajaxUpdate', {id:id,name:newname}, function(data)
                                    {
                                        // alert(data);
                                        if(data == "1")
                                        {
                                            alert("用户名已存在");
                                            td.html(name);
                                        }else if(data == "0")
                                        {
                                            alert("用户名修改成功");
                                            td.html(newname);
                                        }else
                                        {
                                            alert("修改失败");
                                            td.html(name);
                                        }
                                    }, "json");
                                td.dblclick(dbl);
                            });
                        td.unbind("dblclick");
            }

            $("td[name=name]").on("dblclick", dbl);

    }



    

</script>
@endsection