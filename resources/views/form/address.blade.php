<label class="col-md-2 control-label">{{ trans('inputs.address') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[address]" class="form-control" id="address" type="text" value="@if(null !== old('Record')['address']){{ old('Record')['address'] }}@else{{ isset($item['address']) ? $item['address'] : '' }}@endif" readonly />
</div>