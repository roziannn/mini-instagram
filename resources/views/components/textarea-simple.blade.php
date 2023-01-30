{{-- textarea for comment area post --}}
<div>
<textarea id="{{ $name }}" class="textarea form-control @error($name) is-invalid @enderror" name="{{ $name }}">
@isset($object->{$name})
{{ old($name) ? old($name) : $object->{$name} }}@else{{ old($name) }}
@endisset
</textarea>

        @if ($errors->has($name))
            <span class="invalid-feedback" role="alert">
                <strong> {{ $errors->first($name) }} </strong>
            </span>
        @endif
</div>
