<label class="col-md-2 control-label">{{ trans('inputs.target') }}</label>
<div class="col-md-10">
    <span><input type="checkbox" name="Record[target]" value="_blank" class="form-control" @if(!empty($item['target']) && '_blank' == $item['target']) checked @endif>{{ trans('actions.new_window') }}</span>
</div>