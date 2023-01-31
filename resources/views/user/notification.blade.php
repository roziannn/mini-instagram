@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Notification</h3>
                    </div>

                    <div class="card-body text-center">
                        @foreach ($notifs as $notif)
                            <li>
                                <a href="/post/{{ $notif->post_id }}" class="{{ $notif->seen ? 'text-dark' : '' }}">
                                    {{ $notif->message }}
                                </a>
                            </li>
                        @endforeach
                    </div>

                    {{ $notifs->links() }}

                    <script>
                        //request ajax
                        //if all notification seens
                        fetch('/notification/seen')
                            .then(response => response.json())
                            .catch( error => console.log(error))
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
