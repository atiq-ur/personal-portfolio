@extends('frontend.layouts.master')

@section('page-content')
    <!-- ======= Hero Section ======= -->
    @include('frontend.pages.components.hero')
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        @include('frontend.pages.components.about')
        <!-- End About Section -->

        <!-- ======= Facts Section ======= -->
        @include('frontend.pages.components.facts')
        <!-- End Facts Section -->

        <!-- ======= Skills Section ======= -->
        @include('frontend.pages.components.skills')

        <!-- End Skills Section -->

        <!-- ======= Resume Section ======= -->
        @include('frontend.pages.components.resume')
        <!-- End Resume Section -->

        <!-- ======= Portfolio Section ======= -->
        @include('frontend.pages.components.portfolio')
        <!-- End Portfolio Section -->

        <!-- ======= Services Section ======= -->
        @include('frontend.pages.components.services')
        <!-- End Services Section -->

        <!-- ======= Testimonials Section ======= -->
        @include('frontend.pages.components.testimonials')
        <!-- End Testimonials Section -->

        <!-- ======= Contact Section ======= -->
        @include('frontend.pages.components.contact')
        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
