<label style="margin-left: {{ isset($style['left']) ? $style['left'] : '20' }}px">
    {{ trans('inputs.username') }}
    <input type="text" name="name" class="form-control" type="text" value="{{ $filters['name'] }}" style="width: {{ isset($style['width']) ? $style['width'] : '150' }}px" />
</label>