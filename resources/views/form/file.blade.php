<div class="form-group">
    <label class="col-md-2 control-label">
        {{ trans('inputs.image') }}
        <span class="star-must">*</span>
    </label>
    <div class="col-md-10 enclosure-group">
        <input type="file" name="upload_file" />
        <input type="hidden" name="Record[image]" value="{{ isset($item['image']) ? $item['image'] : '' }}" />
    </div>
</div>

@if(!empty($item['image_url']))
<div class="form-group">  
    <label class="col-md-2 control-label">
        {{ trans('inputs.image_view') }}
    </label>
    <div class="col-md-10 enclosure-group">
        <img src="{{ $item['image_url'] }}" />
    </div>
</div>
@endif