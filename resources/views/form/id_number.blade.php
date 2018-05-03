<label class="col-md-2 control-label">{{ trans('inputs.id_number') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[id_number]" class="form-control" id="id_number" type="text" value="@if(null !== old('Record')['user_profile']['id_number']){{ old('Record')['user_profile']['id_number'] }}@else{{ isset($item['user_profile']['id_number']) ? $item['user_profile']['id_number'] : '' }}@endif">
</div>