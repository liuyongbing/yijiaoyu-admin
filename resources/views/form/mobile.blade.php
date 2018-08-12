<label class="col-md-2 control-label">{{ trans('inputs.mobile') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[mobile]" class="form-control" id="mobile" type="text" value="@if(null !== old('Record')['mobile']){{ old('Record')['mobile'] }}@else{{ isset($item['mobile']) ? $item['mobile'] : '' }}@endif" />
</div>