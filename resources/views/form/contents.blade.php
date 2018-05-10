<label class="col-md-2 control-label">{{ trans('inputs.contents') }}<span class="star-must">*</span></label>
<div class="col-md-10">
    <textarea name="Record[contents]" id="contents" class="form-control">{{ isset($item['contents']) ? $item['contents'] : '' }}</textarea>
</div>