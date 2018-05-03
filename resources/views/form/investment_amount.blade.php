<label class="col-md-2 control-label">{{ trans('inputs.investment_amount') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[investment_amount]" class="form-control" id="investment_amount" type="text" value="@if(null !== old('Record')['user_profile']['investment_amount']){{ old('Record')['user_profile']['investment_amount'] }}@else{{ isset($item['user_profile']['investment_amount']) ? $item['user_profile']['investment_amount'] : '' }}@endif">
</div>