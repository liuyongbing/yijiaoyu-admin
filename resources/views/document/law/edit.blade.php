@extends('document.document')

@section('title', '法律法规管理 - 编辑法律法规')

@section('content')
    @include('document.left_navbar', ['leftNavbarActive'=>'law_list', 'type' => 'law'])

    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                    @if($action == 'add')
                    新增法律法规
                    @else
                    编辑法律法规
                    @endif
                    </h1>
                </div>
            </div>
        </div>

        @include('layouts.input_errors')
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default bootstrap-admin-no-table-panel">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">
                        @if($action == 'add')
                            新增法律法规
                        @else
                            编辑法律法规
                        @endif
                        </div>
                    </div>
                    <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                        <form class="form-horizontal simulation-form" action="{{ $action == 'add' ? route('documents.law.toAdd') : route('documents.law.toEdit') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <!-- _id & guid & provider_id -->
                            @include('document.form.hidden', ['action' => $action, 'item' => $item])
                            
                            <fieldset>
                                <div class="form-group">
                                    <!--标题-->
                                    @include('document.form.title', ['item' => $item])
                                </div>

                                <div class="form-group">
                                    <!--文号-->
                                    @include('document.form.issue_no', ['item' => $item])
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">发文机关<span class="star-must">*</span></label>
                                    <div class="col-md-10">
                                        <span style="display: none;" class="show-data" data-state="false" data-value="@if(null !== old('Document')['promulgator_id']){{ old('Document')['promulgator_id'] }}@else{{ $item['Document']['promulgator_id'] }}@endif">@if(null !== old('Document')['promulgator']){{ old('Document')['promulgator'] }}@else{{ $item['Document']['promulgator'] }}@endif</span>
                                        <input name="Document[promulgator]" class="form-control name-str promulgator-txt" id="title" type="text" value="@if(null !== old('Document')['promulgator']){{ old('Document')['promulgator'] }}@else{{ $item['Document']['promulgator'] }}@endif" @if(empty($item['Document']['region_id']) || in_array(1209, $item['Document']['region_id']))readonly="readonly"@endif />
                                        <input name="Document[promulgator_id]" class="name-array promulgator-id" id="title" type="hidden" value="@if(null !== old('Document')['promulgator_id']){{ old('Document')['promulgator_id'] }}@else{{ $item['Document']['promulgator_id'] }}@endif" />
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary trigger-btn promulgator-button" id="promulgator-button" data-type="promulgator">
                                            选择发文机关
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <!--地区-->
                                    @include('document.form.region_id', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--发文日期-->
                                    @include('document.form.promulgation_date', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">生效日期</label>
                                    <div class="col-md-5">
                                        <input name="Document[effected_date]" class="form-control @if(!empty($item['Document']['translation_id']) && 'en' == $item['Document']['lang']) @else datepicker @endif" id="effected_date" type="text" value="@if(null !== old('Document')['effected_date']){{ old('Document')['effected_date'] }}@else{{ $item['Document']['effected_date'] }}@endif" @if(!empty($item['Document']['translation_id']) && 'en' == $item['Document']['lang'])readonly="readonly"@endif />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">时效性<span class="star-must">*</span></label>
                                    <div class="col-md-5">
                                    @if(!empty($item['Document']['translation_id']) && 'en' == $item['Document']['lang'])
                                        <input type="hidden" name="Document[effectiveness_id]" value="{{ $item['Document']['effectiveness_id'] }}" />
                                        <input type="text" value="{{ \App\Helpers\StringHelper::getEffectiveness($item['Document']['effectiveness_id'], $item['Document']['lang']) }}" class="form-control" readonly="readonly" />
                                    @else
                                        <select name="Document[effectiveness_id]" class="form-control" >
                                        @foreach(\App\Constants\ConstantManager::effectiveness($item['Document']['lang']) as $key => $value)
                                            <option value="{{ $key }}"  @if(old('Document')['effectiveness_id'] == $key)selected="selected"@elseif($item['Document']['effectiveness_id'] == $key)selected="selected"@endif>{{ $value }}</option>
                                        @endforeach
                                        </select>
                                    @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">效力级别<span class="star-must">*</span></label>
                                    <div class="col-md-5">
                                    @if(!empty($item['Document']['translation_id']) && 'en' == $item['Document']['lang'])
                                        <input type="hidden" name="Document[jurisdictional_id]" value="{{ $item['Document']['jurisdictional_id'] }}" />
                                        <input type="text" value="{{ \App\Helpers\StringHelper::getJurisdictional($item['Document']['jurisdictional_id'], $item['Document']['lang']) }}" class="form-control" readonly="readonly" />
                                    @else
                                        <select name="Document[jurisdictional_id]" class="form-control" >
                                        @foreach(\App\Constants\ConstantManager::jurisdictionals($item['Document']['lang']) as $key => $value)
                                            <option value="{{ $key }}" @if(old('Document')['jurisdictional_id'] == $key)selected="selected"@elseif($item['Document']['jurisdictional_id'] == $key)selected="selected"@endif>{{ $value }}</option>
                                        @endforeach
                                        </select>
                                    @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <!--对应翻译文章ID-->
                                    @include('document.form.translation_id', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--语言-->
                                    @include('document.form.lang', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--是否显示-->
                                    @include('document.form.visibility', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--法学分类-->
                                    @include('document.form.taxonomy_id', [
                                        'item' => $item,
                                        'type' => 'taxonomy',
                                        'text' => '选择分类'
                                    ])
                                </div>
                                
                                <!--录入人&录入时间-->
                                @if ($action == 'edit')
                                    @include('document.form.updated', ['item' => $item])
                                @endif
                                
                                <div class="form-group">
                                    <!--内容-->
                                    @include('document.form.content', ['item' => $item])
                                </div>
                                
                                <div class="form-group enclosure-main">
                                    <label class="col-md-2 control-label">版本对照</label>
                                    <div class="col-md-4 upload-attachments-txt" >
                                        <input name="version_compare_file" class="enclosure" type="file" value="" />
                                        <input name="Document[version_compare][filename]" type="hidden" value="@if(null !== old('Document')['version_compare']['filename']){{ old('Document')['version_compare']['filename'] }}@elseif(!empty($item['Document']['version_compare']['filename'])){{ $item['Document']['version_compare']['filename'] }}@elseif(!empty($item['Document']['version_compare']) && !is_array($item['Document']['version_compare'])){{ $item['Document']['version_compare'] }}@endif" />
                                        <input type="hidden" name="Document[version_compare][originalName]" value="@if (!empty($item['Document']['version_compare'])){{ \App\Helpers\SystemHelper::showOriginalName($item['Document']['version_compare']) }}@endif" />
                                        <span class="default-show">@if (!empty($item['Document']['version_compare'])){{ \App\Helpers\SystemHelper::showOriginalName($item['Document']['version_compare']) }}@endif</span>
                                        <span class="delete-enclosure delete-add-style">删除附件</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <!--附件上传-->
                                    @include('document.form.upload_attachments', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--submit buttons-->
                                    @include('document.form.submit', ['route' => 'documents.law.index'])
                                </div>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Modal -->
    @include('document.form.modal')
    
@endsection

@section('script')
    @include('document.form.js', ['item' => $item, 'regions' => $regions])

@endsection