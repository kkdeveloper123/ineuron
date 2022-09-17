<select>
    @foreach(STATUS as $key => $value)
    <option value="{{$key}}">{{ $value["KEY"] }}</option>
    @endforeach
</select>