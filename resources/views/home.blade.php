@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h3>Feeds</h3>
                    @foreach ($posts as $post)
                        <div>
                            <img src="{{asset('images/posts/' . $post->image) }}" alt="{{ $post->caption }}" width="200px"
                            height="200px"/>
                            <a class="user-link" href="/{{'@'.$post->user->username }}">{{'@'.$post->user->username }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .user-link {
        text-decoration: none;
    }
</style>