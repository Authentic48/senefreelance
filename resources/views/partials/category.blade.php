<main id="wt-main" class="wt-main wt-haslayout">
    <section class="wt-haslayout wt-main-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                    <div class="wt-sectionhead wt-textcenter">
                        <div class="wt-sectiontitle">
                            <h2>Explorez Categories</h2>
                            <span>Professionels par categories</span>
                        </div>
                    </div>
                </div>
                <div class="wt-categoryexpl">
                    @foreach ($categories as $category)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 float-left">
                        <div class="wt-categorycontent">
                            <div class="wt-cattitle">
                                <h3><a href="javascrip:void(0);">{{ $category->name }}</a></h3>
                            </div>
                            <div class="wt-categoryslidup">
                                <p>Retrouvez tous les professionels de cette categorie.</p>
                                <a href="{{ route('freelancers.category', $category->name) }}">Explorez<i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>