<label class="col-md-2 control-label">{{ trans('inputs.member_titles') }}</label>
<div class="col-md-10">
    <input name="Record[titles]" class="form-control" id="member_titles" type="text" value="@if(null !== old('Record')['titles']){{ old('Record')['titles'] }}@else{{ isset($item['titles']) ? $item['titles'] : '' }}@endif" placeholder="多抬头请以 '|' 分隔填写" />
</div>