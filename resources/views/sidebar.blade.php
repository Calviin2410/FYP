<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-item  ">
                <a href="/" class='sidebar-link'>
                    <i class="fa-solid fa-gauge"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="{{ route('users.index') }}" class='sidebar-link'>
                    <i class="fa-solid fa-user"></i>
                    <span>User</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('categories.index') }}" class='sidebar-link'>
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('products.index') }}" class='sidebar-link'>
                    <i class="fa-solid fa-glasses"></i>
                    <span>Product</span>
                </a>
            </li>
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>