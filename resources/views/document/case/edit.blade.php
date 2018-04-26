@extends('document.document')

@section('title', '判决文书管理 - 编辑判决文书')

@section('content')
    @include('document.left_navbar', ['leftNavbarActive'=>'case_list', 'type' => 'case'])

    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                    @if($action == 'add')
                    新增判决文书
                    @else
                    编辑判决文书
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
                            新增判决文书
                        @else
                            编辑判决文书
                        @endif
                        </div>
                    </div>
                    <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                        <form class="form-horizontal" action="{{ $action == 'add' ? route('documents.case.toAdd') : route('documents.case.toEdit') }}" method="post" enctype="multipart/form-data">
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
                                    <!--一审法院-->
                                    @include('document.form.court1', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--二审法院-->
                                    @include('document.form.court2', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--审理法官-->
                                    @include('document.form.judger', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--代理律师-->
                                    @include('document.form.lawyer', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--代理律所-->
                                    @include('document.form.firm', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--发文机关-->
                                    @include('document.form.promulgator', ['item' => $item])
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
                                    <label class="col-md-2 control-label">文书类型<span class="star-must">*</span></label>
                                    <div class="col-md-5">
                                        <select name="Document[judge_doctype_id]" class="form-control" id="judge_doctype_id">
                                            <option value="">--选择文书类型--</option>
                                            
                                            @foreach(\App\Constants\ConstantManager::docTypes($item['Document']['lang']) as $index => $type)
                                            <option value="1" @if(old('Document')['judge_doctype_id'] == $index)selected="selected"@elseif($item['Document']['judge_doctype_id'] == $index)selected="selected"@endif>{{ $type }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">判审进度<span class="star-must">*</span></label>
                                    <div class="col-md-5">
                                        <select name="Document[trial_process]" class="form-control" id="trial_process">
                                            <option value="">--选择判审进度--</option>@foreach(\App\Constants\ConstantManager::trialProcess($item['Document']['lang']) as $index => $process)
                                            <option value="{{ $process }}" @if(old('Document')['trial_process'] == $process)selected="selected"@elseif($item['Document']['trial_process'] == $process)selected="selected"@endif>{{ $process }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <!--对应翻译文章ID-->
                                    @include('document.form.translation_id', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--内容来源-->
                                    @include('document.form.source', ['item' => $item])
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
                                        'text' => '选择法学分类'
                                    ])
                                </div>
                                
                                <div class="form-group">
                                    <!--案由-->
                                    @include('document.form.causes', [
                                        'item' => $item,
                                        'type' => 'causes',
                                        'text' => '选择案由',
                                        'required' => true
                                    ])
                                </div>
                                
                                <div class="form-group">
                                    <!--参照级别-->
                                    <label class="col-md-2 control-label">参照级别<span class="star-must">*</span></label>
                                    <div class="col-md-10">
                                        <label class="radio-inline">
                                            <input type="radio" @if(!empty($authority_op)){{$authority_op}}@endif name="Document[authority]" value="10" @if(!empty(old('Document')['authority']))@if(old('Document')['authority'] == 10)checked="checked"@endif @elseif(isset($item['Document']['authority']) && $item['Document']['authority'] == 10)checked="checked" @endif /> 指导性案例
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" @if(!empty($authority_op)){{$authority_op}}@endif name="Document[authority]" value="20" @if(!empty(old('Document')['authority']))@if(old('Document')['authority'] == 20)checked="checked"@endif @elseif(isset($item['Document']['authority']) && $item['Document']['authority'] == 20)checked="checked" @endif /> 经典案例
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" @if(!empty($authority_op)){{$authority_op}}@endif name="Document[authority]" value="30" @if(!empty(old('Document')['authority']))@if(old('Document')['authority'] == 30)checked="checked"@endif @elseif(isset($item['Document']['authority']) && $item['Document']['authority'] == 30)checked="checked" @endif /> 精选案例
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" @if(!empty($authority_op)){{$authority_op}}@endif name="Document[authority]" value="40" @if(!empty(old('Document')['authority']))@if(old('Document')['authority'] == 40)checked="checked"@endif @elseif(isset($item['Document']['authority']) && $item['Document']['authority'] == 40)checked="checked" @endif /> 普通案例
                                        </label>

                                        @if(!empty($authority_op))
                                            <input type="hidden" name="Document[authority]" value="{{$authority_value}}" />
                                        @endif
                                    </div>
                                </div>
                                
                                <!--录入人&录入时间-->
                                @if ($action == 'edit')
                                    @include('document.form.updated', ['item' => $item])
                                @endif
                                
                                <!--关键词-->
                                <div class="form-group">
                                    @include('document.form.keyword', ['item' => $item])
                                </div>
                                
                                <!--判决要旨-->
                                <div class="form-group">
                                    @include('document.form.judicial_gist', ['item' => $item])
                                </div>
                                
                                <!--摘要/评析-->
                                <div class="form-group">
                                    @include('document.form.abstract', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--内容-->
                                    @include('document.form.content', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--submit buttons-->
                                    @include('document.form.submit', ['route' => 'documents.case.index'])
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