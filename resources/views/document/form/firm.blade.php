<label class="col-md-2 control-label">代理律所</label>
<div class="col-md-10">
    <input name="Document[firm]" class="form-control" id="firm" type="text" value="@if(null !== old('Document')['firm']){{ old('Document')['firm'] }}@else{{ $item['Document']['firm'] }}@endif">
</div>