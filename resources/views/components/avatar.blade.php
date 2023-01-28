@php
    // check if avatar has been added or no
    $avatar_url = ($user->avatar) 
        ? asset('/images/avatar/'. $user->avatar)
     : 'https://ui-avatars.com/api/?size=128&name=' . $user->username;
@endphp

<img src="{{ $avatar_url }}" class="rounded-circle" alt="foto profil {{ $user->username }}" width="128" height="128">
