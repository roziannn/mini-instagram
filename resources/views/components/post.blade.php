<div>
    <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->caption }}"
        width="200px" height="200px" ondblclick="like({{ $post->id }})" />

    <p class="captions">{{ $post->caption }}</p>
    <a class="user-link"
        href="/{{ '@' . $post->user->username }}">{{ '@' . $post->user->username }}</a>

    {{-- create dinamis id for button  --}}
    <button class="btn btn-primary" onclick="like({{ $post->id }})"
        id="post-btn-{{ $post->id }}">
        {{ $post->is_liked() ? 'unlike' : 'like' }}</button>

    <a class="btn btn-primary" href="/post/{{ $post->id }}">Komentar</a>
</div>