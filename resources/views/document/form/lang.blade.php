<label class="col-md-2 control-label">语言<span class="star-must">*</span></label>
<div class="col-md-10">
    <label class="radio-inline">
        <input type="radio" name="Document[lang]" value="zh" @if($item['Document']['lang'] == 'zh')checked="checked"@endif @if(old('Document')['lang'] == 'zh')checked="checked"@endif /> 中文
    </label>
    <label class="radio-inline">
        <input type="radio" name="Document[lang]" value="en" @if($item['Document']['lang'] == 'en')checked="checked"@endif @if(old('Document')['lang'] == 'en')checked="checked"@endif /> 英文
    </label>
</div>