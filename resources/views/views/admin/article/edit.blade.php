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

    <section class="content">
        <form id="article-edit-fr">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$article['id'] or 0}}">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">撰写新文章</h3>

                            <div class="box-tools pull-right">
                                <button class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="label-id-423423153">栏目</label>

                                        <select class="form-control" id="label-id-423423153" name="type">
                                            @foreach(config('blog.article_type') as $k=>$v)
                                                <option {{(isset($article['type']) && $article['type']==$k)?' selected ':''}} value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="label-id-42342353">标题</label>
                                        <input type="text"
                                                class="form-control"
                                                id="label-id-42342353"
                                                name="title"
                                                placeholder="输入标题"
                                                value="{{$article['title'] or ''}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="label-id-42342315344">正文</label>
                                    <textarea name="content" id="label-id-42342315344" class="form-control">
                                        {{$article['content'] or '这里编辑发布的内容.'}}
                                    </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">选项</h3>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="label-id-4234235311">排序权重</label>
                                        <small>(数值越大越靠前)</small>
                                        <input type="text"
                                                class="form-control"
                                                id="label-id-4234235311"
                                                name="order"
                                                placeholder="数值越大约靠前"
                                                value="{{$article['order'] or 0}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <b>是否发布</b>
                                        </div>
                                        <label style="margin-right: 20px;">
                                            <input type="radio"
                                                    name="display"
                                                    {{(!isset($article['display']) || $article['display']===1)?' checked ':''}}
                                                    class="icheck"
                                                    value="1"/> 发布
                                        </label>

                                        <label>
                                            <input type="radio"
                                                    name="display"
                                                    class="icheck"
                                                    {{(isset($article['display']) && $article['display']===0)?' checked ':''}}
                                                    value="0"/> 隐藏
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="label-id-42342315312">发布日期</label>
                                        <small>(页面上显示的发布日期)</small>

                                        <div class="form-group">
                                            <div class="input-group date">
                                                <input
                                                        id="label-id-42342315312"
                                                        type="text"
                                                        name="release_time"
                                                        value="{{date('Y-m-d',(isset($article['release_time'])?$article['release_time']:time()))}}"
                                                        class="form-control">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button style="margin-left: 5px"
                                            class="btn btn-success"
                                            id="submit-article-edit-fr">保存
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </section>
@section('js')
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
@overwrite
<script>
    $(function () {
        "use strict";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var editor = CKEDITOR.replace('content');//ckeditor

        $('#article-edit-fr .input-group.date').datepicker({ //datepicker
            language: "zh-CN",
            autoclose: true,
            format: "yyyy-mm-dd"
        });

        $(document).on('click', '#submit-article-edit-fr', function () {
            (event.preventDefault) ? event.preventDefault() : event.returnValue = false;

            var $fr = $('#article-edit-fr');

            $fr.find('textarea[name=content]').val(editor.getData());

            $.ajax({
                type: '{{isset($article['id'])?'PUT':'POST'}}',
                url: '{{isset($article['id'])?route('admin.article.update',$article['id']):route('admin.article.store')}}',
                data: $fr.serialize(),
                success: function (data) {
                    newAlert({
                        msg: data.msg,
                        confirm: function () {
                            location.href = data.url;
                        }
                    });
                },
                error: function (req) {
                    newAlert({err: req});
                }
            });
        });

    });
</script>

@stop