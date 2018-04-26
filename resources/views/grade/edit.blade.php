@extends('document.document')

@section('title', '新闻管理 - 编辑新闻')

@section('content')
    @include('document.left_navbar', ['leftNavbarActive'=>'news_list', 'type' => 'news'])

    <div class="col-md-10">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                    @if($action == 'add')
                    新增新闻
                    @else
                    编辑新闻
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
                            新增新闻
                        @else
                            编辑新闻
                        @endif
                        </div>
                    </div>
                    <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                        <form class="form-horizontal" action="{{ $action == 'add' ? route('documents.news.toAdd') : route('documents.news.toEdit') }}" method="post" enctype="multipart/form-data">
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
                                
                                <div class="form-group">
                                    <!--submit buttons-->
                                    @include('document.form.submit', ['route' => 'documents.news.index'])
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