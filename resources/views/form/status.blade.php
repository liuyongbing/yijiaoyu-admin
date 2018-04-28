
<label class="col-md-2 control-label">{{ trans('inputs.status') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <label class="radio-inline">
        <input type="radio" name="Record[status]" value="1" @if(!empty($item['status'])) checked="checked"@endif />
        {{ trans('inputs.status_yes') }}
    </label>
    <label class="radio-inline">
        <input type="radio" name="Record[status]" value="0" @if(isset($item['status']) && $item['status'] == 0)checked="checked"@endif /> {{ trans('inputs.status_no') }}
    </label>
</div>