<div class="row mb-3">
    <label for="{{ $name }}" class="col-md-4 col-form-label text-md-end">{{ $label }}</label>

    <div class="col-md-6">
        <input readonly id="{{ $name }}" type="{{ $type ?? 'text' }}"
            class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
            @isset($object->{$name}) value="{{ old($name) ? old($name) : $object->{$name} }}"
            @else value="{{ old($name) }}" @endisset
            required autocomplete="{{ $name }}" autofocus>


        @if ($errors->has($name))
            <span class="invalid-feedback" role="alert">
                <strong> {{ $errors->first($name) }} </strong>
            </span>
        @endif
    </div>
</div>