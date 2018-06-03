<label class="col-md-2 control-label">{{ trans('inputs.contents') }}</label>
<div class="col-md-10">
    <script id="ueditor_container_value" type="text/plain" data-value="@if(null !== old('Record')['contents']){{ '<p>'.old('Record')['contents'].'</p>' }}@else{{ htmlspecialchars($item['content']) }}@endif"></script>
    <script id="ueditor_container" name="Record[contents]" type="text/plain" ></script>
</div>

@section('script')
<script type="text/javascript">
    var ue = UE.getEditor('ueditor_container', {
        toolbars: [
            ['undo', 'redo', '|', 'bold', 'italic', 'underline', 'removeformat',
                'formatmatch', 'autotypeset', '|', 'paragraph',  'fontfamily', 'fontsize', '|',
                'inserttable' , 'forecolor', 'backcolor', '|', 'simpleupload', 'link'
            ]
        ],
        enableAutoSave: false,
        autoFloatEnabled: true,
        initialFrameHeight: 350,
        retainOnlyLabelPasted : true,
        pasteplain : true,
        enableContextMenu : true,
        autoHeightEnabled: false
    });

    //对编辑器的操作最好在编辑器ready之后再做
    ue.ready(function () {
        ue.execCommand('serverparam', function(editor) {
            return {
                'filetype': 'website'
            };
        });
        ue.setContent($('#ueditor_container_value').attr('data-value'));
    });
</script>
@endsection