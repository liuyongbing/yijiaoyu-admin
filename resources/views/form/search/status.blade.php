<label style="margin-left: {{ isset($style['left']) ? $style['left'] : '20' }}px">
    {{ trans('inputs.status') }}
    <select name="status" class="form-control" style="width: {{ isset($style['width']) ? $style['width'] : '150' }}px" >
        <option value="">请选择</option>
        <option value="1" @if($filters['status'] === '1') selected="selected" @endif>有效</option>
        <option value="0" @if($filters['status'] === '0') selected="selected" @endif>无效</option>
    </select>
</label>