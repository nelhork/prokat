<label for="{{$id}}" class="form-label">{{$title}}</label>
@if(!isset($tag))
    @php
        $tag = $tag ?? 'input';
    @endphp
@endif
@if($tag === 'input')
    <input
        name="{{$name}}"
        type="{{$type}}"
        class="form-control @error($name) is-invalid @enderror"
        id="{{$id}}"
        maxlength="255"
        @if ($type !== 'file')
            value="{{old($name, $value)}}"
        @endif
    >
@else
    <textarea
        name="{{$name}}"
        class="form-control @error($name) is-invalid @enderror"
        id="{{$id}}"
        maxlength="255"
    >
        {{ old($name, $value) }}
    </textarea>

@endif
@error($name)
<div class="invalid-feedback">{{ $message }}</div>
@enderror
