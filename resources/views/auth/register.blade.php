<section class="container register-wrap main-wrap">
    <div class="div-line"></div> {{--中间的分割线--}}

    <div class="row">
        <div class="col-xs-12">
            <div class="section-title">
                <h4 class="title">用户注册</h4>

                <div class="line"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 left-wrap">
            <form id="form-register"
                    class="form-horizontal"
                    role="form"
                    method="POST"
                    action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group form-group-lg">
                    <label class="col-xs-4 control-label"
                            for="r-email"> 常用邮箱</label>

                    <div class="col-xs-7">
                        <div class="input-group">

                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </div>
                            <input type="email"
                                    class="form-control input-lg"
                                    name="email"
                                    id="r-email"
                                    value="{{ old('email') }}"
                                    placeholder="输入邮箱">
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-lg">
                    <label class="col-xs-4 control-label"
                            for="r-name"> 昵称</label>

                    <div class="col-xs-7">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </div>
                            <input type="text"
                                    class="form-control input-lg"
                                    name="name"
                                    id="r-name"
                                    value="{{ old('name') }}"
                                    placeholder="输入昵称">
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-lg">
                    <label class="col-xs-4 control-label"
                            for="r-password"> 密码</label>

                    <div class="col-xs-7">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            </div>
                            <input type="password"
                                    class="form-control input-lg"
                                    name="password"
                                    id="r-password"
                                    placeholder="输入密码">
                        </div>
                    </div>
                </div>

                <div class="form-group form-group-lg">
                    <label class="col-xs-4 control-label"
                            for="r-re-password"> 确认密码</label>

                    <div class="col-xs-7">
                        <div class="input-group">
                            <div class="input-group-addon ">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            </div>
                            <input type="password"
                                    class="form-control input-lg"
                                    name="password_confirmation"
                                    id="r-re-password"
                                    placeholder="再次输入密码">
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label class="col-xs-4 control-label"
                            for="r-captcha"> 验证码</label>

                    <div class="col-xs-3">
                        <input type="text"
                                class="form-control input-lg input-fix"
                                name="captcha"
                                id="r-captcha"
                                placeholder="验证码">
                    </div>
                    <div class="col-xs-4">
                        <img class="img-responsive img-rounded form-control input-lg captcha"
                                src="{{$captcha::src()}}"
                                onclick="this.src = this.src.split('?')[0]+ '?' + Math.random()" title="点击刷新"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-7 col-xs-offset-4">
                        <button id="submit-register" type="submit" class="btn btn-primary btn-lg">
                            完成注册
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-7 col-xs-offset-4">
                        已有账号? <a href="{{url('auth/login')}}">立即登录>></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-6 right-wrap">
            <div class="right-img"></div>
        </div>
    </div>
</section>