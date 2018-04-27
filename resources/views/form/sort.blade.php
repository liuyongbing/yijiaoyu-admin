<label class="col-md-2 control-label">{{ trans('inputs.sort') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[sort]" class="form-control" id="sort" type="text" value="@if(null !== old('Record')['sort']){{ old('Record')['sort'] }}@else{{ isset($item['sort']) ? $item['sort'] : 100 }}@endif">
</div>