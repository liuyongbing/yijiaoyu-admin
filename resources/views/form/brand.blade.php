<label class="col-md-2 control-label">{{ trans('inputs.brand') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[brand_id]" class="form-control" >
        <option value="">请选择</option>
        @foreach($brands as $brand)
        <option value="{{ $brand['id'] }}" @if(!empty($item['brand_id']) && $brand['id'] == $item['brand_id'])) selected="selected" @endif>{{ $brand['user_profile']['username'] }}</option>
        @endforeach
    </select>
</div>