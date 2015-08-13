<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel" style="height: 65px">
            <div class="pull-left image">
                <img src="{{asset('images/avatar05.jpg')}}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()['name']}}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <ul class="sidebar-menu" id="sidebar-nav-active">
            <li class="header">导航</li>

            <li class="treeview">
                <a href="{{route('admin.index')}}">
                    <i class="fa fa-dashboard"></i> <span>总揽面板</span>
                    <small class="label pull-right bg-green">new</small>
                </a>
            </li>
            <li class="header">平台管理</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>发布</span>
                    <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="{{route('index')}}"><i class="fa fa-circle-o"></i> 文章</a>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 单页</a></li>
                </ul>
            </li>

            <li class="header">标签意义</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>重要的</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>警告的</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>信息</span></a></li>
        </ul>
    </section>
</aside>