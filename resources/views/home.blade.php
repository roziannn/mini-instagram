@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <x-avatar :user="$user"/>
                    <h3>Hello, {{$user->username  }}</h3>
                    <p></p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/post/create">Upload</a>
                    <br>

                    {{ __('You are logged in!') }}

                    {{-- <h3>Feeds</h3>
                    @foreach ($user->posts as $post)
                        <li>
                            <img src="{{asset('images/posts/' . $post->image) }}" alt="{{ $post->caption }}"/>
                        </li>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
