<label class="col-md-2 control-label">{{ trans('inputs.account') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[account]" class="form-control" id="account" type="text" value="@if(null !== old('Record')['account']){{ old('Record')['account'] }}@else{{ isset($item['account']) ? $item['account'] : '' }}@endif">
</div>