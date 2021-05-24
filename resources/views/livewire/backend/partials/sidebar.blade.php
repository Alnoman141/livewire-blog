<!--Sidebar-->
<aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

    <ul class="list-reset flex flex-col">
        <li class=" w-full h-full py-3 px-2 border-b border-light-border {{ Route::currentRouteNamed('admin.dashboard') ? 'bg-white' : '' }}" ">
            <a href="{{ route('dashboard')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                Dashboard
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>
        <li class="w-full h-full py-3 px-2 border-b border-light-border {{ Route::currentRouteNamed('admin.category.index') ? 'bg-white' : '' }}">
            <a href="{{ route('admin.category.index')}}" class=" font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fab fa-wpforms float-left mx-2"></i>
                Category List
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li>

        <li class="w-full h-full py-3 px-2 border-b border-light-border {{ Route::currentRouteNamed('admin.tag.index') ? 'bg-white' : '' }}">
            <a href="{{ route('admin.tag.index')}}" class=" font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fab fa-wpforms float-left mx-2"></i>
                Tag List
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li>

        <li class="w-full h-full py-3 px-2 border-b border-light-border {{ Route::currentRouteNamed('admin.post.index') ? 'bg-white' : '' }}">
            <a href="{{ route('admin.post.index')}}" class=" font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fab fa-wpforms float-left mx-2"></i>
                Post List
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li>
    </ul>

</aside>
<!--/Sidebar-->
