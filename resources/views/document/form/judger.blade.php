<label class="col-md-2 control-label">审理法官</label>
<div class="col-md-10">
    <input name="Document[judger]" class="form-control" id="judger" type="text" value="@if(null !== old('Document')['judger']){{ old('Document')['judger'] }}@else{{ $item['Document']['judger'] }}@endif">
</div>