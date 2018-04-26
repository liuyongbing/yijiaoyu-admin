@extends('document.document')

@section('title', '新闻管理 - 新闻列表')

@section('content')
    @include('document.left_navbar', ['leftNavbarActive'=>'news_list', 'type' => 'news'])

    <div class="col-md-10">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>新闻</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="{{ route('grades.index') }}">
                    <i class="glyphicon glyphicon-search"></i>
                    <button class="btn btn-sm btn-primary">
                        <b>Search</b>
                    </button>
                </form>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('grades.create') }}" class="btn btn-success btn-sm">
                    <i class="glyphicon glyphicon-plus glyphicon-white"></i> 新增新闻
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
                                    <th>名称</th>
                                    <th>排序</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td><a title="{{$item['title']}}" href="{{ route('grades.edit', $item['id']) }}" target="_blank">{{ $item['title'] }}</a></td>
                                        <td>{{ $item['sort'] }}</td>
                                        <td>
                                            <a href="{{ route('grades.edit', $item['id']) }}" target="_blank">
                                                <button class="btn btn-sm btn-primary">
                                                    编辑
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.pagination', ['routeName'=>'grades.index', 'count'=>$itemsCount, 'page'=>$page_num, 'size' => $pageSize, 'filters' => $filters])
    </div>
@endsection


