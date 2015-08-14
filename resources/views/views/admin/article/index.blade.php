@extends('admin.layout')

@section('css')
@overwrite

@section('main')
    <section class="content-header">
        <h1>新闻动态
            <small>撰写新文章</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i>首页</a></li>
            <li class="active">撰写新文章</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">文章列表</h3>

                        <div class="box-tools">
                            <div class="input-group" style="width: 250px;">
                                <input type="text"
                                        name="table_search"
                                        class="form-control input-sm pull-right"
                                        placeholder="Search">

                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <div class="table-control-bar clearfix">
                            <a href="{{route('admin.article.create')}}"
                                    class="btn btn-primary btn-sm pull-right">撰写新文章</a>
                            {{--<button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"--}}
                            {{--title="全选/反全选"></i></button>--}}
                            {{--<button class="btn btn-default btn-sm"><i class="fa fa-trash-o" title="删除"></i></button>--}}
                        </div>
                        <table class="table table-hover table-striped text-muted">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>栏目</th>
                                <th>标题</th>
                                <th>权重</th>
                                <th>发布</th>
                                <th>创建时间</th>
                                <th>修改时间</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $index=>$item)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    {{--<td class="table-operation">--}}
                                    {{--<input type="checkbox"--}}
                                    {{--class="icheck"--}}
                                    {{--value="1"--}}
                                    {{--name="checkbox[]"--}}
                                    {{--style="position: absolute; opacity: 0;">--}}
                                    {{--</td>--}}

                                    <td class="text-green">{{config('blog.article_type')[$item['type']]}}</td>
                                    <td>{{mb_substr($item['title'],0,22)}}</td>
                                    <td>{{$item['order']}}</td>
                                    <td class="{{$item['display']?'text-green':'text-red'}}">{{$item['display']?'发布':'隐藏'}}</td>
                                    <td>{{$item['created_at']}}</td>
                                    <td>{{$item['updated_at']}}</td>
                                    <td>
                                        <a href="{{route('admin.article.edit',$item['id'])}}"
                                                class="btn btn-xs btn-default"><i class="fa fa-fw fa-pencil"
                                                    title="编辑"></i></a>
                                        <a href="{{route('article.show',$item['id'])}}"
                                                class="btn btn-xs btn-default"><i class="fa fa-fw fa-link"
                                                    title="预览"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--<div class="box-footer clearfix">--}}
                    {{--</div>--}}
                    {{--<form method="post"--}}
                            {{--action="http://127.0.0.1:81/admin/article"--}}
                            {{--accept-charset="utf-8"--}}
                            {{--id="hidden-delete-form">--}}
                        {{--<input name="_method" type="hidden" value="delete">--}}
                        {{--<input type="hidden" name="_token" value="oDmG9Th2kP36BHAp0kfXMrK2cxgES6NR9auaAcQc">--}}
                    {{--</form>--}}
                </div>
            </div>
        </div>
    </section>
@stop
