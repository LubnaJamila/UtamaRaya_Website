@extends('body')
@section('content')
     <!-- Breadcrumbs Start-->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 style="font-weight: 1000">About Us</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/" style="font-weight: 1000">Home</a></li>
                    <li style="font-weight: 1000">About Us</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- Breadcrumbs End  -->

    <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container py-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <img src="{{ asset('frontend/assets/img/bgabout.png') }}" class="img-fluid w-100 h-100" alt="">
                </div>
                <div class="col-lg-7"
                    style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                    <h5 class="section-about-title pe-3">About Us</h5>
                    <h1 class="mb-4">Welcome to <span class="text">Utama Raya</span></h1>
                    <p class="mb-4">Website Utama Raya menyediakan berbagai informasi menarik yang anda butuhkan
                        mulai
                        dari informasi mengenai akomodasi yang tersedai hingga penyewaan aula untuk
                        pernikahan anda!Berbagai informasi kami sediakan untuk anda didalam website ini,anda bisa
                        melihat
                        & memesan akomodasi yang tersedia pada tanggal yang anda inginkan!</p>

                    <p class="mb-4">Kami menawarkan berbagai pilihan akomodasi yang dirancang untuk memenuhi berbagai
                        kebutuhan dan preferensi, serta layanan penyewaan aula yang siap memberikan pengalaman pernikahan
                        yang tak terlupakan. Di Utama Raya, kami berkomitmen untuk memberikan layanan terbaik dan pengalaman
                        yang
                        menyenangkan bagi setiap pengunjung kami. Jangan ragu untuk menjelajahi situs kami dan temukan
                        segala informasi yang Anda butuhkan.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <div class="container-fluid about py-5">
        <div class="container py-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7"
                    style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                    <h5 class="section-about-title pe-3">Contact</h5>
                    <h1 class="mb-4">Informasi <span class="text">Tempat</span> Kami!</h1>
                    <p class="mb-4">Untuk pertanyaan lebih lanjut atau bantuan dalam merencanakan kunjungan atau acara
                        Anda, tim kami selalu siap membantu. Terima kasih telah mengunjungi Utama Raya, dan kami berharap
                        dapat menyambut Anda segera!</p>
                </div>
                <div class="col-lg-5">
                    <div class="map-responsive">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15814.579934177353!2d113.61208774405559!3d-7.721186226748587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd71cf57dcd5951%3A0x266f2acbc3002a59!2sPantai%20Utama%20Raya!5e0!3m2!1sid!2sid!4v1723134063068!5m2!1sid!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
