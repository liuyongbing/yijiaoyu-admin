<label class="col-md-2 control-label">{{ trans('inputs.published_at') }}</label>
<div class="col-md-10">
    <input name="Record[published_at]" class="form-control " id="published_at" type="text" value="@if(null !== old('Record')['published_at']){{ old('Record')['published_at'] }}@else{{ isset($item['published_at']) ? $item['published_at'] : date('Y-m-d') }}@endif" placeholder="" /><!--datepicker-->
</div> 