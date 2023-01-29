@extends('layouts.app')
<link rel="stylesheet" href="css/general.css">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <h3>Feeds @isset($querySearch)
                                "{{ $querySearch }}"
                            @endisset
                        </h3>
                        @forelse ($posts as $post)
                          <x-post :post="$post"/>
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
