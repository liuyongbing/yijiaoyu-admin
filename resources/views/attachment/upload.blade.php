@extends('document.document')

@section('title', '新闻管理 - 新闻列表')

@section('content')
    <div style="width: 600px; height: 300px; border: 1px solid #F00">
        <form action="{{ route('attachment.upload') }}" method="post" enctype="multipart/form-data" >
            <input name="csrf-token" value="{{ csrf_token() }}" />
            {{ csrf_field() }}
            <input type="file" name="my_file" />
            <input type="submit" name="submit" value="Submit" />
        </form>
    </div>
@endsection


