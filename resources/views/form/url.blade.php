<label class="col-md-2 control-label">{{ trans('inputs.url') }}</label>
<div class="col-md-10">
    <input name="Record[url]" placeholder="链接请以http://开头"  class="form-control" id="url" type="text" value="@if(null !== old('Record')['url']){{ old('Record')['url'] }}@else{{ isset($item['url']) ? $item['url'] : '' }}@endif">
</div>