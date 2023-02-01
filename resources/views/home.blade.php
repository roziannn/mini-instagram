@extends('layouts.app')
<link rel="stylesheet" href="css/general.css">
@section('content')
    <div class="container" id="feedContainer">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Feed @isset($querySearch)
                            "{{ $querySearch }}"
                        @endisset
                    </div>

                    <div class="card-body">
                        @forelse ($posts as $post)
                            <x-post :post="$post" />
                            <input type="hidden" class="post-time" value="{{strtotime($post->created_at )}}">
                            <br>

                        @empty
                            <p> Tidak ditemukan.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/feed.js') }}"></script>
@endsection
