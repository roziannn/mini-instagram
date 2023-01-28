<div class="row mb-3">
    <label for="{{ $name }}" class="col-md-4 col-form-label text-md-end">{{ $label }}</label>

    <div class="col-md-6">
        <textarea id="{{ $name }}" type="{{ $type ?? 'text' }}"
            class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
            required autocomplete="{{ $name }}" autofocus>@isset($object->{$name}){{ old($name) ? old($name) : $object->{$name} }}
            @else{{ old($name) }} @endisset
        </textarea>


        @if ($errors->has($name))
            <span class="invalid-feedback" role="alert">
                <strong> {{ $errors->first($name) }} </strong>
            </span>
        @endif
    </div>
</div>
