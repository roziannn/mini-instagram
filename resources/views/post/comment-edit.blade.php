@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Edit Comment
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/comment/{{ $comment->id }}">
                            @csrf
                            @method('PUT')
                          
                            <x-textarea name="body" label="caption" :object="$comment"/>
                            <x-submitbutton text="Update Comment" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
