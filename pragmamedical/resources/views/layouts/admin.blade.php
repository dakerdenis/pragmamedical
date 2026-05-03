<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel — @yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/pages/admin.css">
    @yield('styles')
</head>

<body>

<div class="admin">

    <aside class="admin-sidebar">
        <div class="sidebar-logo">
            <img src="/images/logo.png" alt="logo">
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.blog') }}" class="sidebar-link {{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
                <i class="fa fa-pencil-square-o"></i>
                <span>Блог</span>
            </a>
            <a href="{{ route('admin.products') }}" class="sidebar-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                <i class="fa fa-cube"></i>
                <span>Товары</span>
            </a>
            <a href="{{ route('admin.sliders') }}" class="sidebar-link {{ request()->routeIs('admin.sliders*') ? 'active' : '' }}">
                <i class="fa fa-image"></i>
                <span>Слайдер</span>
            </a>
            <a href="{{ route('admin.pages') }}" class="sidebar-link {{ request()->routeIs('admin.pages*') ? 'active' : '' }}">
                <i class="fa fa-file-text-o"></i>
                <span>Тексты</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="sidebar-logout">
                    <i class="fa fa-sign-out"></i>
                    <span>Выход</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="admin-main">
        <header class="admin-header">
            <h1 class="admin-page-title">@yield('title', 'Dashboard')</h1>
            <div class="admin-header-right">
                <span class="admin-user"><i class="fa fa-user-circle"></i> Admin</span>
            </div>
        </header>

        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>