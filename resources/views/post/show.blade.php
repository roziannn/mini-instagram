@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Show
                    </div>
                    <div class="card-body">

                        <x-post :post="$post" />
                        <hr>

                        <form method="POST" action="/comment/{{ $post->id }}">
                            @csrf
                            <x-textarea name="body" label="your commentar here" />
                            <x-submitbutton text="Post Comment" />
                        </form>

                        @foreach ($post->comments as $comment)
                            <p>{{ $comment->body }}
                                - <a href="/{{ '@' . $comment->user->username }}">{{ '@' . $comment->user->username }}</a>
                                @if (Auth::user()->id == $comment->user->id)
                                    - <a href="/comment/{{ $comment->id }}/edit">Edit Comment</a>
                                @endif
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/feed.js') }}"></script>
@endsection
