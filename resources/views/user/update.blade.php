@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">User</div>
                        <div class="col-6 text-right"><a class="btn btn-success rounded-0" href="{{route('home')}}">BACK</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('updateUser', $data['user']->id)}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name: </label>
                                    <input type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $data['user']->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email: </label>
                                    <input type="text" class="form-control rounded-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $data['user']->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block rounded-0">UPDATE USER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
