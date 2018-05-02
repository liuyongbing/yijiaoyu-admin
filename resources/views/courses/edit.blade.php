@extends('layouts.main')

@section('title', trans('page_titles.edit', ['model' => trans('models.' . $route)]))

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>{{ trans('models.' . $route) }}</h1>
                </div>
            </div>
        </div>

        @include('layouts.input_errors')
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default bootstrap-admin-no-table-panel">
                    <div class="panel-heading">
                        <div class="text-muted bootstrap-admin-box-title">
                            {{ trans('actions.edit') }}
                        </div>
                    </div>
                    <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                        <form class="form-horizontal" action="{{ route( $route . '.update', ['id' => $item['id']]) }}" method="post" enctype="multipart/form-data">
                        
                            <input name="_method" type="hidden" value="PUT">
                            
                            @include($route . '.inputs', [
                                'item' => $item,
                                'route' => $route,
                                'grades' => $grades
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('script')

@endsection