<ul class="nav">
    <li
        <?php if($controller_name == 'Index' && $action_name == 'index'): ?>
            class="active"
        <?php endif; ?>
    >
        <a href="/index">
            <span class="glyphicons glyphicons-home"></span>
            <span class="sidebar-title">首页</span>
        </a>
    </li>
    <li
        <?php if($controller_name == 'System'): ?>
            class="active"
        <?php endif; ?>
    >
        <a class="accordion-toggle
            <?php if($controller_name == 'System'): ?>
                menu-open
            <?php endif; ?>
        " href="#resources">
            <span class="glyphicons glyphicons-settings"></span>
            <span class="sidebar-title">系统管理</span>
            <span class="caret"></span>
        </a>
        <ul id="resources" class="nav sub-nav">
            <li
                <?php if($controller_name == 'System' && preg_match('/^user/', $action_name) == 1): ?>
                    class="active"
                <?php endif; ?>
            >
                <a class="ajax-disable" href="/system/user">
                    <span class="glyphicons glyphicons-vcard"></span>
                    系统用户管理
                </a>
            </li>
        </ul>
    </li>
</ul>