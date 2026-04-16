@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="/css/pages/home.css">
@endsection
@section('content')
    <div class="home__container">
        <!---swiper---->
        <div class="home__swiper">

        </div>
        <!---about---->
        <div class="home__about">
            <div class="home__about-deco">
                <img src="/images/Deco.png" alt="">
            </div>
            <div class="home__about-wrapper">
                <div class="home__about-image">
                    <div class="home__about-image-container">
                        <h3>HAQQIMIZDA</h3>
                        <img src="/images/about.png" alt="">
                    </div>
                </div>
                <div class="home__about-desc">
                    <div class="home__about-name">
                        <h3>PRAGMA MEDICAL</h3>
                    </div>
                    <div class="home__about-text">
                        <p>Bizim əsas məqsədimiz insanların sağlamlığını qorumaq, həyat keyfiyyətini yaxşılaşdırmaq və
                            sağlam gələcəyə töhfə verməkdir. Hazırladığımız hər bir məhsul pasiyentlərin ehtiyaclarını
                            nəzərə alaraq elmi əsaslarla formalaşdırılır və cəmiyyətin rifahına xidmət edir. Biz xüsusilə
                            “yara müalicəsi” sahəsində yenilikçi və effektiv məhsullar təqdim edirik. </p>
                        <p>Müasir tərkibli gellər, spreylər və antiseptik məhlullar vasitəsilə yaraların tez sağalmasına,
                            infeksiyalardan qorunmasına və xəstələrin həyat keyfiyyətinin yüksəlməsinə dəstək oluruq.
                            Məhsullarımız həm kəskin, həm də xroniki yaraların müalicəsində istifadə olunur və beynəlxalq
                            tibbi standartlara tam cavab verir. </p>
                        <p>Bizim üçün hər yara sadəcə bir xəsarət deyil, hər həyat qədər dəyərlidir. Yenilikçi yara
                            müalicəsi məhsullarımızla sağalmanı sürətləndiririk. Araşdırma və inkişaf fəaliyyətlərimiz
                            sayəsində ən müasir elmi nailiyyətləri tətbiq edir, innovativ formulalarla pasiyentlərə və
                            həkimlərə daha effektiv müalicə üsulları təqdim edirik. İstehsal və paylama proseslərimizdə
                            yüksək keyfiyyət standartlarına riayət edirik. </p>
                        <p>Pasiyentlər və həkimlər üçün etibarlı tərəfdaş olmaq bizim əsas prinsiplərimizdən biridir.</p>
                    </div>
                </div>
            </div>
        </div>
        <!---CATALOG---->
        <div class="home__catalog">
            <div class="home__catalog-deco">
                <img src="/images/catalog-deco.png" alt="">
            </div>
            <div class="home__catalog-wrapper">
                <div class="home__catalog-name_link">
                    <h3>MƏHSULLAR</h3>
                    <a href="#">
                        <p>Katalog</p>
                        <img src="/images/catalog-arrow.png" alt="">
                    </a>
                </div>
                <div class="home__catalog-container">
                    <div class="home__catalog-container_swiper">

                    </div>
                </div>
            </div>
        </div>
        <!---BLOG--->
        <div class="home__blog">
            <div class="home__blog-container">
                <div class="home__blog-name_link">
                    <h3>BLOG</h3>
                    <a href="#">
                        <p>Hamsına bax</p>
                        <img src="/images/catalog-arrow.png" alt="">
                    </a>
                </div>
                <div class="home__blog-wrapper">
                    <a href="#" class="home__blog-big">
                        <div class="home__blog-big_image">
                            <img src="/images/blog_test.png" alt="">
                        </div>
                        <div class="home__blog-big_name">
                            <h4>In this section, we delve into various aspects of health</h4>
                        </div>
                        <div class="home__blog-big_desc">
                            <p>Explore the world of medical specialties through our blog's spotlight feature. From
                                cardiology to pediatrics, we share in-depth articles written by our expert physicians. </p>
                            <p>Explore the world of medical specialties through our blog's spotlight feature. From
                                cardiology to pediatrics, we share in-depth articles written by our expert physicians.</p>
                        </div>
                    </a>
                    <div class="home__blog-small_container">
                        <a href="#" class="home__blog-small">
                            <div class="home__blog-small_image">
                                <img src="/images/blog_test1.png" alt="" srcset="">
                            </div>
                            <div class="home__blog-small_wrapper">
                                <div class="home__blog-small_name">
                                    <h4>Discover a treasure trove of practical tips for enhancing</h4>
                                </div>
                                <div class="home__blog-small_desc">
                                    <p>From nutrition advice to exercise routines, we're here to support your journey toward
                                        a healthier</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="home__blog-small">
                            <div class="home__blog-small_image">
                                <img src="/images/blog_test2.png" alt="" srcset="">
                            </div>
                            <div class="home__blog-small_wrapper">
                                <div class="home__blog-small_name">
                                    <h4>Discover a treasure trove of practical tips for enhancing</h4>
                                </div>
                                <div class="home__blog-small_desc">
                                    <p>From nutrition advice to exercise routines, we're here to support your journey toward
                                        a healthier</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="home__blog-small">
                            <div class="home__blog-small_image">
                                <img src="/images/blog_test3.png" alt="" srcset="">
                            </div>
                            <div class="home__blog-small_wrapper">
                                <div class="home__blog-small_name">
                                    <h4>Discover a treasure trove of practical tips for enhancing</h4>
                                </div>
                                <div class="home__blog-small_desc">
                                    <p>From nutrition advice to exercise routines, we're here to support your journey toward
                                        a healthier</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!---Contact--->
        <div class="home__contact">
            <div class="home__contact-deco">
                <img src="/images/contact-Deco.png" alt="">
            </div>
            <div class="home__contact-wrapper">
                <div class="home__contact-name">
                    <h3>BİZİMLƏ ƏLAQƏ</h3>
                </div>
                <div class="home__contact-content">
                    <form action="#" class="home__contact-form">
                        <!---name surname-->
                        <div class="form-input">
                            <p>&nbsp;</p>
                            <input type="text" placeholder="Adınız və Soyadınız? *">
                        </div>
                        <!---email----->
                        <div class="form-input">
                            <p>E-poçt ünvanınız? *</p>
                            <input type="text">
                        </div>
                        <!---number----->
                        <div class="form-input">
                            <p>Əlaqə nömrəniz?</p>
                            <input type="text" placeholder="+12 345 678 90">
                        </div>
                        <!---company----->
                        <div class="form-input">
                            <p>&nbsp;</p>
                            <input type="text" placeholder="Şirkətinizin adı?">
                        </div>
                        <!---message----->
                        <div class="form-message">
                            <textarea name="" id="" placeholder="Mesajinizi burda buraxa bilərsiniz."></textarea>
                        </div>
                        <div class="form-terms__button">
                            <div class="form-terms">
                                <input type="checkbox" name="#" id="">
                                <p>I have read and accept the Terms of <a href="#">Service & Privacy Policy *</a></p>
                            </div>
                            <div class="form-submit">
                                <button>Göndər</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--map----->
        <div class="home__map">

        </div>
    </div>
@section('scripts')
    <script src="/js/pages/home.js"></script>
@endsection
@endsection
