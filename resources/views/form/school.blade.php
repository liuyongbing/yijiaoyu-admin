<label class="col-md-2 control-label">{{ trans('inputs.school') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[school]" class="form-control" id="school" type="text" value="@if(null !== old('Record')['school']){{ old('Record')['school'] }}@else{{ isset($item['school']) ? $item['school'] : '' }}@endif" />
</div>