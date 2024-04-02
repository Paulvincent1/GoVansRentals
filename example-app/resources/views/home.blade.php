@extends('layout.app')

@section('content')
    <div class="sub-section">
        <section id="home">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 content text-center">
                        <h1 class="display-4 text-light">Rent a van at affordable price!</h1>
                        <p class="lh-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae reprehenderit ea
                            quasi
                            ad iure
                            laudantium. A eos necessitatibus tempora animi ipsa omnis architecto? Enim fugit soluta cum
                            corporis, possimus ut!</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="container text-center mt-5 mb-5">
            <h1 class="display-3 fw-normal title mb-3">Why Us?</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus voluptas fugiat asperiores! Eligendi
                eius neque impedit velit est perferendis, dolorem itaque labore distinctio quod at excepturi, quo sit
                ratione aliquid?</p>
        </div>
        <div class="container-xl">
            <div class="container section-2">
                <div class="row justify-content-center align-items-center card-view ">
                    <div class="col-12 col-lg-3">
                        <div class="card shadow homecard">
                            <img src="{{ asset('assets/van7.jpeg') }}" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">lorem</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. At repellendus
                                    vitae quas suscipit impedit sint, qui, officiis ut sequi velit officia veniam veritatis
                                    dignissimos fugiat asperiores? Perspiciatis eos quisquam deserunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="card border-2 border-success shadow homecard">
                            <div class="card-header text-center">Rent a van</div>
                            <img src="{{ asset('assets/van3.avif') }}" alt="">

                            <div class="card-body">
                                <h4 class="card-title">lorem</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. At repellendus
                                    vitae quas suscipit impedit sint, qui, officiis ut sequi velit officia veniam veritatis
                                    dignissimos fugiat asperiores? Perspiciatis eos quisquam deserunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card shadow homecard">
                            <img src="{{ asset('assets/van6.jpeg') }}" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">lorem</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. At repellendus
                                    vitae quas suscipit impedit sint, qui, officiis ut sequi velit officia veniam veritatis
                                    dignissimos fugiat asperiores? Perspiciatis eos quisquam deserunt.</p>
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
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, cupiditate iste
                    adipisci
                    quam fugiat magnam iusto totam ipsa cum pariatur accusantium incidunt ullam laudantium eveniet aperiam
                    quaerat ex tempore molestias.</p>
            </div>
        </div>
    </div>
@endsection
