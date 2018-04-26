@extends('document.document')

@section('title', '经典案例管理 - 编辑经典案例')

@section('content')
    @include('document.left_navbar', ['leftNavbarActive'=>'typical_case_list', 'type' => 'typical_case'])

    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                    @if($action == 'add')
                    新增经典案例
                    @else
                    编辑经典案例
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
                            新增经典案例
                        @else
                            编辑经典案例
                        @endif
                        </div>
                    </div>
                    <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                        <form class="form-horizontal" action="{{ $action == 'add' ? route('documents.typical_case.toAdd') : route('documents.typical_case.toEdit') }}" method="post" enctype="multipart/form-data">
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
                                    @include('document.form.region_id', ['item' => $item, 'required' => false])
                                </div>
                                
                                <div class="form-group">
                                    <!--发文日期-->
                                    @include('document.form.promulgation_date', ['item' => $item])
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
                                        'required' => false
                                    ])
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
                                
                                <div class="form-group">
                                    <!--内容-->
                                    @include('document.form.content', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--submit buttons-->
                                    @include('document.form.submit', ['route' => 'documents.typical_case.index'])
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