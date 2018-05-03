<label class="col-md-2 control-label">{{ trans('inputs.email') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[email]" class="form-control" id="email" type="text" value="@if(null !== old('Record')['user_profile']['email']){{ old('Record')['user_profile']['email'] }}@else{{ isset($item['user_profile']['email']) ? $item['user_profile']['email'] : '' }}@endif">
</div>