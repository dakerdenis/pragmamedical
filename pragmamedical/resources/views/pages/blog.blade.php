@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="/css/pages/blog.css">
@endsection
@section('content')
    <div class="blog__wrapper">
        <div class="blog__name">
            <h3>Blog</h3>
        </div>

<div class="blog__content">

    @foreach($posts as $post)
        <a href="/{{ $lang }}/blog/{{ $post->id }}" class="blog__element">

            <div class="blog__content-image">
                @if($post->main_image)
                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="">
                @else
                    <img src="/images/blog_test.png" alt="">
                @endif
            </div>

            <div class="blog__content-content">
                <p>
                    {{ $post->published_date 
                        ? \Carbon\Carbon::parse($post->published_date)->format('d.m.y') 
                        : '' 
                    }}
                </p>

                <h3>
                    @if($lang === 'ru')
                        {{ $post->title_ru }}
                    @elseif($lang === 'en')
                        {{ $post->title_en }}
                    @else
                        {{ $post->title_az }}
                    @endif
                </h3>
            </div>

        </a>
    @endforeach

</div>
    </div>
@endsection
