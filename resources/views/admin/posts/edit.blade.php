@extends('admin.layouts.master')

@section('title', '編輯文章')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            編輯文章 <small>編輯文章內容</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 文章管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
        </div>
    </div>
</div>
<!-- /.row -->
<form action="/admin/posts/{{ $post->id }}" method="POST" role="form">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="form-group">
        <label>標題：</label>
        <input name="title" class="form-control" placeholder="請輸入文章標題" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label>內容：</label>
        <textarea name="content" class="form-control" rows="10">{{$post->content}}</textarea>
    </div>
    <div class="form-group">
        <label>精選？</label>
        <select name="is_feature" class="form-control" >
            <option value="0" {{ $post->is_feature?'':'SELECTED' }}>否</option>
            <option value="1" {{ $post->is_feature?'SELECTED':'' }}>是</option>
        </select>
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-success">更新</button>
    </div>
</form>

<!-- /.row -->
@endsection
