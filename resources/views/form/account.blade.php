<label class="col-md-2 control-label">{{ trans('inputs.account') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[account]" class="form-control" id="account" type="text" value="@if(null !== old('Record')['account']){{ old('Record')['user_profile']['account'] }}@else{{ isset($item['user_profile']['account']) ? $item['user_profile']['account'] : '' }}@endif">
</div>