<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>博客后台管理</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>

    <!--[if lt IE 9]>
    <script src="{{asset('/js/respond.min.js')}}"></script>
    <script src="{{asset('/js/html5shiv.min.js')}}"></script>
    <![endif]-->

    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/css/_all-skins.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/css/icheck/green.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css"/>

    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/icheck.min.js')}}"></script>
    <script src="{{asset('/js/jquery.slimscroll.min.js')}}"></script>
    {{--<script src="{{asset('/js/dashboard.js')}}"></script>--}}

    {{--<script src="{{asset('/js/backend.js')}}"></script>--}}

    @section('css')
        {{-- 按需载入css, 这个section会被每个子视图重写 --}}
    @show

    <style>
        .pagination {
            margin: 0 !important;
            float: right;
        }

        .table-control-bar {
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="skin-blue sidebar-mini fixed">

<!--[if IE 8]>
<div class="alert alert-warning text-center" style="margin-bottom:0;position: fixed;z-index: 9999999">
    <p>你的浏览器不支持一些新特性，请升级你的浏览器至<a href="http://se.360.cn/">360浏览器</a>或<a href="http://browsehappy.com/">Chrome</a>。
    </p>

    <p>2015年了，IE8老了...</p>
</div>
<![endif]-->

<!--[if lt IE 8]>
<div class="alert alert-danger text-center" style="margin-bottom:0;position: fixed;z-index: 9999999">
    <p>你的浏览器不支持一些新特性，请升级你的浏览器至<a href="http://se.360.cn/">360浏览器</a>或<a href="http://browsehappy.com/">Chrome</a>。
    </p>

    <p>2015年了，IE7及以下都老了...</p>
</div>
<![endif]-->

<div class="wrapper">

    @include('admin.header')
    @include('admin.mainSide')

    <div class="content-wrapper">
        @yield('main')
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.1.0
        </div>
        <strong>Copyright &copy; {{date('Y')}}
            <a href="{{route('index')}}">FlySay</a>.</strong> All rights reserved.
    </footer>

    @include('admin.ctrlSide')

</div>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>

<script src="{{asset('/js/adminlte.app.js')}}"></script>
<script>

    $(function () {
        $('input[type="checkbox"].icheck, input[type="radio"].icheck').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //active nav todo has bugs
        $('#sidebar-nav-active a').each(function () {
            if ($(this).attr('href') === '{{Request::url()}}') {
                $(this).addClass('text-aqua').find('i').removeClass('fa-circle-o').addClass('fa-circle text-aqua');
                $(this).closest('li').addClass('active');
                $(this).closest('li.treeview').addClass('active');
            }

        });
    });

</script>
<script src="{{asset('/js/adminlte.demo.js')}}"></script>
<script src="{{asset('/js/backend.js')}}"></script>
<script src="{{asset('/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/js/bootstrap-datepicker.zh-CN.min.js')}}"></script>

@section('js')
    {{-- 按需载入js, 这个section会被每个子视图重写 --}}
@show

</body>
</html>