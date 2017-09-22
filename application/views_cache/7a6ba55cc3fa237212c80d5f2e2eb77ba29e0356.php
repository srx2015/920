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
<body class="dashboard-page">



<?php echo $__env->make('public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Start: Main -->
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

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <!--所在-->
            <?php echo $__env->make('public.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div id="content">
            <div id="widget-dropdown" class="row">
                <div class="col-sm-3">
                    <div class="panel panel-overflow mb10">
                        <div class="panel-body pn pl20">
                            <div class="icon-bg"><i class="fa fa-envelope text-grey"></i></div>
                            <h2 class="mt15 lh15 text-grey2"><b>728</b></h2>
                            <h5 class="text-muted">Connections</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-overflow mb10">
                        <div class="panel-body pn pl20">
                            <div class="icon-bg"><i class="fa fa-bar-chart-o text-teal"></i></div>
                            <h2 class="mt15 lh15 text-teal2"><b>267</b></h2>
                            <h5 class="text-muted">Reach</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-overflow mb10">
                        <div class="panel-body pn pl20">
                            <div class="icon-bg"><i class="fa fa-comments-o text-blue"></i></div>
                            <h2 class="mt15 lh15 text-blue2"><b>523</b></h2>
                            <h5 class="text-muted">Comments</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="panel panel-overflow mb10">
                        <div class="panel-body pn pl20">
                            <div class="icon-bg"><i class="fa fa-twitter text-purple"></i></div>
                            <h2 class="mt15 lh15 text-purple2"><b>348</b></h2>
                            <h5 class="text-muted">Tweets</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-overflow mb10 hidden">
                        <div class="row">
                            <div class="col-md-4 facebook-color text-center p20"> <i class="fa fa-facebook fs35 text-white"></i> </div>
                            <div class="col-md-4 twitter-color text-center p20"> <i class="fa fa-facebook fs35 text-white"></i> </div>
                            <div class="col-md-4 bg-orange text-center p20"> <i class="fa fa-facebook fs35 text-white"></i> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center p10">
                                <h3 class="text-muted"> 1,215 </h3>
                            </div>
                            <div class="col-md-4 text-center p10">
                                <h3> 584 </h3>
                            </div>
                            <div class="col-md-4 text-center p10">
                                <h3> 907 </h3>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-overflow">
                        <div class="row table-layout table-clear-xs">
                            <div class="col-sm-8 va-m p15 pt20">
                                <div id="clndr"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-overflow chat-panel">
                        <div class="panel-heading"> <span class="panel-title"> <i class="fa fa-calendar"></i> 通知</span>
                            <div class="pull-right pr15"><span class="small text-muted">4 New Messages</span></div>
                        </div>
                        <div class="panel-body p20 pb10 pt10">
                            <div class="row">
                                <div class="col-md-12 pl10">
                                    <div class="media mt15"> <a class="pull-left" href="#"> <img class="media-object thumbnail thumbnail-sm rounded" src="/static/img/avatars/2.jpg" alt="..."> </a>
                                        <div class="media-body">
                                            <h5 class="media-heading mb5">Simon Rivers <small> - 3 hours ago</small></h5>
                                            <p class="text-muted"> Hey Louis, I was wondering if you had time yet</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
</div>
<!-- End #Main -->

<?php echo $__env->make('public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript" src="/static/vendor/plugins/clndr/clndr.js"></script>
<script type="text/javascript" src="/static/vendor/plugins/clndr/moment.js"></script>
<script type="text/javascript" src="/static/js/utility/underscore-min.js"></script>
<script>
    // Clndr Plugin
    var runClndr = function () {
        // Init Clndr Widget (small calendar)
        $('#clndr').clndr({
            daysOfTheWeek: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        });
    }
    runClndr();
</script>
</body>
</html>
