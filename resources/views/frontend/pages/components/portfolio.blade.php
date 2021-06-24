<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Portfolio</h2>
            <p>
                To reach the success working hard is main role. I have been working on Laravel web app development over 2 years.
                I have a higher interest on machine learning approaches and developed a several projects on that.
                My portfolio shows some of my works i have done yet.
            </p>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach(\App\Models\Category::orderBy('name', 'asc')->get() as $cat)
                        <li data-filter=".filter-{{ $cat->name }}">{{ $cat->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach(\App\Models\Portfolio::with('categories', 'portfolioImages')->get() as $port)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $port->categories->name }}">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('backend/portfolio/images/'.$port->portfolioImages->first()->image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{ $port->project_title }}</h4>
                            <p>{{ $port->project_desc }}</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('backend/portfolio/images/'.$port->portfolioImages->first()->image) }}"
                                   data-gallery="portfolioGallery" class="portfolio-lightbox"
                                   title="{{ $port->project_title }}"><i class="bx bx-plus"></i></a>
                                <a href="{{ route('portfolio.details', $port->id) }}" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
