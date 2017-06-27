@extends("admin.layout")

@section("content")
<div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加商品
               <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
                <li><a href="#">添加</a></li>
                <li class="active">商品基本信息</li>
            </ol>
        </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">快速添加商品</h3>
                </div>
                <form role="form" method="post" action="{{ url('/admin/goods/insert') }}" enctype="multipart/form-data">

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
                            <label for="exampleInputuserName">商品名称</label>
                            <input type="text" name="name" placeholder="请输入商品名称" id="exampleInputuserName" class="form-control">

                        <div class="form-group">
                            <label for="exampleInputPhone">价格</label>
                            <input type="text" name="price" placeholder="请输入价格" id="exampleInputPhone" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>商品类别</label>
                            <select name="cate_id" class="form-control">

                                @foreach($data as $cate)
                                    
                                    <option value="{{ $cate -> id }}">{{ $cate -> name }}</option>

                                @endforeach

                            </select>

                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputFile">上传商品图片</label>
                            <input type="file" name="img" id="exampleInputFile">
                            <p class="help-block">选择上传的图片</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">商品描述</label>
                                <!-- 加载编辑器的容器 -->
                                <script id="container" style="width: 100%; height: 200px" name="details" type="text/plain">
                                    
                                </script>
                                <!-- 配置文件 -->
                                <script type="text/javascript" src="{{ url('/ue/ueditor.config.js') }}"></script>
                                <!-- 编辑器源码文件 -->
                                <script type="text/javascript" src="{{ url('/ue/ueditor.all.js') }}"></script>
                                <!-- 实例化编辑器 -->
                                <script type="text/javascript">
                                    var ue = UE.getEditor('container');
                                </script>
                            

                        </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">添加商品</button>
                    </div>
                    </div>

                    
                </form>
            </div>

        </div>
    </div>
</section>
<div>
@endsection