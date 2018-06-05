<label class="col-md-2 control-label">{{ trans('inputs.year') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[show_year]" class="form-control" id="show_year" type="text" value="@if(null !== old('Record')['show_year']){{ old('Record')['show_year'] }}@else{{ isset($item['show_year']) ? $item['show_year'] : date('Y') }}@endif">
</div>