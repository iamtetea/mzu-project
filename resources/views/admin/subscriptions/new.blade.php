@extends('layouts.admin')
@section('title', 'Admin: New Subscription')

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
        <div class="text-bold mb-2">SUBSCRIPTION FORM</div>

        @if (session()->get('success'))
            <div class="mt-3 container alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <form action="/admin/subscriptions" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="durationInput" class="form-label">DURATION</label>
                        <input name="duration" type="number" class="form-control" id="durationInput" aria-describedby="durationHelp">
                        @error('duration')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="durationInput" class="form-label">TYPE</label>
                        <div class="form-check">
                            <input name="type" value="months" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Months
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="type" value="years" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Years
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="priceInput" class="form-label">Price</label>
                        <input name="price" type="number" step="0.01" class="form-control" id="priceInput" aria-describedby="priceHelp">
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
@endsection
