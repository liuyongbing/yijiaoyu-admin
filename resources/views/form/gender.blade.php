<label class="col-md-2 control-label">{{ trans('inputs.gender') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[gender]" class="form-control" id="gender" type="text" value="@if(null !== old('Record')['gender']){{ old('Record')['user_profile']['gender'] }}@else{{ isset($item['user_profile']['gender']) ? $item['user_profile']['gender'] : '' }}@endif">
</div>