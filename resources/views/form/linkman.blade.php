<label class="col-md-2 control-label">{{ trans('inputs.linkman') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[linkman]" class="form-control" id="linkman" type="text" value="@if(null !== old('Record')['linkman']){{ old('Record')['linkman'] }}@else{{ isset($item['linkman']) ? $item['linkman'] : '' }}@endif" />
</div>