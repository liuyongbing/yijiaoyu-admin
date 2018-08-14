<label class="col-md-2 control-label">{{ trans('inputs.birthday') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[birthday]" class="form-control datepicker" id="birthday" type="text" value="@if(null !== old('Record')['birthday']){{ old('Record')['birthday'] }}@else{{ isset($item['birthday']) ? $item['birthday'] : '' }}@endif">
</div>