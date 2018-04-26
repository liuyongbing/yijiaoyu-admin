<label class="col-md-2 control-label">内容<span class="star-must">*</span></label>
<div class="col-md-10">
    <script id="ueditor_container_value" type="text/plain" data-value="@if(null !== old('Document')['content']){{ '<p>'.old('Document')['content'].'</p>' }}@else{{ '<p>'.htmlspecialchars($item['Document']['content']).'</p>' }}@endif"></script>
    <script id="ueditor_container" name="Document[content]" type="text/plain" ></script>
</div>