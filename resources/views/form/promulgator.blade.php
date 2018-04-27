<label class="col-md-2 control-label">发文机关</label>
<div class="col-md-10">
    <input name="Document[promulgator]" class="form-control" id="promulgator" type="text" value="@if(null !== old('Document')['promulgator']){{ old('Document')['promulgator'] }}@else{{ $item['Document']['promulgator'] }}@endif">
</div>