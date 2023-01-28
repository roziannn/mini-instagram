@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Update Profile <strong>{{ $user->username }} </strong>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/user/edit" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <x-input label="Username" name="username" :object="$user" />
                            <x-input label="Full Name" name="fullname" :object="$user" />
                            <x-inputreadonly label="Email" name="email" :object="$user" />
                            <x-textarea label="Bio" name="bio" :object="$user" />
                            <div class="row mb-3">
                                <label for="avatar"
                                    class="col-md-4 col-form-label text-md-end">Avatar</label>
                                <div class="col-md-6">
                                    <input type="file" name="avatar" id="avatar"/>
                                </div>
                                @if ($errors->has('avatar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('avatar') }} </strong>
                                </span>
                            @endif
                            </div>
                                <x-submitbutton text="Update Profile" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
