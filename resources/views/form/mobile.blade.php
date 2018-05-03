<label class="col-md-2 control-label">{{ trans('inputs.mobile') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[mobile]" class="form-control" id="mobile" type="text" value="@if(null !== old('Record')['user_profile']['mobile']){{ old('Record')['user_profile']['mobile'] }}@else{{ isset($item['user_profile']['mobile']) ? $item['user_profile']['mobile'] : '' }}@endif">
</div>