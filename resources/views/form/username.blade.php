<label class="col-md-2 control-label">{{ trans('inputs.username') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <input name="Record[username]" class="form-control" id="username" type="text" value="@if(null !== old('Record')['username']){{ old('Record')['user_profile']['username'] }}@else{{ isset($item['user_profile']['username']) ? $item['user_profile']['username'] : '' }}@endif">
</div>