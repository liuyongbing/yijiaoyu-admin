<label class="col-md-2 control-label">代理律师</label>
<div class="col-md-10">
    <input name="Document[lawyer]" class="form-control" id="lawyer" type="text" value="@if(null !== old('Document')['lawyer']){{ old('Document')['lawyer'] }}@else{{ $item['Document']['lawyer'] }}@endif">
</div>