@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="/css/pages/basic.css">
    <link rel="stylesheet" href="/css/pages/item.css">
    <link rel="stylesheet" href="/css/pages/responsive.css">
@endsection
@section('content')
        <!-- Main contaienr -->
        <main class="main">
            <div class="wrapper flex flex-column">
                <h2 class="page-title">Ferita - yara üçün gel 75qr</h2>
                <div class="grid product">
                    <!-- Left side -->
                    <aside class="left-side">
                        <div class="gallery">
                            <!-- Main -->
                            <a href="https://via.placeholder.com/800" data-fancybox="gallery" class="main-image">
                                <img src="https://via.placeholder.com/800" alt="main">
                            </a>
                            <!-- Thumbs -->
                            <div class="thumbs">
                                <a href="https://via.placeholder.com/800" data-fancybox="gallery">
                                    <img src="https://via.placeholder.com/200">
                                </a>
                                <a href="https://via.placeholder.com/800" data-fancybox="gallery">
                                    <img src="https://via.placeholder.com/200">
                                </a>
                                <a href="https://via.placeholder.com/800" data-fancybox="gallery">
                                    <img src="https://via.placeholder.com/200">
                                </a>
                                <a href="https://via.placeholder.com/800" data-fancybox="gallery">
                                    <img src="https://via.placeholder.com/200">
                                </a>
                            </div>
                        </div>
                    </aside>
                    <!-- Right side -->
                    <aside class="right-side">
                        <div class="content">
                            <h3 class="">Tərkibi:</h3>
                            <p class="text"> Hər 10q-da: Allantoin 30mq, Nano ionizə gümüş 15mq, Sink oksid 40mq. Hüceyrə bərpasını sürətləndirir və toxuma regenerasiyasını dəstəkləyir.</p>
                            <p class="text">Zədələnmiş dəridə epitelizasiyanı gücləndirir, iltihabı azaldır və sağalma prosesini sürətləndirir.</p>

                            <h3 class="">İstifadə qaydası:</h3>
                            <p class="text">Gel gündə 2-3 dəfə zədələnmiş nahiyəyə çəkilir.</p>

                            <h3 class="">Göstərişlər:</h3>
                            <ul class="">
                                <li>Kəskin və xroniki yaralar</li>
                                <li>Cərrahi yaralar</li>
                                <li>Yanıqlar</li>
                                <li>Travmatik zədələr</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </main>
@endsection