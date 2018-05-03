<label class="col-md-2 control-label">{{ trans('inputs.city') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[city]" class="form-control" id="city" type="text" value="@if(null !== old('Record')['user_profile']['city']){{ old('Record')['user_profile']['city'] }}@else{{ isset($item['user_profile']['city']) ? $item['user_profile']['city'] : '' }}@endif">
</div>