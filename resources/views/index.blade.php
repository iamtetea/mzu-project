@extends('layouts.app')

@section('content')
<div class="container pt-3">
    {{-- {{ $data }} --}}

    <div class="row g-3">
        @foreach ($data as $item)
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="card">
                <div class="card-header">
                  {{ $item->name }}
                </div>

                <div class="card-body">
                    <div class="card-text">
                        <div class="text-bold">DATE: {{ date('d/m/Y', strtotime($item->date)) }}</div>
                        <div class="card-text">{!! nl2br($item->details) !!}</div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner">
                            @foreach ($item->items as $ticket)
                            <div class="carousel-item active">
                              <img src="/assets/images/logo.png" alt="Logo" class="d-block w-100">
                              <div class="carousel-caption d-none d-md-block text-primary">
                                <h5>₹{{ $ticket->price }}</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                              </div>
                            </div>
                            @endforeach
                          {{-- <div class="carousel-item">
                            <img src="/assets/images/logo.png" alt="Logo" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Second slide label</h5>
                              <p>Some representative placeholder content for the second slide.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="/assets/images/logo.png" alt="Logo" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Third slide label</h5>
                              <p>Some representative placeholder content for the third slide.</p>
                            </div>
                          </div> --}}
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {!! $data->links() !!}
    </div>
</div>
@endsection
