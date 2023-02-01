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

                            <div class="text-center my-2">
                                <img id="previewImg" src="" alt="" width="50%">
                            </div>
                            <x-fileupload name="image" />
                            <x-textarea name="caption" label="caption" />
                            <x-submitbutton text="Post" />

                            <script>
                                function preview() {
                                    document.getElementById('previewImg').src = URL.createObjectURL(event.target.files[0]);
                                }
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
