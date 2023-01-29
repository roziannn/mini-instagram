@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ '@' . $user->username }}</h3>
                    </div>

                    <div class="card-body">
                        <x-avatar :user="$user" />

                        <p>{{ $user->fullname }}</p>
                        <p>{{ $user->bio }}</p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::user()->id == $user->id)
                            <a href="/user/edit">Edit Profil</a>
                        @else
                                <a href="/follow/{{ $user->id }}">{{ (Auth::user()->following->contains($user->id)) ? 'unfollow' : 'follow' }}</a>
                            @endif

                            <br>

                            <h3>Feeds</h3>
                            @foreach ($user->posts as $post)
                                <li>
                                    <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->caption }}"
                                        width="200px" height="200px" />

                                    @if (Auth::user()->id == $user->id)
                                        <a href="/post/{{ $post->id }}/edit">Edit</a>
                                    @endif
                                </li>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
