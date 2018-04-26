@extends('document.document')

@section('title', '法律评论管理 - 编辑法律评论')

@section('content')
    @include('document.left_navbar', ['leftNavbarActive'=>'article_list', 'type' => 'article'])

    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                    @if($action == 'add')
                    新增法律评论
                    @else
                    编辑法律评论
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
                            新增法律评论
                        @else
                            编辑法律评论
                        @endif
                        </div>
                    </div>
                    <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                        <form class="form-horizontal simulation-form" action="{{ $action == 'add' ? route('documents.article.toAdd') : route('documents.article.toEdit') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <!-- _id & guid & provider_id -->
                            @include('document.form.hidden', ['action' => $action, 'item' => $item])
                            
                            <fieldset>
                                <div class="form-group">
                                    <!--标题-->
                                    @include('document.form.title', ['item' => $item])
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
                                    <label class="col-md-2 control-label">作者</label>
                                    <div class="col-md-5">
                                        <input name="Document[author]" class="form-control" id="author" type="text" value="@if(null !== old('Document')['author']){{ old('Document')['author'] }}@else{{ $item['Document']['author'] }}@endif">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">作者来源</label>
                                    <div class="col-md-5">
                                        <input name="Document[firm]" class="form-control" id="firm" type="text" value="@if(null !== old('Document')['firm']){{ old('Document')['firm'] }}@else{{ isset($item['Document']['firm']) ? $item['Document']['firm'] : '' }}@endif">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">作者电话</label>
                                    <div class="col-md-5">
                                        <input name="Document[consultant_tel]" class="form-control" id="consultant_tel" type="text" value="@if(null !== old('Document')['consultant_tel']){{ old('Document')['consultant_tel'] }}@else{{ $item['Document']['consultant_tel'] }}@endif">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">作者邮箱</label>
                                    <div class="col-md-5">
                                        <input name="Document[consultant_mail]" class="form-control" id="consultant_mail" type="text" value="@if(null !== old('Document')['consultant_mail']){{ old('Document')['consultant_mail'] }}@else{{ $item['Document']['consultant_mail'] }}@endif">
                                    </div>
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
                                    <label class="col-md-2 control-label">摘要</label>
                                    <div class="col-md-10">
                                        <textarea name="Document[abstract]" style="resize: none; height: 110px;" class="form-control" id="abstract">@if(null !== old('Document')['abstract']){{ old('Document')['abstract'] }}@else{{ $item['Document']['abstract'] }}@endif</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <!--内容-->
                                    @include('document.form.content', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--附件上传-->
                                    @include('document.form.upload_attachments', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--submit buttons-->
                                    @include('document.form.submit', ['route' => 'documents.article.index'])
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
    @include('document.form.js', ['item' => $item, 'regions' => []])
@endsection