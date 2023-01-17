@extends('layouts.admin')
@section('title', 'Admin: Subscription Details')

@section('breadcrumbs')
<div class="container pt-3">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/subscriptions">Subscriptions</a></li>
        <li class="breadcrumb-item active" aria-current="page">New</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                SUBSCRIPTION FORM
            </div>

            <div class="card-body">
                @if (session()->get('success'))
                    <div class="container alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <form action="{{ '/admin/subscriptions/' . $data->id }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Name</label>
                                <input name="name" value="{{ $data->name }}" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp">
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="durationInput" class="form-label">DURATION</label>
                                <input name="duration" value="{{ $data->duration }}" type="number" class="form-control" id="durationInput" aria-describedby="durationHelp">
                                @error('duration')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="flexRadioDefault1" class="form-label">TYPE</label>
                                <div class="form-check">
                                    <input name="type" value="months" class="form-check-input" type="radio" id="flexRadioDefault1" {{ $data->type === 'months' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Months
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input name="type" value="years" class="form-check-input" type="radio" id="flexRadioDefault2" {{ $data->type === 'years' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Years
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="priceInput" class="form-label">Price</label>
                                <input name="price" value="{{ $data->price }}" type="number" step="0.01" class="form-control" id="priceInput" aria-describedby="priceHelp">
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
