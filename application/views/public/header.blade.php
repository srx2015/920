<header class="navbar navbar-fixed-top">
    <div class="navbar-branding"> <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span> <a class="navbar-brand" href="dashboard.html"><img src="/static/img/logos/header-logo.png"></a> </div>
    <div class="navbar-left">
        <div class="navbar-divider"></div>
        <div id="settings_menu"> <span class="glyphicons glyphicons-settings dropdown-toggle cursor" data-toggle="dropdown"></span>
            <ul class="dropdown-menu" role="menu">
                <li><a href="javascript:void(0);"><span class="glyphicons glyphicons-user text-red2 mr15"></span>Users</a></li>
                <li><a href="javascript:void(0);"><span class="glyphicons glyphicons-cargo text-purple2 mr15"></span>Servers</a></li>
                <li><a href="javascript:void(0);"><span class="glyphicons glyphicons-history text-grey2 mr15"></span>Crons</a></li>
            </ul>
        </div>
    </div>
    <div class="navbar-right">
        <div class="navbar-search">
            <input type="text" id="HeaderSearch" placeholder="Search..." value="Search...">
        </div>
        <div class="navbar-menus">
            <div class="btn-group" id="alert_menu">
                <button type="button" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicons glyphicons-bell"></span> <b>3</b> </button>
                <ul class="dropdown-menu media-list" role="menu">
                    <li class="dropdown-header">Recent Alerts<span class="pull-right glyphicons glyphicons-bell"></span></li>
                    <li class="p15 pb10">
                        <ul class="list-unstyled">
                            <li><span class="glyphicons glyphicons-bell text-orange2 fs16 mr15"></span><b>CEO</b> lunch meeting Tuesday</li>
                            <li class="pt10"><span class="glyphicons glyphicons-facebook text-blue2 fs16 mr15"></span>Facebook likes are at <b>4,100</b></li>
                            <li class="pt10"><span class="glyphicons glyphicons-paperclip text-teal2 fs16 mr15"></span>Mark <b>uploaded</b> 3 new Docs</li>
                            <li class="pt10"><span class="glyphicons glyphicons-gift text-purple2 fs16 mr15"></span>It's <b>Marks</b> 34th Birthday</li>
                            <li class="pt10"><span class="glyphicons glyphicons-cup text-red2 fs16 mr15"></span>Best new employee awarded to <b>Jessica</b></li>
                        </ul>
                    </li>
                </ul>
            </div>
            {{--<div class="btn-group" id="toggle_sidemenu_r">
                <button type="button"> <span class="glyphicons glyphicons-parents"></span> </button>
            </div>--}}
        </div>
    </div>
</header>