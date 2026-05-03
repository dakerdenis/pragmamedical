@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="/css/pages/home.css">
    <link rel="stylesheet" href="/css/pages/blog_item.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
@endsection

@section('content')
    @php
        $titleField = 'title_' . $lang;
        $descriptionField = 'description_' . $lang;

        $title = $post->$titleField ?? $post->title_az;
        $description = $post->$descriptionField ?? $post->description_az;

        $images = [];
        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $field) {
            if ($post->$field) {
                $images[] = $post->$field;
            }
        }
    @endphp

    <div class="blog__item-wrapper">
        <div class="blog__item-name">
            <h3>{{ $title }}</h3>
        </div>

        <div class="blog__item-date">
            {{ $post->published_date ? \Carbon\Carbon::parse($post->published_date)->format('d.m.Y') : '' }}
        </div>

        <div class="blog__item-image">
            @if ($post->main_image)
                <a href="{{ asset('storage/' . $post->main_image) }}" data-fancybox="blog-gallery"
                    data-caption="{{ $title }}">
                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="">
                </a>
            @else
                <img src="/images/blog_test2.png" alt="">
            @endif
        </div>

        <div class="blog__item-description">
            {!! nl2br(e($description)) !!}
        </div>

        <div class="blog__item-images">
            @foreach ($images as $image)
                <a href="{{ asset('storage/' . $image) }}" data-fancybox="blog-gallery" data-caption="{{ $title }}">
                    <img src="{{ asset('storage/' . $image) }}" alt="">
                </a>
            @endforeach
        </div>

        <div class="blog__item-share">
            <p>Share this in socila networks !</p>
            <div class="blog__item-icons">
                <a href="#">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="#">
                    <i class="fa fa-whatsapp"></i>
                </a>
                <a href="#">
                    <i class="fa fa-telegram"></i>
                </a>
                <a href="#">
                    <i class="fa fa-twitter"></i>
                </a>

                <a href="#">
                    <i class="fa fa-vk"></i>
                </a>
            </div>
        </div>
        <!---Contact--->
        <div class="home__contact">

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
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            animated: true,
            dragToClose: true,
            Thumbs: {
                autoStart: true
            },
            Toolbar: {
                display: ["close"]
            },
        });
    </script>
@endsection
