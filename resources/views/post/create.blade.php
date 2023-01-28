@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Update Foto
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/post" enctype="multipart/form-data">
                            @csrf

                          <x-fileupload name="image"/>

                            <x-textarea name="caption" label="caption" />
                            <x-submitbutton text="Post" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
