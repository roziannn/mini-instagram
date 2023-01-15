@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Update Profile 
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/user/update">
                            @csrf

                            <x-input label="Username" name="username" :object="$user" />
                            <x-input label="Email" name="email" :object="$user" />
                            <x-input label="Bio" name="bio" :object="$user" />
                            <p>
                                todo :avatar
                            </p>
                            <x-submitbutton text="Update Profile" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
