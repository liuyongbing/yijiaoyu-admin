<label class="col-md-2 control-label">{{ trans('inputs.position') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[position_id]" class="form-control" >
        <option value="">请选择</option>
        @foreach($positions as $key => $position)
        <option value="{{ $position['id'] }}" @if(!empty($item['position_id']) && $position['id'] == $item['position_id'])) selected="selected" @endif>{{ $position['position_name'] }}</option>
        @endforeach
    </select>
</div>