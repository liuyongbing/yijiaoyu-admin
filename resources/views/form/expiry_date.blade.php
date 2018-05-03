<label class="col-md-2 control-label">{{ trans('inputs.expiry_date') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[expiry_date]" class="form-control" id="expiry_date" type="text" value="@if(null !== old('Record')['user_profile']['expiry_date']){{ old('Record')['user_profile']['expiry_date'] }}@else{{ isset($item['user_profile']['expiry_date']) ? $item['user_profile']['expiry_date'] : '' }}@endif">
</div>