<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link
                {{ request()->is('/') ? 'active' : '' }}
                    " aria-current="page" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid me-2"></i>
                    داشبورد
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <i class="bi bi-people me-2"></i>
                    ادمین ها
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('my_info*') ? 'active' : '' }}" href="{{ route('myInfo.index') }}">
                    <i class="bi bi-people me-2"></i>
                    مشخصات من
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('sub-title*') ? 'active' : '' }}" href={{ route('subtitle.index') }}>
                    <i class="bi bi-box-seam me-2"></i>
                    مهارت ها
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('skills*') ? 'active' : '' }}" href="{{ route('skills.index') }}">
                    <i class="bi bi-grid-3x3-gap me-2"></i>
                    مهارت های نرم افزاری
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('services*') ? 'active' : '' }}" href="{{ route('service.index') }}">
                    <i class="bi bi-basket me-2"></i>
                    سرویس ها
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('portfolio*') ? 'active' : '' }}" href="{{ route('portfolio.index') }}">
                    <i class="bi bi-currency-dollar me-2"></i>
                    نمونه کار ها
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                {{ request()->is('contact-us*') ? 'active' : '' }}
                " href="{{ route('contact.index') }}">
                    <i class="bi bi bi-chat-left-text me-2"></i>
                    پیام های ارتباط با ما
                </a>
            </li>

        </ul>
    </div>

</nav>
