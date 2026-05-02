@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="/css/pages/rules.css">
@endsection
@section('content')
    <div class="rules__wrapper">
        <div class="rules__name">
            <h4>Yara Gigiyenası</h4>
        </div>
        <div class="rules__content">
            <div class="rules__image">
                <!--img src="/images/about.png" alt=""-->
            </div>

            <div class="rules__text">
                <p>Yara gigiyenası yaranın təmizlənməsi və dekontaminasiyası üçün nəzərdə tutulmuş anti-biofilm baxım
                    protokoludur və çox vaxt biofilmin olması səbəbindən sağalma maneələrini aradan qaldırır. Hər gün
                    əllərimizi yumaqla, dişlərimizi fırçalamaqla və duş qəbul etməklə əsas gigiyena qaydalarına riayət
                    etdiyimiz kimi, yaraları təmiz saxlamaq və biofilmi təmizləmək üçün onlara müntəzəm əsas gigiyena tətbiq
                    etməliyik. Yara Gigiyenasını tətbiq etməklə, hər bir yaraya ən yaxşı sağalma şansını verə bilərsiniz.
                </p>
            </div>
            <div class="rules__p">
                <span>Tərif:</span>
                <p>Yaranın səthindən və onun ətrafındakı dəridən səthi çirkləndiricilərin, boş zibillərin, çürüklərin,
                    yumşaldılmış nekrozun, mikrobların və/və ya əvvəlki sarğıların qalıqlarının aktiv şəkildə çıxarılması.
                </p>
            </div>

            <div class="rules__p">
                <span>Səbəb:</span>
                <p>Cansızlaşmış toxuma, zibil və biofilmi təmizləmək məqsədi ilə təmizləyin
                </p>
            </div>

            <div class="rules__p">
                <span>Tərif:</span>
                <p>Mexanik yardımlardan istifadə edərək biofilmin, cansız toxumanın, zibilin və üzvi maddələrin fiziki
                    olaraq çıxarılması.
                </p>
            </div>

            <div class="rules__p">
                <span>Səbəb:</span>
                <p>Dəqiq qanaxmaya nail olmayan debridment biofilmi fiziki olaraq çıxarmaya bilər. Tətbiq olunan mexaniki
                    qüvvə və kəsmə, maye səthi aktiv maddə və ya antimikrobiyal məhlul ilə birlikdə biofilmi parçalamaq və
                    pozmaq üçün lazımdır.
                </p>
            </div>
        </div>

        <!--Rules steps--->
        <div class="rules__steps">
            <div class="rules__steps-wrapper">
                <!---element 1---->
                <div class="rules__steps-block">
                    <div class="rules__steps-number">
                        1
                    </div>
                    <div class="rules__steps-content">
                        <div class="rules__steps-name">
                            Təmizləmə (Cleanse)
                        </div>
                        <div class="rules__steps-text">
                            <p><span>Tərif:</span> Yaranın səthindən və ətraf dərisindən səthi çirklənmələrin, boş qalıqların, nekrotik
                                toxumanın, mikrobların və/və ya əvvəlki sarğı qalıqlarının aktiv şəkildə uzaqlaşdırılması.
                            </p>
                            <p><span>Əsaslandırma:</span> Məqsəd ölü (həyat qabiliyyətini itirmiş) toxumanı, qalıqları və biofilmi aradan
                                qaldırmaqdır.</p>
                        </div>


                    </div>
                    <div class="rules__steps-image">
                        <img src="/images/rules-1.png" alt="">
                    </div>
                </div>

                <!---element 2---->
                <div class="rules__steps-block">
                    <div class="rules__steps-number">
                        2
                    </div>
                    <div class="rules__steps-content">
                        <div class="rules__steps-name">
                            Debridman (Debride)
                        </div>
                        <div class="rules__steps-text">
                            <p><span>Tərif:</span> Mexaniki vasitələrdən istifadə etməklə biofilmin, ölü toxumanın, qalıqların və üzvi
                                maddələrin fiziki şəkildə uzaqlaşdırılması.
                            </p>
                            <p><span>Əsaslandırma:</span> Nöqtəvi qanaxma ilə nəticələnməyən debridman biofilmi tam uzaqlaşdırmaya bilər.
                                Biofilmi parçalamaq üçün mexaniki təsir və sürtünmə, maye surfaktant və ya antimikrob
                                məhlulla birlikdə tətbiq edilməlidir.</p>
                        </div>


                    </div>
                    <div class="rules__steps-image">
                        <img src="/images/rules-2.png" alt="">
                    </div>
                </div>

                <!---element 3---->
                <div class="rules__steps-block">
                    <div class="rules__steps-number">
                        3
                    </div>
                    <div class="rules__steps-content">
                        <div class="rules__steps-name">
                            Kənarların formalaşdırılması (Refashion)
                        </div>
                        <div class="rules__steps-text">
                            <p><span>Tərif:</span> Sağlam dərinin formalaşmasını başlatmaq üçün böyümə faktorlarının ifrazını
                                stimullaşdırmaq məqsədilə yara kənarlarının aktivləşdirilməsi.
                            </p>
                            <p><span>Əsaslandırma:</span> Yara kənarlarında olan ölü toxuma, kallus, hiperkeratotik qalıqlar və yaşlanmış
                                hüceyrələr biofilmi daşıya bilər. Onların uzaqlaşdırılması epitelizasiyanı və yaranın
                                yığılmasını sürətləndirmək üçün vacibdir.</p>
                        </div>

                    </div>

                    <div class="rules__steps-image">
                        <img src="/images/rules-3.png" alt="">
                    </div>
                </div>

                <!---element 4---->
                <div class="rules__steps-block">
                    <div class="rules__steps-number">
                        4
                    </div>
                    <div class="rules__steps-content">
                        <div class="rules__steps-name">
                            Sarğı tətbiqi (Dress)
                        </div>
                        <div class="rules__steps-text">
                            <p><span>Tərif:</span> Sağlam dərinin formalaşmasını başlatmaq üçün böyümə faktorlarının ifrazını
                                stimullaşdırmaq məqsədilə yara kənarlarının aktivləşdirilməsi.
                            </p>
                            <p><span>Əsaslandırma:</span> Yara kənarlarında olan ölü toxuma, kallus, hiperkeratotik qalıqlar və yaşlanmış
                                hüceyrələr biofilmi daşıya bilər. Onların uzaqlaşdırılması epitelizasiyanı və yaranın
                                yığılmasını sürətləndirmək üçün vacibdir.</p>
                        </div>


                    </div>
                    <div class="rules__steps-image">
                        <img src="/images/rules-4.png" alt="">
                    </div>
                </div>

            </div>
        </div>


        <!-----Rulse documents---->
        <div class="rules__documents">
            <div class="rules__documents-wrapper">
                <div class="rules__documents-name">
                    <h3>Yara Gigiyena <span>Resursları</span></h3>
                </div>

                <div class="rules__documents-content">
                    <!----1 element--->
                    <div class="rules__documents-element">
                        <div class="rules__documents-image">
                            <img src="/images/rules-exm.png" alt="">
                        </div>
                        <div class="rules__documents-content-text">
                            <div class="rules__documents-element_name">
                                Erkən antibiofilm müdaxilə strategiyası ilə sağalması çətin yaraların qarşısını almaq.
                            </div>
                            <div class="rules__documents-desc">
                                <p>4 əsas anti-biofilm addımını müəyyən edən ilk yara gigiyenası konsensus sənədi.</p>
                            </div>
                        </div>
                        <div class="rules__documents-ling">
                            <a href="#">ƏTRAFLI MƏLUMAT</a>
                        </div>
                    </div>

                    <!----2 element--->
                    <div class="rules__documents-element">
                        <div class="rules__documents-image">
                            <img src="/images/rules-exm.png" alt="">
                        </div>
                        <div class="rules__documents-content-text">
                            <div class="rules__documents-element_name">
                                Ekspert rəyi məqaləsi.
                            </div>
                            <div class="rules__documents-desc">
                                <p>Yaranın sağalma yolu boyunca 4 addımı özündə birləşdirən ikinci Yara Gigiyenası konsensus
                                    sənədi.</p>
                            </div>
                        </div>
                        <div class="rules__documents-ling">
                            <a href="#">ƏTRAFLI MƏLUMAT</a>
                        </div>
                    </div>


                    <!----3 element--->
                    <div class="rules__documents-element">
                        <div class="rules__documents-image">
                            <img src="/images/rules-exm.png" alt="">
                        </div>
                        <div class="rules__documents-content-text">
                            <div class="rules__documents-element_name">
                                Qalib gəlmək və ya məğlub olmaq: Yara infeksiyasına qalib gəlməyin strategiyası.
                            </div>
                            <div class="rules__documents-desc">
                                <p>Antibiofilm strategiyasının erkən istifadəsi xəstənin müsbət nəticələrini artırır.</p>
                            </div>
                        </div>
                        <div class="rules__documents-ling">
                            <a href="#">ƏTRAFLI MƏLUMAT</a>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <!-------->
    </div>
@endsection
