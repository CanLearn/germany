<div class="container-header">
    <div class="container-header__logo">
        <a href="">Amin</a>
    </div>
    <div class="container-header__nav">
        <ul>
            @foreach((new \App\repository\Categories\CategoryRepo())->categoryParent() as $category)

                <li><a href="{{ route('landing.category.slug' , $category->slug )  }}">{{ $category->name  }}</a></li>
            @endforeach
            <li>
                <button class="opensnav" id="openSnav">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12H20M4 8H20M4 16H12" stroke="#000000" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                </button>
            </li>
        </ul>
    </div>
    <div class="sm-menu-btn">
        <div class="nav-icon" id="openSm">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<div class="container-body">
    <div class="sm-menu" id="menuMoSm">
        <div class="sm-menu-body">
            <ul>
                {{--                        @foreach(\App\repository\Categories\CategoryRepo:: as $category)--}}
                @foreach((new \App\repository\Categories\CategoryRepo())->categoryParent() as $category)
                    <li><a href="{{ route('landing.category.slug' , $category->slug )  }}">{{ $category->name  }}</a></li>
                @endforeach
                <li><button id="openAcc">mehr...</button></li>
            </ul>
            <div class="accmenu">
                <div class="site-category-menu">
                    <div class="site-category-menu-body">
                        <nav class="category-page">
                            @foreach((new \App\repository\Categories\CategoryRepo())->categoryParent() as $category)
                                <div class="category-page_list">
                                    <ul>
                                        <li class="list-title">{{ $category->name }}</li>
                                        @foreach($category->children as $item)
                                            <li><a href="">{{ $item->name  }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="site-category-menu site-category-menu_lg">
    <div class="site-category-menu-body">
        <nav class="category-page">
            @foreach((new \App\repository\Categories\CategoryRepo())->categoryParent() as $category)
                <div class="category-page_list">
                    <ul>
                        <li class="list-title">{{ $category->name  }}</li>
                        @foreach($category->children as $item)
                            <li><a href="">{{ $item->name  }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </nav>
    </div>
</div>
