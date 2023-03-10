@php
    $type = empty($type) ? '' : $type;
    $old_value = empty($old_value) ? '' : $old_value;
    $array = empty($array) ? '' : $array;
@endphp

<div class="form-group mb-3">
    <label for="{{$input_name}}">{{$label}}</label>

    @if($type === 'textarea')
        <textarea name="{{$input_name}}" class="form-control" @error($input_name) is-invalid @enderror>{{old($input_name, $old_value)}}</textarea>

    @elseif($type === 'select')
        <select name="{{$input_name}}" class="form-select" @error($input_name) is-invalid @enderror>
            <option></option>
            @foreach ($array as $var)
                <option value="{{$var->id}}" {{$var->id === old($input_name, $old_value) ? 'selected' : ''}}>
                    {{$var->name}}
                </option>
            @endforeach
        </select>

    @elseif($type === 'checkbox')
        @foreach ($array as $var)
            <div class="form-check" @error($input_name) is-invalid @enderror>
                <input type="checkbox" @error($input_name) is-invalid @enderror
                id="techCheck_{{$loop->index}}" value="{{$var->id}}" name="{{$input_name}}[]"
                @if(Route::is('admin.projects.create'))
                    {{in_array($var->id, old($input_name, [])) ? 'checked' : ''}}
                @elseif(Route::is('admin.projects.edit'))
                    {{$old_value->contains('id', $var->id) ? 'checked' : ''}}>
                @endif
                <label class="form-check-label" for="techCheck_{{$loop->index}}">{{$var->name}}</label>
            </div>
        @endforeach

    @else
        <input type="{{$type}}" class="form-control" name="{{$input_name}}" value="{{old($input_name, $old_value)}}" @error($input_name) is-invalid @enderror>
    @endif
    
    @error($input_name)
        <div class="invalid-feedback d-block">
            {{$message}}
        </div>
    @enderror
</div>