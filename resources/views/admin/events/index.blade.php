@extends('layouts.admin')
@section('title', 'Admin: Events')

@section('breadcrumbs')
<div class="container pt-3">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Events</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header pt-4">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <form action="{{ '/admin/events/search' }}" method="GET">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-search"><i class="fa fa-search"></i></span>
                                <input name="search" value="{{ old('search') }}" type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-search">
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <a href="/admin/events/new">
                            <button type="button" class="mb-2 btn btn-success float-right" data-bs-toggle="modal" data-bs-target="#subscriptionAddModal">
                                <i class="fa fa-plus"></i>
                                Add
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th scope="col">CODE</th>
                        <th scope="col">NAME</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">EVENT DATE</th>
                        <th scope="col">CREATED AT</th>
                        <th scope="col">UPDATED AT</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    @forelse ($data as $item)
                        <tbody>
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                <td>{{ date('d-m-Y h:i a', strtotime($item->created_at)) }}</td>
                                <td>{{ date('d-m-Y h:i a', strtotime($item->updated_at)) }}</td>

                                <td align="right">
                                    <a href="{{ '/admin/events/' . $item->id }}" class="d-inline">
                                        <button data-toggle="tooltip" title='View details' class="btn btn-info"><i class="fa fa-edit"></i></button>
                                    </a>

                                    <form action="{{ '/admin/events/' . $item->id }}" method="POST" class="d-inline">
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
                                        There are no events data to display right now!
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforelse
                </table>

                {!! $data->links() !!}
            </div>
        </div>
    </div>
@endsection
