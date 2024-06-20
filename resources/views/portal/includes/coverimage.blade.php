{{-- For Cover News and Head News --}}

<section class="cover">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($coverimages as $key => $coverimage)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                            class="" aria-label="Slide {{ $key + 1 }}"></button>
                        @endforeach
                    </div>

                    <div class="carousel-inner">

                        {{-- <div class="carousel-item active">

                            <img src="{{ asset('img/coverimage.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">

                                <h5> पद भार ग्रहण गर्नु हुँदै </h5>

                            </div>
                        </div> --}}
                        @foreach ($coverimages as $key => $coverimage)
                        <div class="carousel-item">
                            <a href="">
                                <img src="{{ asset('uploads/coverimage/' . $coverimage->image) }}" class="d-block w-100" alt="...">
                                <div class="post_description">
                                    <h5>{{ $coverimage->title }}</h5>
                                </div>
                            </a>
                        </div>
                        @endforeach
 

                    </div>


                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>

            </div>


            <div class="col-md-4">
                @foreach($teams as $team)
                <div class="right_intro card card_one">


                    <div class="card-head">
                        <h5 class="card-title">{{ __($team->role) }}</h5>
                    </div>
                    <div class="row ">
                        <div class="col-md-5  col-5 col-sm-5">

                            <img src="{{ asset('uploads/team/' . $team->image) }}" alt="Team Image">
                        </div>
                        <div class="col-md-7  col-7 col-sm-7">
                            <p class="pp_desc"><span class="bold_name">{{ __($team->name) }}</span><br>
                                <span class="pposition">{{ __($team->position) }}<br>
                                {{ __($team->contact_number) }}<br></span>

                                <!-- वरिष्ठ जलाधार व्यवस्थापन अधिकृत<br> -->

                                <span class="eng">{{ $team->email }}</span>
                            </span>
                        </div>
                    </div>

                </div>
                @endforeach

                {{-- <div class="right_intro card card_one">

                    <div class="card-head">
                        <h5 class="card-title">Testing</h5>
                    </div>
                    <div class="row pp_desc">
                        <div class="col-md-5  col-5 col-sm-5">

                            <img src="{{ asset('img/logo.png') }}" alt="Team Image">
                        </div>
                        <div class="col-md-7  col-7 col-sm-7">
                            <p><span class="bold_name">Bibek Guragain</span><br>
                                Managing Director <br>
                                9861331656<br>

                                <!-- वरिष्ठ जलाधार व्यवस्थापन अधिकृत<br> -->

                                <span class="eng">finchbibek@outlook.com</span>
                            </p>
                        </div>
                    </div>

                </div> --}}



            </div>
        </div>
    </div>



</section>
<script>

    document.addEventListener("DOMContentLoaded", function() {
        var carouselIndicators = document.querySelectorAll("#carouselExampleIndicators .carousel-indicators button");
        var carouselItems = document.querySelectorAll("#carouselExampleIndicators .carousel-inner .carousel-item");

        carouselIndicators[0].classList.add("active");
        carouselItems[0].classList.add("active");
    });

</script>
