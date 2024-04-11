@extends('layout.app')

@section('content')
    <div class="sub-section">
        <section id="home">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 content text-center">
                        <h1 class="display-4 text-light">Rent a van at affordable price!</h1>
                        <p class="lh-base">
                            Govans Rentals: Your hassle-free van rental solution. Explore our diverse fleet, competitive
                            prices, and flexible booking. Book now for reliable and affordable service!</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="container text-center mt-5 mb-5">
            <h1 class="display-3 fw-normal title mb-3">Why Us?</h1>
            <p>
                Choose Govans Rentals for your van rental needs and experience excellence. We provide hassle-free service, a
                diverse fleet of well-maintained vans, competitive pricing, and flexible booking options. Whether it's for a
                family trip or business outing, trust Govans Rentals for reliability and affordability. Book with us today
                and discover why we're the smart choice for van rentals.</p>
        </div>
        <div class="container-xl">
            <div class="container section-2">
                <div class="row justify-content-center align-items-center card-view ">
                    <div class="col-12 col-lg-3">
                        <div class="card shadow homecard">
                            <img src="{{ asset('assets/aurora.avif') }}" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title fw-bold">Explore Exciting Destinations</h4>
                                <p class="card-text">Discover new places and create lasting memories with our reliable van
                                    rentals. Whether you're planning a road trip or a weekend getaway, we have the perfect
                                    vehicle for your journey.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="card border-2 border-success shadow homecard">
                            <img src="{{ asset('assets/van3.avif') }}" alt="">

                            <div class="card-body">
                                <h4 class="card-title fw-bold">Rent a Spacious Van</h4>
                                <p class="card-text">Need a comfortable and spacious van for your next trip? Look no
                                    further! Our vans are equipped to accommodate your travel needs, providing ample space
                                    and modern amenities for a smooth ride.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card shadow homecard">
                            <img src="{{ asset('assets/booking.avif') }}" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title fw-bold">Convenient Booking</h4>
                                <p class="card-text">Booking with us is quick and hassle-free. Reserve your van rental in
                                    just a few clicks and get ready to hit the road. Enjoy flexible rental options and
                                    competitive rates tailored to fit your schedule and budget.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="sub-section2 mt-5">
        <div class="container flex-container">
            <img src="{{ asset('assets/nature.avif') }}" alt="" class="img-nature">
            <div>
                <h4 class="display-3 text-center">Travel to Baguio!</h4>
                <p class="text-center">Escape to the picturesque city of Baguio nestled in the mountains of the Philippines.
                    Immerse yourself in the cool breeze, lush greenery, and stunning landscapes. Baguio offers a perfect
                    getaway for nature lovers and adventure seekers alike.</p>
            </div>
        </div>
    </div>
@endsection
