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


    @yield('content')



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
