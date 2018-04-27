<script type="text/javascript">
    var ue = UE.getEditor('ueditor_container', {
        toolbars: [
            ['undo', 'redo', '|' , 'searchreplace' , 'bold', 'italic', 'underline',/* 'fontborder',*/ 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset'/*, 'blockquote', 'pasteplain'*/, '|' , 'inserttable' , 'forecolor', 'backcolor'/*, 'insertorderedlist', 'insertunorderedlist'*/, 'fullscreen',
                '|', 'simpleupload', 'link']
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
        ue.setContent($('#ueditor_container_value').attr('data-value'));
    });

    $(function(){
        var taxonomy_list = [],
            causes_list = [],
            promulgator_list = [],
            allCountry = "1209",   //全国的id
            currentCate = "@if(null !== old('Document')['taxonomy_id']){{ old('Document')['taxonomy_id'] }}@else{{ $item['Document']['taxonomy_id'] }}@endif",
            currentLanguage = "{{$item['Document']['lang']}}",
            currentTitle = currentLanguage == "zh" ? "title_zh" : "title_en",
            currenProvince = "@if(! empty(old('Document')['region_id'][0])){{ old('Document')['region_id'][0] }}@else{{ isset($item['Document']['region_id'][0]) ? $item['Document']['region_id'][0] : '' }}@endif",
            currenProvince = currenProvince ? currenProvince : allCountry,
            currenCity = "@if(! empty(old('Document')['region_id'][1])){{ old('Document')['region_id'][1] }}@else{{ isset($item['Document']['region_id'][1]) ? $item['Document']['region_id'][1] : '' }}@endif",
            promulgator_str = $(".promulgator-button").siblings(".show-data").html();

        $(".trigger-btn").click(function(){
            var taxonomy_id = $(this).siblings("input.name-array").val(),
                dataState, dataType,
                currentSpan = $(this).siblings("span.show-data");

            dataState = $(currentSpan).attr("data-state");
            dataType = $(this).attr('data-type');
            currentCate = taxonomy_id ? taxonomy_id : currentCate;

            if(dataType == 'promulgator'){
                if(promulgator_list.length){
                    initSelectTree(promulgator_list, currentCate, dataState, currentLanguage, currentSpan);
                    return;
                }
            }
            if(dataType == 'causes'){
                if(causes_list.length){
                    initSelectTree(causes_list, currentCate, dataState, currentLanguage, currentSpan);
                    return;
                }
            }
            if(dataType == 'taxonomy'){
                if(taxonomy_list.length){
                    initSelectTree(taxonomy_list, currentCate, dataState, currentLanguage, currentSpan);
                    return;
                }
            }
            $.ajax({
                type: 'get',
                url: "{{ route('category.tree')}}",
                beforeSend: function() {
                    $(".page-shade-box").show();
                },
                data: {
                    type: dataType,
                    lang: currentLanguage
                },
                success:function(data) {
                    $(".page-shade-box").hide();
                    if(dataType == 'promulgator'){
                        promulgator_list = data;
                    }
                    if(dataType == 'causes'){
                        causes_list = data;
                    }
                    if(dataType == 'taxonomy'){
                        taxonomy_list = data;
                    }
                    initSelectTree(data, currentCate, dataState, currentLanguage, currentSpan);
                },
                error: function(data){
                    $(".page-shade-box").hide();
                    alert("服务器异常！")
                }
            });
        });
        $(".check-all").change(function(e) {
            checkAllBroadcast(e);
        });

        var loadCity = function( curPro, curCity ){
            //regions
            var regions = <?php echo json_encode($regions, JSON_UNESCAPED_UNICODE); ?> ,
                arr = regions,
                curPro = curPro ? curPro : allCountry,
                curCity = curCity || 0;
            $(".select-province").val(curPro);
            if( curPro == allCountry ){
                $(".promulgator-button").show();
                $(".promulgator-txt").val("").prop({"readonly" : true});
            } else {
                $(".promulgator-button").hide();
                $(".promulgator-txt").prop("readonly", false);
            }
            for( var i = 0; i< arr.length; i++){
                var item = arr[i],
                    province, selected = '';
                if( curPro == item.id){
                    province = item[currentTitle];
                    $( ".region-str" ).val("").val(province);

                    if( item.child && item.child.length ){
                        $(".region-parent").find(".select-city").html("");
                        for( var j = 0; j< item.child.length; j++ ){
                            var itemChild = item.child[j];
                            var childValue = itemChild[currentTitle];
                            var selected = curCity == itemChild.id ? "selected" : "";
                            $(".region-parent").find(".select-city").removeClass("hide").append("<option "+selected+" value='"+itemChild.id+"'>"+itemChild[currentTitle]+"</option>");
                            if( curCity && (curCity == itemChild.id) ){
                                $( ".region-str" ).val("").val(province+ "@" + childValue );
                            }
                        }
                    } else {
                        $(".select-city").addClass("hide");
                    }
                }
            }
        };
        //初始化执行地区和发文机关
        if(currenProvince || ( currenProvince && currenCity)){
            loadCity( currenProvince, currenCity );
            if(promulgator_str){
                $(".promulgator-txt").val(promulgator_str);
            }
        }
        $(".select-province").change(function(){
            var el = $(this),
                promulgatorEle = $(".promulgator-txt"),
                value = $(el).val() ? $(el).val() : allCountry;
            if( value == allCountry ){
                $(promulgatorEle).siblings("span").attr({"data-value": ""});
                $(promulgatorEle).siblings("input").val("");
            } else {
                if( $(promulgatorEle).prop("readonly") ){
                    $(promulgatorEle).val("");
                    $(promulgatorEle).siblings("span").attr({"data-value": ""});
                    $(promulgatorEle).siblings("input").val("");
                }
            }
            loadCity(value);
        });
        $(".select-city").change(function(){
            var el = $(this),
                newId = $(el).val(),
                value = $(el).find("option[value="+newId+"]").html(),
                hiddenField = $( ".region-str" ),
                oldValue = $(hiddenField).val(),
                index = oldValue.indexOf("@"),
                newValue = index == -1 ? oldValue : oldValue.substring(0,index);
            $(hiddenField).val(newValue + "@" + value);
        });
        $(".add-enclosure").click(function(){
            var enclosure = $(".enclosure-main").find(".new-enclosure"),
                enclosureLength = parseInt($(enclosure).length);
            var modal = '<div class="new-enclosure upload-attachments-txt"><div class="enclosure-title"><label class="col-md-2">附件标题</label><textarea name="Document[attachments][attachment]['+enclosureLength+'][@value]" class="col-md-10" /></textarea> </div> <div class="enclosure-upload"> <label class="col-md-2">文件上传</label> <div class="col-md-10"> <input name="attachement_file[]" class="enclosure" type="file" value="" /> <span class="delete-enclosure">删除附件</span> </div> </div> </div>';
            $(".enclosure-group").find(".enclosure-main").append(modal);
        });
        $(".enclosure-main").on("click", ".delete-enclosure", function(){
           var file = $(this).siblings(".enclosure"),
               parents = $(this).parents(".upload-attachments-txt"),
               hiddenInput = $(parents).children("input");
            file.after(file.clone().val(""));
            file.remove();
            if(hiddenInput){
                $(hiddenInput).val("");
                $(parents).find(".default-show").html("");
            }
        });
        $("input[type=file].enclosure").on("change", function(e){
            var el = e.target;
            $(el).parents(".new-enclosure").children("input").val("");
            $(el).parents(".new-enclosure").find(".default-show").html("");
        });

        // 为了验证上传附件的title不为空 模拟表单提交
        $(".simulation-form").submit(function(e){
            var el = e.target,
                allEnclosure = $(el).find(".new-enclosure"),
                tip = true,
                textarea, fileEle;
            if( allEnclosure ){
                allEnclosure.each(function(){
                    textarea = $(this).find("textarea");
                    fileEle = $(this).find("input.enclosure");
                    if( !$.trim($(textarea).val()) && $(fileEle).val()){
                        tip = false;
                        return false;
                    }
                })
            }
            if( !tip ){
                alert("请填写附件标题！");
                return false;
            }
        })
    });
    
</script>
<style>
    .edui-default .edui-colorpicker-nocolor{
        height:auto;
    }
</style>