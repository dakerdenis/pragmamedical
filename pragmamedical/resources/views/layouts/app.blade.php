<!DOCTYPE html>
<html lang="{{ $lang ?? 'az' }}">

<head>
    <meta charset="UTF-8">
    <title>Pragmamedical</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="/css/app.css">
    @yield('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <header class="header__container">
        <!---header Logo---->
        <a href="/{{ $lang ?? 'az' }}" class="header__logo">
            <img src="/images/logo.png" alt="logo">
        </a>
        <!--- HEader navigation--->
        <div class="header__navigation">
            <a href="#" class="header__navigation-element">Əsas səhifə</a>
            <a href="#" class="header__navigation-element">Haqqımızda</a>
            <a href="#" class="header__navigation-element">Məhsullar</a>
            <a href="#" class="header__navigation-element">Həkimlər üçün məlumatlar</a>
            <a href="#" class="header__navigation-element">Bloq</a>
            <a href="#" class="header__navigation-element">Əlaqə</a>
        </div>
        <!---- Header Language ------>
        <div class="header__language" id="langSwitcher">
            <span class="header__language-current">
                {{ strtoupper($lang ?? 'az') }}
            </span>
            <span class="header__language-arrow"></span>

            <div class="header__language-dropdown">
                <a href="/az">AZ</a>
                <a href="/ru">RU</a>
                <a href="/en">EN</a>
            </div>
        </div>
    </header>

    @yield('content')


    <footer class="footer__container">
        <div class="footer__wrapper">
            <div class="footer__data">
                <a href="#">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>Həsən Əliyev küç</span>
                </a>
                <a href="#">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>+994 77 250 93 00</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>info@pragmamedical.az</span>
                </a>
            </div>

            <div class="footer__terms">
                <a href="#">Terms and Conditions</a>
                <a href="#">Privacy Policy</a>
            </div>
        </div>

        <div class="footer__rights">
            <p>© 2026 Pragma Medical. All rights reserved.</p>
        </div>
        <div class="footer__logo">
            <div class="footer__logo-block">
                <img src="/images/logo.png" alt="logo">
            </div>
        </div>
    </footer>
    <!---------------->
    <script>
        const switcher = document.getElementById('langSwitcher');

        switcher.addEventListener('click', function(e) {
            e.stopPropagation();
            switcher.classList.toggle('active');
        });

        document.addEventListener('click', function() {
            switcher.classList.remove('active');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
