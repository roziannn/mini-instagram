@extends('layouts.app')
<link rel="stylesheet" href="css/general.css">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">

                        <x-post :post="$post" isShow="true" />
                        <hr>

                        <form method="POST" action="/post/{{ $post->id }}/comment">
                            @csrf
                            <x-textarea-simple name="body" />
                            <x-submitbutton text="Post Comment" />
                        </form>

                        @foreach ($post->comments as $comment)
                            <p class="mb-0">
                                <x-avatar :user="$post->user" size="32" />
                                <a class="user-link" href="/{{ '@' . $comment->user->username }}">{{ '@' . $comment->user->username }}</a>  {{ $comment->body }}
                            </p>
                       

                            {{-- show count likes --}}
                            <span id="comment-likescount-{{ $comment->id }}">
                                {{ $comment->likes_count }}
                            </span>

                            {{-- btn like comment --}}
                            <a onclick="like({{ $comment->id }}, 'COMMENT')" id="comment-btn-{{ $comment->id }}">
                                {{ $comment->is_liked() ? 'unlike' : 'like' }}
                            </a>

                            @if (Auth::user()->id == $comment->user->id)
                            - <a class="user-link text-dark" href="/comment/{{ $comment->id }}/edit">Edit</a>
                            - <a class="user-link text-dark" href="#"
                                onclick="event.preventDefault();
                                    document.getElementById('delete-form').submit();">Delete</a>

                            <form id="delete-form" action="/comment/{{ $comment->id }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/feed.js') }}"></script>
@endsection
