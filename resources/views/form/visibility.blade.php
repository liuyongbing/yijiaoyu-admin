<label class="col-md-2 control-label">是否显示<span class="star-must">*</span></label>
<div class="col-md-10">
    <label class="radio-inline">
        <input type="radio" name="Document[visibility]" value="1" @if($action == 'add' || ($action == 'edit' && $item['Document']['visibility'] == 1))checked="checked"@endif @if(old('Document')['visibility'] == '1')checked="checked" @endif /> 是
    </label>
    <label class="radio-inline">
        <input type="radio" name="Document[visibility]" value="0" @if($action == 'edit' && $item['Document']['visibility'] == 0)checked="checked"@endif @if(old('Document')['visibility'] === '0')checked="checked" @endif /> 否
    </label>
</div>