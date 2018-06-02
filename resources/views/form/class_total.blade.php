<label class="col-md-2 control-label">{{ trans('inputs.class_total') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[class_total]" class="form-control" id="class_total" type="text" value="@if(null !== old('Record')['class_total']){{ old('Record')['class_total'] }}@else{{ isset($item['class_total']) ? $item['class_total'] : '' }}@endif">
</div>