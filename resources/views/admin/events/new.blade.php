@extends('layouts.admin')
@section('title', 'Admin: New Event')

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
        <div class="card">
            <div class="card-header">
              EVENT FORM
            </div>

            <div class="card-body">
                @if (session()->get('success'))
                    <div class="container alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <form action="/admin/events" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="mb-2 text-bold text-center">Event Details:</div>

                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Name</label>
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp">
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="row gx-3">
                                    <div class="col-xs-12 cl-sm-12 col-md-6">
                                        <label for="dateInput" class="form-label">Date of event</label>
                                        <input name="date" value="{{ old('date') }}" type="date" class="form-control" id="dateInput" aria-describedby="dateHelp">
                                        @error('date')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-xs-12 cl-sm-12 col-md-6">
                                        <label for="limitInput" class="form-label">Limit</label>
                                        <input name="limit" value="{{ old('limit') }}" type="number" class="form-control" id="limitInput" aria-describedby="limitHelp">
                                        @error('limit')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="categoryInput" class="form-label">Select category</label>
                                <select name="category" class="form-select" aria-label="Select category" id="categoryInput" value="{{ old('category') }}">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="detailsInput" class="form-label">Details</label>
                                <textarea name="details" value="{{ old('details') }}" rows="5" class="form-control" id="detailsInput" aria-describedby="detailsHelp"></textarea>
                                @error('details')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="mb-2 text-bold text-center">Event Prices:</div>

                            <div>
                                <table class="table table-responsive" id="eventPrices">
                                    <thead>
                                        <tr>
                                            <td scope="col">Price</td>
                                            <td scope="col">Image</td>
                                            <td scope="col"></td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><input required type="number" step="0.01" name="items[0][price]" class="form-control" /></td>
                                            <td><input required type="file" name="items[0][image]" class="form-control" /></td>
                                            <td align="right" class="d-inline-flex">
                                                <button type="button" name="add" id="addItem" style="margin-right: 10px" class="btn btn-outline-success"><i class="fa fa-plus"></i></button>
                                                <button type="button" disabled class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent

    <script type="text/javascript">
        $(document).ready(async function() {
            var  i = 0;

            $("#addItem").click(function () {
                ++i;
                $("#eventPrices").append('<tr><td><input required type="number" step="0.01" name="items[' + i + '][price]" class="form-control" /></td><td><input required type="file" name="items[' + i + '][image]" class="form-control" /></td><td align="right" class="d-inline-flex"><button type="button" style="margin-right: 10px" class="btn btn-outline-success add-input-field"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fa fa-trash"></i></button></td></tr>');
            });

            $(document).on('click', '.remove-input-field', function () {
                $(this).parents('tr').remove();
            });

            $(document).on('click', '.add-input-field', function () {
                ++i;
                $("#eventPrices").append('<tr><td><input required type="number" step="0.01" name="items[' + i + '][price]" class="form-control" /></td><td><input required type="file" name="items[' + i + '][image]" class="form-control" /></td><td align="right" class="d-inline-flex"><button type="button" style="margin-right: 10px" class="btn btn-outline-success add-input-field"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fa fa-trash"></i></button></td></tr>');
            });
        })
    </script>
@endsection
