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

                        <form method="POST" action="/post/{{ $post->id }}/comment">
                            @csrf
                            <x-textarea name="body" label="your commentar here" />
                            <x-submitbutton text="Post Comment" />
                        </form>

                        @foreach ($post->comments as $comment)
                            <p>{{ $comment->body }}
                                - <a href="/{{ '@' . $comment->user->username }}">{{ '@' . $comment->user->username }}</a>
                                @if (Auth::user()->id == $comment->user->id)
                                    - <a href="/comment/{{ $comment->id }}/edit">Edit Comment</a>
                                    - <a href="#" onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();">Delete</a>

            
                                    <form id="delete-form" action="/comment/{{ $comment->id }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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
