@extends('layouts.app')

@section('content')
<div class="container pt-3">
    @if (session()->get('success'))
        <div class="container alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    @error('credentials')
    <div class="container alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @enderror

    <form action="/login" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
