<label class="col-md-2 control-label">
    {{ trans('inputs.brand') }}<span class="star-must">*</span>
</label>
<div class="col-md-10">
    <input name="Record[brand]" class="form-control" id="brand" type="text" value="@if(null !== old('Record')['brand']){{ old('Record')['brand'] }}@else{{ isset($item['brand']) ? $item['brand'] : '' }}@endif" readonly />
</div>