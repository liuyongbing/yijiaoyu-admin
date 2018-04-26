@extends('document.log.log')

@if($contentType == 'law')
    @section('title', '内容管理 - 法律法规导入日志')
@elseif($contentType == 'news')
    @section('title', '内容管理 - 新闻导入日志')
@elseif($contentType == 'case')
    @section('title', '内容管理 - 案例导入日志')
@elseif($contentType == 'article')
    @section('title', '内容管理 - 法律评论导入日志')
@endif

@section('content')

    <div class="col-md-10">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>{{ trans('document.' . $contentType) }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">
                            上传XML记录（30日内记录）
                        </div>
                        <div class="pull-right"><span class="badge"></span></div>
                    </div>
                    <div class="bootstrap-admin-panel-content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>上传时间</th>
                                    <th>下载上传ID</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($documentLogList))
                                @foreach($documentLogList as $dcoumentLog)
                                    <tr>
                                        <td>{{ $dcoumentLog['created_at'] }}</td>
                                        <td>
                                            <a href="{{ route('documents.download_txt', [
                                                'created_at' => $dcoumentLog['created_at'],
                                                'content_type' => $contentType
                                            ]) }}">
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="glyphicon glyphicon-download"></i>
                                                    下载上传日志文件
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
    </div>
@endsection


