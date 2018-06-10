<label class="col-md-2 control-label">{{ trans('inputs.code') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[code]" class="form-control" id="code" type="text" value="@if(null !== old('Record')['code']){{ old('Record')['code'] }}@else{{ isset($item['code']) ? $item['code'] : '' }}@endif">
</div>