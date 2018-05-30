<label class="col-md-2 control-label">{{ trans('inputs.budget') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[budget]" class="form-control" id="budget" type="text" value="@if(null !== old('Record')['budget']){{ old('Record')['budget'] }}@else{{ isset($item['budget']) ? $item['budget'] : '' }}@endif" readonly />
</div>