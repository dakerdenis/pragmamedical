    @extends('layouts.app')
    @section('styles')
        <link rel="stylesheet" href="/css/pages/home.css">
    @endsection
    @section('content')
        <div class="home__container">
            <!---swiper---->
            <div class="home__swiper">
                <div class="swiper mainSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">SLIDE 1</div>
                        <div class="swiper-slide">SLIDE 2</div>
                        <div class="swiper-slide">SLIDE 3</div>
                    </div>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <!---about---->
            <div class="home__about" id="about">
                <div class="home__about-deco">
                    <img src="/images/Deco.png" alt="">
                </div>
                <div class="home__about-wrapper">
                    <div class="home__about-image">
                        <div class="home__about-image-container">
                            <h3>{{ t('home.about_title') }}</h3>
                            <img src="/images/about.png" alt="">
                        </div>
                    </div>
                    <div class="home__about-desc">
                        <div class="home__about-name">
                            <h3>PRAGMA MEDICAL</h3>
                        </div>
                        <div class="home__about-text">
                            <p>{{ t('home.about_text_1') }}</p>
                            <p>{{ t('home.about_text_2') }}</p>
                            <p>{{ t('home.about_text_3') }}</p>
                            <p>{{ t('home.about_text_4') }}</p>
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
                        <h3>{{ t('home.products_title') }}</h3>
                        <a href="/{{ $lang }}/catalog">
                            <p>{{ t('home.catalog_link') }}</p>
                            <img src="/images/catalog-arrow.png" alt="">
                        </a>
                    </div>
                    <div class="home__catalog-container">
                        <div class="home__catalog-container_swiper">
                            <div class="swiper productSwiper">
                                <div class="swiper-wrapper">
                                    @if ($products->count())
                                        @php
                                            // Repeat products 3x so swiper loops smoothly
                                            $slides = $products->concat($products)->concat($products);
                                        @endphp
                                        @foreach ($slides as $p)
                                            <div class="swiper-slide">
                                                <a href="/{{ $lang }}/catalog/{{ $p->id }}"
                                                    class="catalog__swiper-element"
                                                    style="text-decoration:none; color:inherit;">
                                                    <div class="catalog__swiper-element-image">
                                                        @if ($p->main_image)
                                                            <img src="{{ asset('storage/' . $p->main_image) }}"
                                                                alt="{{ $p->{'title_' . $lang} }}">
                                                        @else
                                                            <img src="/images/catlog1.png" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="catalog__swiper-element-name">
                                                        <h3>{{ $p->{'title_' . $lang} ?? $p->title_az }}</h3>
                                                        @if ($p->price)
                                                            <p>{{ number_format($p->price, 2) }} ₼</p>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="swiper-slide">
                                            <div class="catalog__swiper-element">
                                                <p style="padding:40px; color:#94a3b8;">Hələ məhsul yoxdur</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---BLOG--->
            <div class="home__blog">
                <div class="home__blog-container">
                    <div class="home__blog-name_link">
                        <h3>{{ t('home.blog_title') }}</h3>
                        <a href="/{{ $lang }}/blog">
                            <p>{{ t('home.blog_view_all') }}</p>
                            <img src="/images/catalog-arrow.png" alt="">
                        </a>
                    </div>

                    @if ($blogPosts->count() > 0)
                        <div class="home__blog-wrapper">
                            {{-- First post — big card --}}
                            <a href="/{{ $lang }}/blog/{{ $blogPosts[0]->id }}" class="home__blog-big">
                                <div class="home__blog-big_image">
                                    @if ($blogPosts[0]->main_image)
                                        <img src="{{ asset('storage/' . $blogPosts[0]->main_image) }}" alt="">
                                    @else
                                        <img src="/images/blog_test.png" alt="">
                                    @endif
                                </div>
                                <div class="home__blog-big_name">
                                    <h4>{{ $blogPosts[0]->{'title_' . $lang} ?? $blogPosts[0]->title_az }}</h4>
                                </div>
                                <div class="home__blog-big_desc">
                                    <p>{{ Str::limit($blogPosts[0]->{'description_' . $lang} ?? $blogPosts[0]->description_az, 250) }}
                                    </p>
                                </div>
                            </a>

                            {{-- Posts 2-4 — small cards --}}
                            @if ($blogPosts->count() > 1)
                                <div class="home__blog-small_container">
                                    @foreach ($blogPosts->slice(1) as $post)
                                        <a href="/{{ $lang }}/blog/{{ $post->id }}" class="home__blog-small">
                                            <div class="home__blog-small_image">
                                                @if ($post->main_image)
                                                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="">
                                                @else
                                                    <img src="/images/blog_test1.png" alt="">
                                                @endif
                                            </div>
                                            <div class="home__blog-small_wrapper">
                                                <div class="home__blog-small_name">
                                                    <h4>{{ $post->{'title_' . $lang} ?? $post->title_az }}</h4>
                                                </div>
                                                <div class="home__blog-small_desc">
                                                    <p>{{ Str::limit($post->{'description_' . $lang} ?? $post->description_az, 120) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @else
                        <p style="color:#94a3b8; padding:40px 0; text-align:center;">Hələ heç bir məqalə yoxdur</p>
                    @endif
                </div>
            </div>
            <!---Contact--->
            <div class="home__contact" id="contact">
                <div class="home__contact-deco">
                    <img src="/images/contact-Deco.png" alt="">
                </div>
                <div class="home__contact-wrapper">
                    <div class="home__contact-name">
                        <h3>{{ t('home.contact_title') }}</h3>
                    </div>
                    <div class="home__contact-content">
                        <form action="#" class="home__contact-form">
                            <!---name surname-->
                            <div class="form-input">
                                <p>&nbsp;</p>
                                <input type="text" placeholder="{{ t('home.contact_name') }} *">
                            </div>
                            <!---email----->
                            <div class="form-input">
                                <p>{{ t('home.contact_email_label') }} *</p>
                                <input type="text">
                            </div>
                            <!---number----->
                            <div class="form-input">
                                <p>{{ t('home.contact_phone_label') }}</p>
                                <input type="text" placeholder="+12 345 678 90">
                            </div>
                            <!---company----->
                            <div class="form-input">
                                <p>&nbsp;</p>
                                <input type="text" placeholder="{{ t('home.contact_company') }}">
                            </div>
                            <!---message----->
                            <div class="form-message">
                                <textarea name="" id="" placeholder="{{ t('home.contact_message') }}"></textarea>
                            </div>
                            <div class="form-terms__button">
                                <div class="form-terms">
                                    <input type="checkbox" name="#" id="">
                                    <p>{{ t('home.contact_terms') }}<a href="#">Service & Privacy Policy *</a>
                                    </p>
                                </div>
                                <div class="form-submit">
                                    <button>{{ t('home.contact_submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--map----->
            <div class="home__map">
                <div class="home__map-wrapper">
                    <!--MAp iframe--->
                    <div class="home__map-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d759.5939908868198!2d49.8382821!3d40.4005213!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDDCsDI0JzAyLjAiTiA0OcKwNTAnMTkuNiJF!5e0!3m2!1saz!2saz!4v1776790468411!5m2!1saz!2saz"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!----contact data --->
                    <div class="home__map-contact">
                        <div class="home__map-contact-block">
                            <h3>{{ t('home.map_contacts_title') }}</h3>
                            <div>
                                <a target="_blank" href="https://maps.app.goo.gl/kFfzGhkpLvNVZ3Hc9">
                                    <i class="fa fa-map-marker"></i>
                                    <p>Həsən Əliyev küç</p>
                                </a>
                                <a href="#">
                                    <i class="fa fa-phone"></i>
                                    <p>+994 77 250 93 00</p>
                                </a>
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                    <p>info@pragmamedical.az</p>
                                </a>
                            </div>
                        </div>
                        <div class="home__map-contact-block">
                            <h3>{{ t('home.map_social_title') }}</h3>
                            <div>
                                <a target="_blank" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a target="_blank" href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a target="_blank" href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a target="_blank" href="#">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @section('scripts')
        <script src="/js/pages/home.js"></script>
    @endsection
@endsection
