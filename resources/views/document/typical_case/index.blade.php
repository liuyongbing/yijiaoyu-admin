@extends('document.document')

@section('title', '经典案例管理 - 经典案例列表')

@section('content')
    @include('document.left_navbar', ['leftNavbarActive'=>'typical_case_list', 'type' => 'typical_case'])
    <style>
        #tpc-panel .col-md-12{
            width:auto;
        }
    </style>
    <div id='tpc-panel'  class="col-md-10">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>经典案例</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="{{ route('documents.typical_case.index') }}">
                    <i class="glyphicon glyphicon-search"></i>

                    <!--ID-->
                    @include('document.form.search_filter.guid', ['filters' => $filters])
                    
                    <!--标题-->
                    @include('document.form.search_filter.title', ['filters' => $filters])
                    
                    <!--是否英文-->
                    @include('document.form.search_filter.language', ['filters' => $filters])
                    
                    <!--是否显示-->
                    @include('document.form.search_filter.visibility', ['filters' => $filters])
                    
                    <button class="btn btn-sm btn-primary">
                        <b>Search</b>
                    </button>
                </form>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('documents.typical_case.add') }}" class="btn btn-success btn-sm" target="_blank">
                    <i class="glyphicon glyphicon-plus glyphicon-white"></i> 新增经典案例
                </a>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">列表</div>
                        <div class="pull-right"><span class="badge"></span></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>发文日期</th>
                                    <th style="min-width: 45px;">文号</th>
                                    <th>案由</th>
                                    <th>发文机关</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($items))
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item['guid'] }}</td>
                                        <td><a title="{{$item['title']}}" href="{{ route('documents.typical_case.edit', $item['_id']) }}" target="_blank">{{ \App\Helpers\StringHelper::subtitle_cn($item['title'], 58) }}</a></td>
                                        <td style="min-width: 94px;">{{ $item['promulgation_date'] }}</td>
                                        <td>{{ $item['issue_no'] }}</td>
                                        <td style="word-break: break-all;">
                                            {!! implode('<br />', \App\Helpers\SystemHelper::caseCauseFormat($caseCates, $item['case_cause_id'], $item['lang'])) !!}
                                        </td>
                                        <td style="min-width: 86px;">{{ $item['promulgator'] }}</td>
                                        <td>
                                            <a href="{{ route('documents.typical_case.edit', $item['_id']) }}" target="_blank">
                                                <button class="btn btn-sm btn-primary">
                                                    编辑
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.pagination', ['routeName'=>'documents.typical_case.index', 'count'=>$itemsCount, 'page'=>$page_num, 'size' => $pageSize, 'filters' => $filters])
    </div>
@endsection


