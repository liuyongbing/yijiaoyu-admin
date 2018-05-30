<label class="col-md-2 control-label">{{ trans('inputs.remark') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <textarea name="Record[remark]" id="remark" class="form-control">{{ isset($item['remark']) ? $item['remark'] : '' }}</textarea>
</div>