<label class="col-md-2 control-label">摘要/评析</label>
<div class="col-md-10">
    <textarea name="Document[abstract]" class="form-control" style="resize: none; height: 110px;" id="abstract">@if(null !== old('Document')['abstract']){{ old('Document')['abstract'] }}@else{{ isset($item['Document']['abstract']) ? $item['Document']['abstract'] : '' }}@endif</textarea>
</div>