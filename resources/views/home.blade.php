@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <h3>Feeds  @isset($querySearch) "{{ $querySearch }}" @endisset</h3>
                        @forelse ($posts as $post)
                            <div>
                                <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->caption }}"
                                    width="200px" height="200px" ondblclick="like({{ $post->id }})" />

                                <p>{{ $post->caption }}</p>
                                <a class="user-link" href="/{{ '@' . $post->user->username }}">{{ '@' . $post->user->username }}</a>

                                {{-- create dinamis id for button  --}}
                                <button class="btn btn-primary" onclick="like({{ $post->id }})"
                                    id="post-btn-{{ $post->id }}">
                                    {{ $post->is_liked() ? 'unlike' : 'like' }}</button>

                                <script>
                                    function like(id) {
                                        const el = document.getElementById('post-btn-' + id)
                                        fetch('/like/' + id)
                                            .then(response => response.json())
                                            .then(data => {
                                                el.innerText = (data.status == 'LIKE') ? 'unlike' : 'like'
                                            });
                                    }
                                </script>

                            </div>

                            @empty
                            <p> Tidak ditemukan.</p>
                        @endforelse
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
