@extends('document.document')

@section('title', '判决文书管理 - 批量导入判决文书')

@section('content')
    @include('document.left_navbar', ['leftNavbarActive'=>'case_import', 'type' => 'case'])

    <div class="col-md-10">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>批量导入判决文书</h1>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="{{ route('documents.case.import') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="returnList" value="1" />
                    <input type="hidden" name="step" value="1" />
                    @if (!empty($importResult))
                    <div>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>
                            @if (!empty($importResult['message']))
                                <span class="help-block">{{ $importResult['message'] }}</span>
                            @endif
                            @if ( isset($importResult['success']) && isset($importResult['failure']) )
                                <span class="help-block">
                                @if ($step == 1)批量导入数据@elseif($step == 2)批量入库@endif
                                成功: {{ $importResult['success'] }}条， 失败： {{ $importResult['failure'] }}条。
                                </span>
                            @endif
                            </h4>
                        </div>
                    </div>
                    @endif
                    
                    <div>
                        {{ csrf_field() }}
                        <input type="file" name="import_xml" />
                        文件大小不可以超过5M<br />
                        <button class="btn btn-sm btn-primary">
                            <b>导入数据</b>
                        </button>
                    </div>
                </form>
                
                <form class="form-inline" action="{{ route('documents.case.import') }}" method="get" >
                    <input type="hidden" name="returnList" value="1" />
                    <i class="glyphicon glyphicon-search"></i>
                    &nbsp;<b>导入日期</b>
                    从 <input type="text" name="start_time" class="form-control datepicker" style="width: 100px;" />
                    至 <input type="text" name="end_time" class="form-control datepicker" style="width: 100px;" />
                    &nbsp;<b>ID</b>
                    <input style="width: 220px;" type="text" name="guid" class="form-control" type="text" value="{{ $filters['guid'] }}">
                    &nbsp;<b>标题</b>
                    <input style="width: 220px;" type="text" name="title" class="form-control" type="text" value="{{ $filters['title'] }}">
                    <button class="btn btn-sm btn-primary">
                        <b>Search</b>
                    </button>
                </form>
            </div>
        </div>
        <br />
        
        <div class="row">
        @if (!empty($items))
            <form class="form-inline" action="{{ route('documents.case.import') }}" method="post" enctype="multipart/form-data" >
            <div class="col-md-12">
                {{ csrf_field() }}
                <input type="hidden" name="step" value="2" />
                <button class="btn btn-sm btn-primary">
                    <b>批量入库</b>
                </button>
            </div>
            <br />
            
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="bootstrap-admin-panel-content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>全选<input type="checkbox" name="checkall" id="checkall" /></th>
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
                                        <td><input type="checkbox" name="guids[]" value="{{ $item['guid'] }}" /></td>
                                        <td>{{ $item['guid'] }}</td>
                                        <td><a title="{{$item['title']}}" href="{{ route('documents.case.edit', $item['_id']) }}" target="_blank">{{ \App\Helpers\StringHelper::subtitle_cn($item['title'], 58) }}</a></td>
                                        <td style="min-width: 94px;">{{ $item['promulgation_date'] }}</td>
                                        <td>{{ $item['issue_no'] }}</td>
                                        <td style="word-break: break-all;">
                                            {!! implode('<br />', \App\Helpers\SystemHelper::caseCauseFormat($caseCates, $item['case_cause_id'], $item['lang'])) !!}
                                        </td>
                                        <td style="min-width: 86px;">{{ $item['promulgator'] }}</td>
                                        <td>
                                            <a href="{{ route('documents.case.edit', $item['_id']) }}" class="btn btn-sm btn-primary" target="_blank">编辑</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </form>
        @endif
        </div>
        @include('layouts.pagination', ['routeName'=>'documents.case.import', 'count'=>$itemsCount, 'page'=>$page_num, 'size' => $pageSize, 'filters' => $filters])
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        //批量入库全选操作
        $('input[name="checkall"]').click(function() {
            if ($(this).is(':checked')) {
                $('input[name="guids[]"]').each(function() {
                    //此处如果用attr，会出现第三次失效的情况
                    $(this).prop("checked", true);
                });
            } else {
                $('input[name="guids[]"]').each(function() {
                    $(this).removeAttr("checked",false);
                });
            }
        });
    });
</script>
@endsection
