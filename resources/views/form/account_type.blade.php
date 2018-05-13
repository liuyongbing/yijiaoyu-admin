<label class="col-md-2 control-label">{{ trans('inputs.account_type') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[account_type]" class="form-control" >
        <option value="">请选择</option>
        @foreach($accountTypes as $key => $type)
        <option value="{{ $type }}" @if(!empty($item['account_type']) && $type == $item['account_type'])) selected="selected" @endif>{{ trans('common.account_type.' . $type) }}</option>
        @endforeach
    </select>
</div>