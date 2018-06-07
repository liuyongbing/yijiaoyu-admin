<label class="col-md-2 control-label">{{ trans('inputs.brand') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[brand_id]" class="form-control" >
        <option value="">请选择</option>
        @foreach($brands as $key => $brand)
        <option value="{{ $key }}" @if(!empty($item['brand_id']) && $key == $item['brand_id'])) selected="selected" @endif>{{ $brand }}</option>
        @endforeach
    </select>
</div>