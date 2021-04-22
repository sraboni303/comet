<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="#"><i class="fe fe-home"></i> <span> Dashboard</span></a>
                </li>
                <li class="{{  request()->routeIs('create.post') ? 'active' : '' }}">
                    <a href="{{ route('create.post') }}"> <i class="fe fe-document"></i> <span> Create Post</a>
                </li>
                <li class="{{  request()->routeIs('list.posts') ? 'active' : '' }}">
                    <a href="{{ route('list.posts') }}"> <i class="fe fe-document"></i> <span> Posts List </a>
                </li>
                <li class="{{  request()->routeIs('trashes.posts') ? 'active' : '' }}">
                    <a href="{{ route('trashes.posts') }}"> <i class="fe fe-document"></i> <span> Trashes </a>
                </li>
                <li class="{{  request()->routeIs('category.backend') ? 'active' : '' }}">
                    <a href="{{ route('category.backend') }}"><i class="fe fe-document"></i> <span> Categories </a>
                </li>
                <li class="{{  request()->routeIs('tag.backend') ? 'active' : '' }}">
                    <a href="{{ route('tag.backend') }}"><i class="fe fe-document"></i> <span>  Tags </a>
                </li>
                {{-- <li class="{{  request()->routeIs('role.backend') ? 'active' : '' }}">
                    <a href="{{ route('role.backend') }}"><i class="fe fe-document"></i> <span>  Roles </a>
                </li> --}}
                <li class="{{  request()->routeIs('member.backend') ? 'active' : '' }}">
                    <a href="{{ route('member.backend') }}"><i class="fe fe-document"></i> <span>  Members </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
