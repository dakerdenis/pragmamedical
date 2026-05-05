<!DOCTYPE html>
<html lang="{{ $lang ?? 'az' }}">

<head>
    <meta charset="UTF-8">
    <title>Pragmamedical</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
            <a href="/{{ $lang ?? 'az' }}" class="header__navigation-element">{{ t('header.home') }}</a>
            <a href="/{{ $lang ?? 'az' }}#about" class="header__navigation-element">{{ t('header.about') }}</a>
            <a href="/{{ $lang ?? 'az' }}/catalog" class="header__navigation-element">{{ t('header.products') }}</a>
            <a href="/{{ $lang ?? 'az' }}/doctor-info" class="header__navigation-element">{{ t('header.doctor') }}</a>
            <a href="/{{ $lang ?? 'az' }}/rules" class="header__navigation-element">{{ t('header.hygiene') }}</a>
            <a href="/{{ $lang ?? 'az' }}/blog" class="header__navigation-element">{{ t('header.blog') }}</a>
            <a href="/{{ $lang ?? 'az' }}#contact" class="header__navigation-element">{{ t('header.contact') }}</a>
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
    <a href="#">{{ t('footer.terms') }}</a>
    <a href="#">{{ t('footer.privacy') }}</a>
</div>
        </div>

        <div class="footer__rights">
            <p>{{ t('footer.rights') }}</p>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var SCROLL_OFFSET = -110; // отрицательное = выше, положительное = ниже

            function scrollToTarget(target) {
                var top = target.getBoundingClientRect().top + window.pageYOffset + SCROLL_OFFSET;
                window.scrollTo({
                    top: top,
                    behavior: 'smooth'
                });
            }

            if (window.location.hash) {
                var target = document.querySelector(window.location.hash);
                if (target) {
                    setTimeout(function() {
                        scrollToTarget(target);
                    }, 100);
                }
            }

            document.querySelectorAll('a[href*="#"]').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    var href = this.getAttribute('href');
                    var hashIndex = href.indexOf('#');
                    if (hashIndex === -1) return;
                    var hash = href.substring(hashIndex);
                    var path = href.substring(0, hashIndex);
                    var currentPath = window.location.pathname;

                    if (!path || path === currentPath || path === '/' + (document.documentElement
                            .lang || 'az')) {
                        var target = document.querySelector(hash);
                        if (target) {
                            e.preventDefault();
                            history.pushState(null, '', href);
                            scrollToTarget(target);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
