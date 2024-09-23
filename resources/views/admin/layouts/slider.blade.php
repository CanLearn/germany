<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{ route('panel.dashboard')  }}">
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class=" icon-user"></i>
                    <span>users</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('panel.users.index')  }}">index</a></li>
                    <li><a class="" href="{{ route('panel.users.create')  }}">create</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-cogs"></i>
                    <span>Category Gallery</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('panel.category.index')  }}">index</a></li>
                    <li><a class="" href="{{ route('panel.category.create')  }}">create</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-tasks"></i>
                    <span>Post Gallery</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('panel.posts.index')  }}">index post</a></li>
                    <li><a class="" href="{{ route('panel.posts.create')  }}">create post</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-tasks"></i>
                    <span>Tag Gallery</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('panel.tags.index')  }}">index post</a></li>
                    <li><a class="" href="{{ route('panel.tags.create')  }}">create post</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-tasks"></i>
                    <span>comments Gallery</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('panel.comments.index')  }}">index post</a></li>
                </ul>
            </li>
            <li>
                <a class="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                    <i class="icon-user" ></i>
                    <span>logout</span>
                <form action="{{ route('logout') }}" method="post" id="logout-form">
                    @csrf
                </form>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
