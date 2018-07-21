<div class="form-group">
    <label class="col-md-2 control-label">
        {{ trans('inputs.upload_music') }}
    </label>
    <div class="col-md-10">
        <input type="file" name="upload_music" class="" />
        <input type="hidden" name="Record[image]" value="{{ isset($item['upload_music']) ? $item['upload_music'] : '' }}" />
    </div>
</div>