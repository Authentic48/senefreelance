<div class="wt-haslayout wt-bannerholder">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <div class="wt-bannerimages">
                    <figure class="wt-bannermanimg" data-tilt>
                        <img src="images/bannerimg/hero.jpeg" alt="img description">
                        <img src="images/bannerimg/img-02.png" class="wt-bannermanimgone" alt="img description">
                        <img src="images/bannerimg/img-03.png" class="wt-bannermanimgtwo" alt="img description">
                    </figure>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                <div class="wt-bannercontent">
                    <div class="wt-bannerhead">
                        <div class="wt-title">
                            <h1><span>Retrouvez des Freelancers facilement, </span></h1>
                        </div>
                    </div>
                    <form class="wt-formtheme wt-formbanner" action="{{ route('search') }}" method="POST" id="search">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <input type="text" name="term" class="form-control @error('term') is-invalid @enderror"
                                    placeholder="Rechercher.....">
                                @error('term')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="wt-formoptions">
                                    <a href="#" class="wt-searchbtn" onclick="event.preventDefault();
                                    document.getElementById('search').submit();"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>