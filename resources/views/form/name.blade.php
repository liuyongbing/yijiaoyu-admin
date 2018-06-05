<label class="col-md-2 control-label">{{ trans('inputs.username') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[name]" class="form-control" id="name" type="text" value="@if(null !== old('Record')['name']){{ old('Record')['name'] }}@else{{ isset($item['name']) ? $item['name'] : '' }}@endif" />
</div>