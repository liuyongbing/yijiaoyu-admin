<div class="form-group">
    <label class="col-md-2 control-label">
        {{ trans('inputs.upload_ppt') }}
        <span class="star-must">*</span>
    </label>
    <div class="col-md-10">
        <input type="file" name="upload_file" class="" />
        <input type="hidden" name="Record[image]" value="{{ isset($item['upload_ppt']) ? $item['upload_ppt'] : '' }}" />
    </div>
</div>