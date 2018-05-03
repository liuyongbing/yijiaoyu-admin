<label class="col-md-2 control-label">{{ trans('inputs.birthday') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[birthday]" class="form-control" id="birthday" type="text" value="@if(null !== old('Record')['user_profile']['birthday']){{ old('Record')['user_profile']['birthday'] }}@else{{ isset($item['user_profile']['birthday']) ? $item['user_profile']['birthday'] : '' }}@endif">
</div>