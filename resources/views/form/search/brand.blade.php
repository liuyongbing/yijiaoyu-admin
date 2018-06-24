<label style="margin-left: {{ isset($style['left']) ? $style['left'] : '20' }}px">
    {{ trans('inputs.brand') }}
    <select name="brand_id" class="form-control" style="width: {{ isset($style['width']) ? $style['width'] : '150' }}px" >
        <option value="">请选择</option>
        @foreach($brands as $key => $brand)
        <option value="{{ $key }}" @if($key == (int)$filters['brand_id']) selected="selected" @endif>{{ $brand }}</option>
        @endforeach
    </select>
</label>