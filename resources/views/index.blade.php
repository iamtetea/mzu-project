@extends('layouts.app')

@section('content')
<div class="container pt-3">
    {{-- {{ $data }} --}}

    @if (session()->get('success'))
        <div class="container alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    @if (session()->get('error'))
        <div class="container alert alert-danger" role="alert">
            {{ session()->get('error') }}
        </div>
    @endif

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

                <div class="pb-3 px-3">
                    <div class="list-group">
                        @foreach ($item->items as $ticket)
                            <form action="/payment" method="post">
                                @csrf
                                <input hidden value="{{ $ticket->id }}" name="ticket" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ env('RZP_TEST_API_KEY') }}"
                                    data-amount="{{ $ticket->price * 100 }}"
                                    data-buttontext="PAY ₹{{ $ticket->price }}"
                                    data-name="EVENT"
                                    data-description="Event booking"
                                    data-image="https://www.adobe.com/express/create/media_127a4cd0c28c2753638768caf8967503d38d01e4c.jpeg?width=400&format=jpeg&optimize=medium"
                                    data-prefill.name="Test"
                                    data-prefill.email="test@example.com"
                                    data-theme.color="#ff7529">
                                </script>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {!! $data->links() !!}
    </div>
</div>
@endsection
