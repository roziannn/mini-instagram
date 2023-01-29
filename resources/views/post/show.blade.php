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

                        <form method="POST" action="/post/{{ $post->id }}">
                            @csrf
                            @method('PUT')
                            <x-textarea name="caption" label="caption" :object="$post" />
                            <x-submitbutton text="Update Post" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/feed.js') }}"></script>
@endsection
