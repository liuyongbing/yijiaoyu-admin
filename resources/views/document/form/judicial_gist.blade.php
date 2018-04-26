<label class="col-md-2 control-label">判决要旨</label>
<div class="col-md-10">
    <textarea name="Document[judicial_gist]" class="form-control" style="resize: none; height: 110px;" id="judicial_gist">@if(null !== old('Document')['judicial_gist']){{ old('Document')['judicial_gist'] }}@else{{ isset($item['Document']['judicial_gist']) ? $item['Document']['judicial_gist'] : '' }}@endif</textarea>
</div>