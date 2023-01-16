@extends('layouts.admin')
@section('title', 'Admin: New Event')

@section('breadcrumbs')
<div class="container pt-3">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/events">Events</a></li>
        <li class="breadcrumb-item active" aria-current="page">Details</li>
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

              <form action="{{ '/admin/events/' . $data->id }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-6">
                          <div class="mb-2 text-bold text-center">Event Details:</div>

                          <div class="mb-3">
                              <label for="nameInput" class="form-label">Name</label>
                              <input name="name" value="{{ $data->name }}" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp">
                              @error('name')
                              <small class="text-danger">{{ $message }}</small>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <div class="row gx-3">
                                  <div class="col-xs-12 cl-sm-12 col-md-6">
                                      <label for="dateInput" class="form-label">Date of event</label>
                                      <input name="date" value="{{ $data->date }}" type="date" class="form-control" id="dateInput" aria-describedby="dateHelp">
                                      @error('date')
                                      <small class="text-danger">{{ $message }}</small>
                                      @enderror
                                  </div>

                                  <div class="col-xs-12 cl-sm-12 col-md-6">
                                      <label for="limitInput" class="form-label">Limit</label>
                                      <input name="limit" value="{{ $data->limit }}" type="number" class="form-control" id="limitInput" aria-describedby="limitHelp">
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
                                      <option value="{{ $item->id }}" {{ $data->category_id === $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="mb-3">
                              <label for="detailsInput" class="form-label">Details</label>
                              <textarea name="details" value="{{ old('details') }}" rows="5" class="form-control" id="detailsInput" aria-describedby="detailsHelp">{{ $data->details }}</textarea>
                              @error('details')
                              <small class="text-danger">{{ $message }}</small>
                              @enderror
                          </div>

                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>

                      <div class="col-xs-12 col-sm-12 col-md-6">
                          <div class="mb-2 text-bold text-center">Event Prices:</div>

                          <table class="table table-responsive">
                            <thead>
                              <tr>
                                <th scope="col">IMAGE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            @forelse ($data->items as $item)
                                <tbody>
                                    <tr>
                                        <td width="40%">
                                            <img width="20%" src="{{ url('storage/' . $item->image_path) }}" alt="event">
                                        </td>

                                        <td width="40%">₹{{ $item->price }}</td>

                                        <td align="right" width="20%">
                                            <a href="{{ '/admin/event-items/' . $item->id }}" class="d-inline">
                                                <button data-toggle="tooltip" title='View details' class="btn btn-info"><i class="fa fa-edit"></i></button>
                                            </a>

                                            <form action="{{ '/admin/events-items/' . $item->id }}" method="POST" class="d-inline">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button data-toggle="tooltip" title='Delete' class="btn btn-danger show-confirm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <td colspan="6">
                                            <div class="mt-3 alert alert-dark text-center" role="alert">
                                                <div class="mb-4"><i class="no-data-icon fa fa-database"></i></div>
                                                There are no prices for this event!
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforelse
                        </table>
                      </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
@endsection
