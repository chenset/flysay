<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title></title>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <style>
        body {
            background: #ebebeb;
            font-family: "Helvetica Neue", "Hiragino Sans GB", "Microsoft YaHei", "\9ED1\4F53", Arial, sans-serif;
            color: #222;
            font-size: 12px;
        }

        * {
            padding: 0px;
            margin: 0px;
        }

        .top_div {
            background: #008ead;
            width: 100%;
            height: 400px;
        }

        .ipt {
            border: 1px solid #d3d3d3;
            padding: 15px 10px;
            width: 290px;
            border-radius: 4px;
            padding-left: 35px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
        }

        .ipt:focus {
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6)
        }

        .u_logo {
            background: url("{{asset('images/auth/username.png')}}") no-repeat;
            padding: 10px 10px;
            position: absolute;
            top: 48px;
            left: 40px;

        }

        .p_logo {
            background: url("{{asset('images/auth/password.png')}}") no-repeat;
            padding: 10px 10px;
            position: absolute;
            top: 17px;
            left: 40px;
        }

        a {
            text-decoration: none;
        }

        .tou {
            background: url("{{asset('images/auth/tou.png')}}") no-repeat;
            width: 97px;
            height: 92px;
            position: absolute;
            top: -87px;
            left: 140px;
        }

        .left_hand {
            background: url("{{asset('images/auth/left_hand.png')}}") no-repeat;
            width: 32px;
            height: 37px;
            position: absolute;
            top: -38px;
            left: 150px;
        }

        .right_hand {
            background: url("{{asset('images/auth/right_hand.png')}}") no-repeat;
            width: 32px;
            height: 37px;
            position: absolute;
            top: -38px;
            right: -64px;
        }

        .initial_left_hand {
            background: url("{{asset('images/auth/hand.png')}}") no-repeat;
            width: 30px;
            height: 20px;
            position: absolute;
            top: -12px;
            left: 100px;
        }

        .initial_right_hand {
            background: url("{{asset('images/auth/hand.png')}}") no-repeat;
            width: 30px;
            height: 20px;
            position: absolute;
            top: -12px;
            right: -112px;
        }

        .left_handing {
            background: url("{{asset('images/auth/left-handing.png')}}") no-repeat;
            width: 30px;
            height: 20px;
            position: absolute;
            top: -24px;
            left: 139px;
        }

        .right_handinging {
            background: url("{{asset('images/auth/right_handing.png')}}") no-repeat;
            width: 30px;
            height: 20px;
            position: absolute;
            top: -21px;
            left: 210px;
        }

    </style>

</head>
<body>
<div class="top_div"></div>
<div style="width: 400px;height: 260px;margin: auto auto;background: #ffffff;text-align: center;margin-top: -130px;border: 1px solid #e7e7e7">
    <form action="{{ url('auth/login')}}" onsubmit="" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div style="width: 165px;position: absolute">
            <div class="tou"></div>
            <div id="left_hand" class="initial_left_hand"></div>
            <div id="right_hand" class="initial_right_hand"></div>
        </div>
        <h3 style="padding:30px 0px 0px 0px;">后台登录</h3>
        @if ($errors->has('email') || $errors->has('email'))
            <script>alert("用户名或密码不正确!");</script>
        @endif
        <p style="padding: 30px 0px 10px 0px;position: relative;">
            <span class="u_logo"></span>
            <input id="email"
                    class="ipt"
                    type="text"
                    name="email"
                    placeholder="请输入用户名或邮箱"
                    required="true"
                    value="{{ old('email') }}">
        </p>

        <p style="position: relative;">
            <span class="p_logo"></span>
            <input id="password" class="ipt" name="password" type="password" placeholder="请输入密码" required="true">
        </p>

        <div style="margin-top: 20px;border-top: 1px solid #e7e7e7;">
            <div style="margin:8px 31px 0 0;">
                <button type="submit"
                        style="float: right;background: #008ead;width:80px;height:40px;line-height: 40px;border-radius: 4px;border: 1px solid #1a7598;color: #FFF;font-weight: bold;">登录
                </button>
            </div>
        </div>
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
    </form>
</div>

<div style="position: fixed;bottom: 0px;text-align: center;width: 100%;">
    Copyright ©2015 <a style="margin-left: 10px;color: #000000;text-decoration: underline"
            href="{{route('index')}}">FlySay</a>
</div>
<script type="text/javascript">
    $(function () {
        //得到焦点
        $("#password").focus(function () {
            $("#left_hand").animate({
                left: "150",
                top: " -38"
            }, {
                step: function () {
                    if (parseInt($("#left_hand").css("left")) > 140) {
                        $("#left_hand").attr("class", "left_hand");
                    }
                }
            }, 2000);
            $("#right_hand").animate({
                right: "-64",
                top: "-38px"
            }, {
                step: function () {
                    if (parseInt($("#right_hand").css("right")) > -70) {
                        $("#right_hand").attr("class", "right_hand");
                    }
                }
            }, 2000);
        });
        //失去焦点
        $("#password").blur(function () {
            $("#left_hand").attr("class", "initial_left_hand");
            $("#left_hand").attr("style", "left:100px;top:-12px;");
            $("#right_hand").attr("class", "initial_right_hand");
            $("#right_hand").attr("style", "right:-112px;top:-12px");
        });
    });
</script>
<script type="text/javascript">
    function chkForm() {
        var userName = $("#email").val();
        var password = $("#password").val();
        if (userName == '' || password == '') {
            alert('用户名或密码不能为空!');
            return false;
        }
        var cfg = {
            url: "{{ url('auth/login')}}",
            data: {
                userName: userName,
                password: password,
                _token: $("#_token").val()
            },
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (message) {
                alert(message);
                {{--window.location.href = "{{route('admin.index')}}";--}}
                return false;
            }
        };
        $.ajax(cfg);
    }
</script>
</body>
</html>