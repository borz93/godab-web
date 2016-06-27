<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo"><b>Administración</b>WEB</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        @inject('notification','App\Http\Controllers\Admin\NotificationController')
                        <span class="label label-warning">{{$notification->countNotificationNoRead()}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tienes: {{$notification->countNotificationNoRead()}} notificaciones</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->

                                    @if($notification->countNotificationNoRead('message')>0)
                                        <a href="{{url($notification->getFirstNotificationNoRead('message')->url)}}">
                                            <i class="fa fa-envelope text-aqua"></i> {{$notification->getFirstNotificationNoRead('message')->body}}
                                        </a>
                                    @endif
                                    @if($notification->countNotificationNoRead('post')>0)
                                        <a href="{{url($notification->getFirstNotificationNoRead('post')->url)}}">
                                            <i class="fa fa-newspaper-o text-aqua"></i> {{$notification->getFirstNotificationNoRead('post')->body}}
                                        </a>
                                    @endif
                                    @if($notification->countNotificationNoRead('article')>0)
                                        <a href="{{url($notification->getFirstNotificationNoRead('article')->url)}}">
                                            <i class="fa fa-file-word-o text-aqua"></i> {{$notification->getFirstNotificationNoRead('article')->body}}
                                        </a>
                                    @endif
                                    @if($notification->countNotificationNoRead('analysis')>0)
                                        <a href="{{url($notification->getFirstNotificationNoRead('analysis')->url)}}">
                                            <i class="fa fa-bar-chart text-aqua"></i> {{$notification->getFirstNotificationNoRead('analysis')->body}}
                                        </a>
                                    @endif
                                    @if($notification->countNotificationNoRead('session')>0)
                                        <a href="{{url($notification->getFirstNotificationNoRead('session')->url)}}">
                                            <i class="fa fa-music text-aqua"></i> {{$notification->getFirstNotificationNoRead('session')->body}}
                                        </a>
                                    @endif

                                </li><!-- end notification -->
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ url("image/cache/small/".Auth::user()->avatarAction()) }}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                                <img src="{{ url("image/cache/small/".Auth::user()->avatarAction()) }}" class="user-image" alt="User Image"/>
                            <p>
                                {{Auth::user()->email}}
                                <small>Miembro desde: {{date('d/ m/ Y', strtotime(Auth::user()->created_at))}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                {{link_to('admin/perfil-usuario','Perfil',['class'=>'btn btn-default btn-flat'] )}}
                            </div>
                            <div class="pull-right">
                                {{link_to('admin/logout','Cerrar sesión',['class'=>'btn btn-default btn-flat'] )}}
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>