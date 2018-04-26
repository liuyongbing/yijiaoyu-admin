<label class="col-md-2 control-label">附件上传</label>
<div class="col-md-10 enclosure-group">
    <div class="enclosure-main">
        @if (!empty($item['Document']['attachments']['attachment']))
            @foreach($item['Document']['attachments']['attachment'] as $key => $attachment)
            <div class="new-enclosure upload-attachments-txt">
                <div class="enclosure-title">
                    <label class="col-md-2">附件标题</label>
                    <textarea name="Document[attachments][attachment][{{ $key }}][@value]" class="col-md-10">{{ $attachment['@value'] }}</textarea>
                </div>
                <div class="enclosure-upload">
                    <label class="col-md-2">文件上传</label>
                    <div class="col-md-10">
                        <input name="attachement_file[]" class="enclosure" type="file" value="" />
                        <span class="default-show">{{ \App\Helpers\SystemHelper::showOriginalName($attachment) }}</span>
                        <span class="delete-enclosure">删除附件</span>
                    </div>
                </div>
                <input type="hidden" name="Document[attachments][attachment][{{ $key }}][@attributes][originalName]" value="{{ \App\Helpers\SystemHelper::showOriginalName($attachment) }}" />
                <input type="hidden" name="Document[attachments][attachment][{{ $key }}][@attributes][location]" value="{{ $attachment['@attributes']['location'] }}" />
            </div>
            @endforeach
            <input type="hidden" name="Document[attachments][@attributes][count]" value="{{ $item['Document']['attachments']['@attributes']['count'] }}" />
        @else
            <div class="new-enclosure upload-attachments-txt">
                <div class="enclosure-title">
                    <label class="col-md-2">附件标题</label>
                    <textarea name="Document[attachments][attachment][0][@value]" class="col-md-10" /></textarea>
                </div>
                <div class="enclosure-upload">
                    <label class="col-md-2">文件上传</label>
                    <div class="col-md-10">
                        <input name="attachement_file[]" class="enclosure" type="file" value="" />
                        <span class="delete-enclosure">删除附件</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <button type="button" class="btn btn-sm btn-primary add-enclosure">增加一个附件</button>
</div>