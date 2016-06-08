<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @inject('notification','App\Http\Controllers\Admin\NotificationController')
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::user()->file == null || Auth::user()->file == "")
                    <img src="{{ url("image/cache/small/any_image_profile.png") }}" class="user-image" alt="User Image"/>
                @else
                    <img src="{{ url("image/cache/small/".Auth::user()->file->name) }}" class="user-image" alt="User Image"/>
                @endif
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENÚ PRINCIPAL</li>
            <!-- Optionally, you can add icons to the links -->

            <li class="{{ Helper::set_active('admin') }}"><a href="{{url("admin/")}}"><i class="fa fa-home fa-fw"></i> Inicio</a></li>
            <li class="{{ Helper::set_active('admin/lista-mensajes') }}">
                @if($notification->countNotificationNoRead('message')>0)
                    <a href="{{url("admin/lista-mensajes")}}"><i class="fa fa-envelope fa-fw text-aqua"></i> <span>Mensajes</span></a>
                @else
                    <a href="{{url("admin/lista-mensajes")}}"><i class="fa fa-envelope fa-fw"></i> <span>Mensajes</span></a>
                @endif
            </li>
            <li class="header">Contenido</li>
{{----NOTICIAS----}}
            <li class="treeview">
                <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> <span>Noticias</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ Helper::set_active('admin/crear-noticia') }}">
                        <a href="{{url("admin/crear-noticia")}}"><span>Crear noticia</span> <i class="fa fa-plus pull-right"></i></a>
                    </li>
                    <li class="{{ Helper::set_active('admin/lista-de-noticias')}}">
                        <a href="{{url("admin/lista-noticias")}}"><span>Lista de noticias</span> <i class="fa fa-list pull-right"></i></a>
                    </li>
                </ul>
            </li>
{{----ANÁLISIS----}}
            <li class="treeview">
                <a href="#"><i class="fa fa-bar-chart fa-fw"></i> <span>Análisis</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ Helper::set_active('admin/crear-analisis') }}">
                        <a href="{{url("admin/crear-analisis")}}"><span>Crear análisis</span> <i class="fa fa-plus pull-right"></i></a>
                    </li>
                    <li class="{{ Helper::set_active('admin/lista-analisis')}}">
                        <a href="{{url("admin/lista-analisis")}}"><span>Lista de análisis</span> <i class="fa fa-list pull-right"></i></a>
                    </li>
                </ul>
            </li>
{{----ARTÍCULOS----}}
            <li class="treeview">
                <a href="#"><i class="fa fa-file-word-o  fa-fw"></i> <span>Artículos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ Helper::set_active('admin/crear-articulo') }}">
                        <a href="{{url("admin/crear-articulo")}}"><span>Crear artículo</span> <i class="fa fa-plus pull-right"></i></a>
                    </li>
                    <li class="{{ Helper::set_active('admin/lista-articulos')}}">
                        <a href="{{url("admin/lista-articulos")}}"><span>Lista de artículos</span> <i class="fa fa-list pull-right"></i></a>
                    </li>
                </ul>
            </li>
{{----SESIONES Y GÉNERO----}}
            <li class="treeview">
                <a href="#"><i class="fa fa-music fa-fw"></i> <span>Sesiones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ Helper::set_active('admin/crear-sesion') }}">
                        <a href="{{url("admin/crear-sesion")}}"><span>Crear sesión</span> <i class="fa fa-plus pull-right"></i></a>
                    </li>
                    <li class="{{ Helper::set_active('admin/lista-sesiones')}}">
                        <a href="{{url("admin/lista-sesiones")}}"><span>Lista de sesiones</span> <i class="fa fa-list pull-right"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle fa-fw"></i> <span>Géneros</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="{{ Helper::set_active('admin/sesiones/crear-genero') }}">
                                <a href="{{url("admin/sesiones/crear-genero")}}"><span>Crear género</span> <i class="fa fa-plus pull-right"></i></a>
                            </li>
                            <li class="{{ Helper::set_active('admin/sesiones/lista-generos')}}">
                                <a href="{{url("admin/sesiones/lista-generos")}}"><span>Lista de géneros</span> <i class="fa fa-list pull-right"></i></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
{{----PRODUCTOS Y SUBPRODUCTOS----}}
            <li class="treeview">
                <a href="#"><i class="fa fa-th fa-fw"></i> <span>Producto y subproducto</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#"><i class="fa fa-circle fa-fw"></i> <span>Producto</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="{{ Helper::set_active('admin/productos/crear-producto') }}">
                                <a href="{{url("admin/productos/crear-producto")}}"><span>Crear producto</span> <i class="fa fa-plus pull-right"></i></a>
                            </li>
                            <li class="{{ Helper::set_active('admin/productos/lista-productos')}}">
                                <a href="{{url("admin/productos/lista-productos")}}"><span>Lista de productos</span> <i class="fa fa-list pull-right"></i></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle fa-fw"></i> <span>Subroductos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="{{ Helper::set_active('admin/productos/crear-subproducto') }}">
                                <a href="{{url("admin/productos/crear-subproducto")}}"><span>Crear subproducto</span> <i class="fa fa-plus pull-right"></i></a>
                            </li>
                            <li class="{{ Helper::set_active('admin/productos/lista-subproductos')}}">
                                <a href="{{url("admin/productos/lista-subproductos")}}"><span>Lista de subproductos</span> <i class="fa fa-list pull-right"></i></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="header">Configuración</li>
{{----MENSAJE DE ALERTA----}}
            <li class=""><a href="{{url("admin/alertas")}}"><i class="fa fa-exclamation-triangle fa-fw"></i>Mensaje de alerta</a></li>
{{----SLIDER----}}
            <li class="treeview">
                <a href="#"><i class="fa fa-slideshare fa-fw"></i> <span>Slider</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ Helper::set_active('admin/crear-slide') }}">
                        <a href="{{url("admin/crear-slide")}}"><span>Crear slide</span> <i class="fa fa-plus pull-right"></i></a>
                    </li>
                    <li class="{{ Helper::set_active('admin/lista-slides')}}">
                        <a href="{{url("admin/lista-slides")}}"><span>Lista de slides</span> <i class="fa fa-list pull-right"></i></a>
                    </li>
                </ul>
            </li>
{{----USUARIOS----}}
            <li class="treeview">
                <a href="#"><i class="fa fa-users fa-fw"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ Helper::set_active('admin/crear-usuario') }}">
                        <a href="{{url("admin/crear-usuario")}}"><span>Crear usuario</span> <i class="fa fa-user-plus pull-right"></i></a>
                    </li>
                    <li class="{{ Helper::set_active('admin/lista-usuarios')}}">
                        <a href="{{url("admin/lista-usuarios")}}"><span>Lista de usuarios</span> <i class="fa fa-list pull-right"></i></a>
                    </li>
                </ul>
            </li>
{{----GESTOR ARCHIVOS----}}
            <li class=""><a href="{{url("/laravel-filemanager")}}" target="_blank"><i class="fa fa-folder-open fa-fw"></i> Gestor de archivos</a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>