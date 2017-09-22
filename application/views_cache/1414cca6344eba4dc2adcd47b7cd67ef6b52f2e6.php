<div class="user-info">
    <div class="media"> <a class="pull-left" href="#">
            <div class="media-object border border-purple br64 bw2 p2"> <img class="br64" src="/static/img/avatars/5.jpg" alt="..."> </div>
        </a>
        <div class="mobile-link"> <span class="glyphicons glyphicons-show_big_thumbnails"></span> </div>
        <div class="media-body">
            <h5 class="media-heading mt5 mbn fw700 cursor">
                <?php echo e(isset($user_name) ? $user_name : '暂无昵称'); ?>

                <span class="caret ml5"></span>
            </h5>
            <div class="media-links fs11">
                <a href="#">菜单</a>
                <i class="fa fa-circle text-muted fs3 p8 va-m"></i>
                <a href="javascript:;" ajax-id="common" data-url="/login/loginOut" gotourl="/login">登出</a>
            </div>
        </div>
    </div>
</div>
<div class="user-divider"></div>
<div class="user-menu">
    <div class="row text-center mb15">
        <div class="col-xs-4"> <a href="dashboard.html"> <span class="glyphicons glyphicons-home fs22 text-blue2"></span>
                <h5 class="fs11">Home</h5>
            </a> </div>
        <div class="col-xs-4"> <a href="messages.html"> <span class="glyphicons glyphicons-inbox fs22 text-orange2"></span>
                <h5 class="fs11">Inbox</h5>
            </a> </div>
        <div class="col-xs-4"> <a href="tables.html"> <span class="glyphicons glyphicons-bell fs22 text-purple2"></span>
                <h5 class="fs11">Data</h5>
            </a> </div>
    </div>
    <div class="row text-center">
        <div class="col-xs-4 text-center"> <a href="timeline.html"> <span class="glyphicons glyphicons-imac fs22 text-grey3"></span>
                <h5 class="fs11">Views</h5>
            </a> </div>
        <div class="col-xs-4"> <a href="profile.html"> <span class="glyphicons glyphicons-settings fs22 text-green2"></span>
                <h5 class="fs11">Settings</h5>
            </a> </div>
        <div class="col-xs-4"> <a href="gallery.html"> <span class="glyphicons glyphicons-restart fs22 text-light6"></span>
                <h5 class="fs11">Images</h5>
            </a> </div>
    </div>
</div>