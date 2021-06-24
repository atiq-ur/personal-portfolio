<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio Details - Atiqur Rahman</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    @include('frontend.partials.styles')
</head>

<body>

<main id="main">
    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper-container">
                            <div class="swiper-wrapper align-items-center">
                                @foreach($portfolio->portfolioImages as $port_img)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('backend/portfolio/images/'.$port_img->image) }}" alt="">
                                    </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Category</strong>: {{ $portfolio->categories->name }}</li>
                                <li><strong>Client</strong>: {{ $portfolio->client_name }}</li>
                                <li><strong>Project date</strong>: {{ \Carbon\Carbon::parse($portfolio->project_date)->format('d M Y') }}</li>
                                <li><strong>Project URL</strong>: <a href="{{ $portfolio->project_url }}" target="_blank">{{ $portfolio->project_url }}</a></li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>{{ $portfolio->project_title }}</h2>
                            <p>
                                {{ $portfolio->project_desc }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->
    </main>

</main><!-- End #main -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
@include('frontend.partials.scripts')

</body>

</html>

