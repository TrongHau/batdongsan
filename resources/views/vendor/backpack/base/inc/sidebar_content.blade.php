<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<!-- Users, Roles Permissions -->

<li><a href="{{backpack_url('article') }}"><i class="fa fa-file-o"></i> <span>Tin Tức</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-usd"></i> <span>Tin rao BĐS</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('article_for_lease') }}"><i class="fa fa-btc"></i> <span>Bán - cho thuê</span></a></li>
        <li><a href="{{ backpack_url('article_for_buy') }}"><i class="fa fa-handshake-o"></i> <span>Mua - cần thuê</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-cloud-download"></i> <span>Lấy tin BĐS</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('sync_article') }}"><i class="fa fa-file-o"></i> <span>Lấy tin tức</span></a></li>
        <li><a href="{{ backpack_url('sync_article_for_lease') }}"><i class="fa fa-btc"></i> <span>Lấy rao bán - cho thuê</span></a></li>
        <li><a href="{{ backpack_url('sync_article_for_buy') }}"><i class="fa fa-handshake-o"></i> <span>Lấy rao mua - cần thuê</span></a></li>
    </ul>
</li>
{{--<li class="treeview">--}}
    {{--<a href="#"><i class="fa fa-cloud-download"></i> <span>Lấy tin ChoTot</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
    {{--<ul class="treeview-menu">--}}
        {{--<li><a href="{{ backpack_url('sync_article_for_lease_chotot') }}"><i class="fa fa-btc"></i> <span>Lấy rao bán - cho thuê</span></a></li>--}}
        {{--<li><a href="{{ backpack_url('sync_article_for_buy_chotot') }}"><i class="fa fa-handshake-o"></i> <span>Lấy rao mua - cần thuê</span></a></li>--}}
    {{--</ul>--}}
{{--</li>--}}
<li><a href="{{backpack_url('phone') }}"><i class="fa fa-phone"></i> <span>Quản lý SĐT</span></a></li>
<li><a href="{{backpack_url('tag') }}"><i class="fa fa-tag"></i> <span>Tags</span></a></li>
<li><a href="{{backpack_url('category') }}"><i class="fa fa-list"></i> <span>Danh mục</span></a></li>
<li><a href="{{backpack_url('page') }}"><i class="fa fa-file"></i> <span>Dịch vụ</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
        <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
<li><a href="{{backpack_url('report') }}"><i class="fa fa-flag"></i> <span>Cảnh báo tin</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-cogs"></i> <span>Advanced</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
        <li><a href="{{ backpack_url('backup') }}"><i class="fa fa-hdd-o"></i> <span>Backups</span></a></li>
        <li><a href="{{ backpack_url('log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>
        <li><a href="{{ backpack_url('setting') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
    </ul>
</li>