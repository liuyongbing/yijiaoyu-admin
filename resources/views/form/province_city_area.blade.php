<label class="col-md-2 control-label">{{ trans('inputs.province_city_area') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[province_city_area]" class="form-control" id="province_city_area" type="text" value="@if(null !== old('Record')['province_city_area']){{ old('Record')['province_city_area'] }}@else{{ $item['province'] . ' / ' . $item['city'] . ' / ' . $item['area'] }}@endif" readonly />
</div>