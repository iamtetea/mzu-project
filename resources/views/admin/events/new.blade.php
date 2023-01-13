@extends('layouts.admin')
@section('title', 'Admin: New Category')

@section('breadcrumbs')
<div class="container pt-3">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/events">Events</a></li>
        <li class="breadcrumb-item active" aria-current="page">New</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
    <div class="container">
        <div class="text-bold mb-2">EVENT FORM</div>

        @if (session()->get('success'))
            <div class="mt-3 container alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <form action="/admin/events" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Select category</label>
                        <select name="category" class="form-select" aria-label="Select category">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="detailsInput" class="form-label">Details</label>
                        <textarea name="details" rows="5" class="form-control" id="detailsInput" aria-describedby="detailsHelp"></textarea>
                        @error('details')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="dateInput" class="form-label">Date of event</label>
                        <input name="date" type="date" class="form-control" id="dateInput" aria-describedby="dateHelp">
                        @error('date')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="priceInput" class="form-label">Price</label>
                        <input name="price" type="text" class="form-control" id="priceInput" aria-describedby="priceHelp">
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
