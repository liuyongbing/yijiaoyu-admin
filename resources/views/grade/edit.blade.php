@extends('document.document')

@section('title', '新闻管理 - 编辑新闻')

@section('content')
    @include('document.left_navbar', ['leftNavbarActive'=>'news_list', 'type' => 'news'])

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                        班级
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
                        
                        </div>
                    </div>
                    <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                        <form class="form-horizontal" action="{{ route('grades.update', ['id' => $item['id']]) }}" method="post" enctype="multipart/form-data">
                        
                            <input name="_method" type="hidden" value="PUT">

                            {{ csrf_field() }}
                            
                            <fieldset>
                                <div class="form-group">
                                    <!--标题-->
                                    @include('form.title', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--排序-->
                                    @include('form.sort', ['item' => $item])
                                </div>
                                
                                <div class="form-group">
                                    <!--对应翻译文章ID-->
                                </div>
                                
                                <div class="form-group">
                                    <!--submit buttons-->
                                    @include('form.submit', ['route' => 'grades.index'])
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

@endsection