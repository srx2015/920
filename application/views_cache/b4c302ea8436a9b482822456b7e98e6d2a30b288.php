<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?php echo $__env->make('public.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme">
    <meta name="description" content="Fusion - A Responsive HTML5 Admin UI Template Theme">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $__env->make('public.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</head>

<body class="datatables-page">



<?php echo $__env->make('public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div id="main">
    <!-- Start: Sidebar -->
    <aside id="sidebar_left">
        <!--用户信息-->
        <?php echo $__env->make('public.user_info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="sidebar-menu">
            <!--菜单-->
            <?php echo $__env->make('public.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </aside>
    <!-- End: Sidebar -->
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <!--所在-->
            <?php echo $__env->make('public.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                            <?php echo $__env->make('public.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Content -->

    
</div>

<?php echo $__env->make('public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
