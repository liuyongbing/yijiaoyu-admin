<label class="col-md-2 control-label">{{ trans('inputs.address') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[address]" class="form-control" id="address" type="text" value="@if(null !== old('Record')['user_profile']['address']){{ old('Record')['user_profile']['address'] }}@else{{ isset($item['user_profile']['address']) ? $item['user_profile']['address'] : '' }}@endif">
</div>