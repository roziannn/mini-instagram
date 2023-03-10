<div>
    <p class="mb-2">
        <x-avatar :user="$post->user" size="32" />
        <a class="user-link" href="/{{ '@' . $post->user->username }}">{{ '@' . $post->user->username }}</a>
    </p>
    <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->caption }}" width="100%" height="auto"
        ondblclick="like({{ $post->id }})" />

    <p class="mb-0">
        <span class="captions">{{ $post->caption }}</span>
    </p>

    <p>
        <small>
            {{ $post->created_at->diffForHumans() }}
        </small>
    </p>

    {{-- show count likes --}}
    <span id="post-likescount-{{ $post->id }}">
        {{ $post->likes_count }}
    </span>

    {{-- create dinamis id for button  --}}
    <a class="text-dark" onclick="like({{ $post->id }})" id="post-btn-{{ $post->id }}">
        {{ $post->is_liked() ? 'unlike' : 'like' }}
    </a> -

    @isset($isShow)
    @else
        <a class="text-dark" href="/post/{{ $post->id }}">Komentar</a>
    @endisset
</div>
