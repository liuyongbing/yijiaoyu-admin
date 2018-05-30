<label class="col-md-2 control-label">{{ trans('inputs.summary') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <textarea name="Record[summary]" id="summary" class="form-control" readonly>{{ isset($item['summary']) ? $item['summary'] : '' }}</textarea>
</div>