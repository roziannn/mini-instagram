@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ '@' . $user->username }}</h3>
                    </div>

                    <div class="card-body text-center">
                        <x-avatar :user="$user" />

                        <p class="mb-0">{{ $user->fullname }}</p>
                        <p class="mb-0">{{ $user->bio }}</p>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::user()->id == $user->id)
                            <a class="btn btn-primary" href="/user/edit">Edit Profil</a>
                        @else
                            <button class="btn btn-primary" onclick="follow({{ $user->id }}, this)">
                                {{ Auth::user()->following->contains($user->id) ? 'unfollow' : 'follow' }}</button>
                        @endif

                        <script>
                            function follow(id, el) {
                                fetch('/follow/' + id)
                                        .then(response => response.json())
                                        .then(data => {
                                            el.innerText = (data.status == 'FOLLOW') ? 'unfollow' : 'follow'
                                        });
                            }
                        </script>

                        <br><br>

                        <h3>Feeds</h3>
                        @foreach ($user->posts as $post)
                            <div>
                                <a href="/post/{{ $post->id }}">
                                <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->caption }}"
                                    width="100%" height="auto" />
                                </a>
                                <br>
                                @if (Auth::user()->id == $user->id)
                                    <a class="text-dark" href="/post/{{ $post->id }}/edit">Edit</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
