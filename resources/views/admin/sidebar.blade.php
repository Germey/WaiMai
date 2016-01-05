<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        @foreach ($menu_items as $menu_item)
            <li class="{{ array_key_exists('children', $menu_item)?'submenu':'' }}">
                <a href="{{ URL('admin/'.$menu_item['path']) }}">
                    <i class="icon icon-{{ $menu_item['icon'] }}"></i>
                    <span>{{ $menu_item['text'] }}</span>
                </a>
                @if (array_key_exists('children', $menu_item))
                    <ul>
                        @foreach ($menu_item['children'] as $child)
                            <li>
                                <a href="{{ URL('admin/'.($menu_item['path']?($menu_item['path'].'/'):'').$child['path']) }}">
                                    <i class="fa fa-{{ $child['icon'] }}"></i>
                                    <span>{{ $child['text'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        @if (!$admin_path)
            <script>
                $('#sidebar > ul > li:first-child').addClass('active');
            </script>
        @endif
    </ul>
</div>
<!--sidebar-menu-->