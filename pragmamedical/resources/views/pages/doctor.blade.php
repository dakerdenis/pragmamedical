@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="/css/pages/doctor.css">
@endsection
@section('content')
    <div class="doctor_info-wrapper">
        <div class="doctor_info-name">

        </div>
        <!-----doctor info content---->
        <div class="doctor_info-content">
            <!---content block----->
            <div class="doctor_info-block">
                <div class="doctor_info-image">
                    <!---<img src="" alt="">-->
                </div>
                <div class="doctor_info-desc">
                    <!------->
                    <div>
                        <span>Tərkibi:</span>
                        <p>Hər 10q-da: Allantoin...30mq, Nano ionizə gümüş...15mq, Hipoxlor...0,05mq, Pantenol...300mq,
                            Kolostrum Bovine…100mq, Sink oksid…40mq. Alantoin - hüceyrə bərpasını sürətləndirir, toxuma
                            regenerasiyasını dəstəkləyir.</p>
                    </div>
                    <!------->
                    <div>
                        <p>Zədələnmiş dəridə epitelizasiyanı gücləndirir, iltihabı azaldır, yara səthində yaranan
                            qıcıqlanmanı aradan qaldırır. Xüsusilə xroniki yaraların sağalmasını sürətləndirir və çapıq
                            toxumanın əmələ gəlməsini azaldır. Nano İonizə Gümüş - güclü antimikrob təsirə malikdir.
                            Bakteriya, göbələk və virusəleyhinə təsir göstərir. Gümüş ionları mikrob hüceyrə membranını
                            zədələyir və onların çoxalmasının qarşısını alır. İnfeksiyaların qarşısını alır, yara səthində
                            biofilm əmələ gəlməsinə mane olur. Hipoxlor turşusu - təbii immun cavabda iştirak edən güclü
                            antiseptikdir. </p>
                    </div>
                    <!------->
                    <div>
                        <p>Hüceyrə üçün toksik deyil, amma mikroorqanizmləri sürətlə məhv edir.Yarada patogen yükü azaldır,
                            infeksiyanı təmizləyir, iltihabı azaldır və sağalmanı dəstəkləyir. Pantenol (Provitamin B5) -
                            nəmləndirici, iltihabəleyhinə və regenerasiyaedici təsir göstərir. Dərinin elastikliyini artırır
                            və hüceyrələrin bölünməsini sürətləndirir. Yaranın daha sürətli bağlanmasına, qaşınmanın və
                            quruluğun azalmasına kömək edir.</p>
                    </div>
                    <!------->
                    <div>
                        <p>Kolostrum (Bovine – inək mənşəli) - zülallar, immunoqlobulinlər, böyümə faktorları və bioaktiv
                            maddələrlə zəngindir. İmmuniteti dəstəkləyir və toxuma regenerasiyasını stimullaşdırır.Yara
                            yerində immun cavabı gücləndirərək sağalmanı sürətləndirir. Sink Oksid - antiseptik və quruducu
                            xüsusiyyətlərə malikdir. Dəri baryerini gücləndirir və yeni toxumanın yaranmasını
                            dəstəkləyir.Yaranın infeksiyadan qorunmasına və epitelizasiyanın sürətlənməsinə yardım edir.
                        </p>
                    </div>

                    <!------->
                    <div>
                        <p>Ferita gel antiseptik, antimikrob, iltihabəleyhinə, immun dəstəkləyici tərkibi sayəsində
                            infeksiyanın qarşısını alır və regenerasiyanı sürətləndirir. Toksiki olmadan, hüceyrələrə zərər
                            vermədən, nəmləndirici və bərpaedici xüsusiyyətləri, yara sağalmasını sürətləndirir</p>
                    </div>

                    <!------->
                    <div>
                        <span>İstifadə qaydası:</span>
                        <p>Xaricə istifadə üçün: Gel gündə 2-3 dəfə lazımi nahiyəyə çəkilir. Üzərinə steril tənzif və ya
                            digər sarğı vasitələri qoyulur.</p>
                    </div>
                    <!------->
                    <div>
                        <span>Göstərişlər:</span>
                        <p>Kəskin və xroniki yaralar</p>
                        <p>Cərrahi yaralar (kəsik, tikiş yeri, əməliyyatdan sonrakı yaralar)</p>
                        <p>Yanıqlar (I–II dərəcəli)</p>
                        <p>Trofik yaralar və diabetik ayaq yaraları</p>
                        <p>Dekubit (təzyiq yaraları)</p>
                        <p>Dəri qıcıqlanmaları və səthi xəsarətlər</p>
                        <p>Ekzema və dermatitdə dəri baryerinin bərpası üçün köməkçi vasitə</p>
                    </div>
                </div>
            </div>


            <div class="doctor_info-block">

                <div class="doctor_info-desc">
                    <!------->
                    <div>
                        <span>Tərkibi:</span>
                        <p>Hər 10q-da: Allantoin...30mq, Nano ionizə gümüş...15mq, Hipoxlor...0,05mq, Pantenol...300mq,
                            Kolostrum Bovine…100mq, Sink oksid…40mq. Alantoin - hüceyrə bərpasını sürətləndirir, toxuma
                            regenerasiyasını dəstəkləyir.</p>
                    </div>
                    <!------->
                    <div>
                        <p>Zədələnmiş dəridə epitelizasiyanı gücləndirir, iltihabı azaldır, yara səthində yaranan
                            qıcıqlanmanı aradan qaldırır. Xüsusilə xroniki yaraların sağalmasını sürətləndirir və çapıq
                            toxumanın əmələ gəlməsini azaldır. Nano İonizə Gümüş - güclü antimikrob təsirə malikdir.
                            Bakteriya, göbələk və virusəleyhinə təsir göstərir. Gümüş ionları mikrob hüceyrə membranını
                            zədələyir və onların çoxalmasının qarşısını alır. İnfeksiyaların qarşısını alır, yara səthində
                            biofilm əmələ gəlməsinə mane olur. Hipoxlor turşusu - təbii immun cavabda iştirak edən güclü
                            antiseptikdir. </p>
                    </div>
                    <!------->
                    <div>
                        <p>Hüceyrə üçün toksik deyil, amma mikroorqanizmləri sürətlə məhv edir.Yarada patogen yükü azaldır,
                            infeksiyanı təmizləyir, iltihabı azaldır və sağalmanı dəstəkləyir. Pantenol (Provitamin B5) -
                            nəmləndirici, iltihabəleyhinə və regenerasiyaedici təsir göstərir. Dərinin elastikliyini artırır
                            və hüceyrələrin bölünməsini sürətləndirir. Yaranın daha sürətli bağlanmasına, qaşınmanın və
                            quruluğun azalmasına kömək edir.</p>
                    </div>
                    <!------->
                    <div>
                        <p>Kolostrum (Bovine – inək mənşəli) - zülallar, immunoqlobulinlər, böyümə faktorları və bioaktiv
                            maddələrlə zəngindir. İmmuniteti dəstəkləyir və toxuma regenerasiyasını stimullaşdırır.Yara
                            yerində immun cavabı gücləndirərək sağalmanı sürətləndirir. Sink Oksid - antiseptik və quruducu
                            xüsusiyyətlərə malikdir. Dəri baryerini gücləndirir və yeni toxumanın yaranmasını
                            dəstəkləyir.Yaranın infeksiyadan qorunmasına və epitelizasiyanın sürətlənməsinə yardım edir.
                        </p>
                    </div>

                    <!------->
                    <div>
                        <p>Ferita gel antiseptik, antimikrob, iltihabəleyhinə, immun dəstəkləyici tərkibi sayəsində
                            infeksiyanın qarşısını alır və regenerasiyanı sürətləndirir. Toksiki olmadan, hüceyrələrə zərər
                            vermədən, nəmləndirici və bərpaedici xüsusiyyətləri, yara sağalmasını sürətləndirir</p>
                    </div>

                    <!------->
                    <div>
                        <span>İstifadə qaydası:</span>
                        <p>Xaricə istifadə üçün: Gel gündə 2-3 dəfə lazımi nahiyəyə çəkilir. Üzərinə steril tənzif və ya
                            digər sarğı vasitələri qoyulur.</p>
                    </div>
                    <!------->
                    <div>
                        <span>Göstərişlər:</span>
                        <p>Kəskin və xroniki yaralar</p>
                        <p>Cərrahi yaralar (kəsik, tikiş yeri, əməliyyatdan sonrakı yaralar)</p>
                        <p>Yanıqlar (I–II dərəcəli)</p>
                        <p>Trofik yaralar və diabetik ayaq yaraları</p>
                        <p>Dekubit (təzyiq yaraları)</p>
                        <p>Dəri qıcıqlanmaları və səthi xəsarətlər</p>
                        <p>Ekzema və dermatitdə dəri baryerinin bərpası üçün köməkçi vasitə</p>
                    </div>
                </div>
                <div class="doctor_info-image">
                    <!---<img src="" alt="">-->
                </div>
            </div>
        </div>
    </div>
@endsection
