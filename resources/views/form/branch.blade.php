<label class="col-md-2 control-label">{{ trans('inputs.branch') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <select name="Record[branch_id]" class="form-control" >
        <option value="">请选择</option>
        @foreach($branches as $branch)
        <option value="{{ $branch['id'] }}" @if(!empty($item['branch_id']) && $branch['id'] == $item['branch_id'])) selected="selected" @endif>{{ $branch['user_profile']['username'] }}</option>
        @endforeach
    </select>
</div>