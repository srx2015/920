<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    @include('public.title')
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme">
    <meta name="description" content="Fusion - A Responsive HTML5 Admin UI Template Theme">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('public.css')

</head>

<body class="datatables-page">

{{--<!--主题设置-->
@include('public.toolbox')--}}

@include('public.header')

<div id="main">
    <!-- Start: Sidebar -->
    <aside id="sidebar_left">
        <!--用户信息-->
        @include('public.user_info')
        <div class="sidebar-menu">
            <!--菜单-->
            @include('public.menu')
        </div>
    </aside>
    <!-- End: Sidebar -->
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <!--所在-->
            @include('public.topbar')
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-list-alt"></span> Striped Table </span> </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                            @include('public.page')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Content -->

    {{--@include('public.right')--}}
</div>

@include('public.js')
</body>
</html>
