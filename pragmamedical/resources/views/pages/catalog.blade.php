@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="/css/pages/catalog.css">
@endsection
@section('content')
    <div class="catalog__wrapper">
        <div class="catalog__name">
            <h3>{{ t('home.products_title') }}</h3>
        </div>
        <div class="catalog__container">

            @forelse ($products as $product)
                <div class="catalog__element">
                    <div class="catalog__element-block">
                        <div class="catalog__element__content">
                            <div class="catalog__element-link">
                                <a href="/{{ $lang }}/catalog/{{ $product->id }}">{{ t('home.catalog_link') }}</a>
                            </div>
                            <div class="catalog__element-text">
                                <div class="catalog__element-name">
                                    <h3>{{ $product->{'title_' . $lang} ?? $product->title_az }}</h3>
                                </div>
                                <div class="catalog__element-desc">
                                    <p>{{ Str::limit($product->{'description_' . $lang} ?? $product->description_az, 150) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="catalog__element-image">
                            @if($product->main_image)
                                <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->{'title_' . $lang} }}">
                            @else
                                <img src="/images/catalog1.png" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p style="color:#94a3b8; padding:60px 0; text-align:center; width:100%;">
                    Hələ heç bir məhsul yoxdur
                </p>
            @endforelse

        </div>
    </div>
@endsection