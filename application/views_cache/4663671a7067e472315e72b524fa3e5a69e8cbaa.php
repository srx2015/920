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

<body class="minimal login-page">

<!-- Start: Main -->
<div id="main">
    <div id="content">
        <div class="row">
            <div id="page-logo"> <img src="/static/img/logos/logo-white.png" class="img-responsive" alt="logo"> </div>
        </div>
        <div class="row">
            <div class="panel-bg">
                <div class="panel">
                    <form id="form1" action="/login" method="post" gotourl="/index">
                    <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock text-purple2"></span> Login </span>  </div>
                    <div class="panel-body">
                        <div class="login-avatar"> <img src="/static/img/avatars/login.png" width="150" height="112" alt="avatar"> </div>
                        <div class="form-group">
                            <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
                                <input type="text" class="form-control" name="username" placeholder="User Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-link"></span> </span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-sm bg-purple2 pull-right" href="javascript:;" onclick="form_add()"><i class="fa fa-home"></i> Login</a>
                        <div class="clearfix"></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: Main -->

<div class="overlay-black"></div>

<?php echo $__env->make('public.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript" src="/static/vendor/plugins/backstretch/jquery.backstretch.min.js"></script>
<script type="text/javascript">
    function GetRandomNum(Min,Max)
    {
        var Range = Max - Min;
        var Rand = Math.random();
        return(Min + Math.round(Rand * Range));
    }
    $.backstretch('/static/img/stock/'+GetRandomNum(1, 14)+'.jpg');
</script>
</body>
</html>
