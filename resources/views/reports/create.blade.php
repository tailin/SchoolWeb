@extends('layouts.master')

@section('page-title', '新增處室報告')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('home.index') }}">首頁</a></li>
                <li><a href="{{ route('mornings.index') }}">會議文稿</a></li>
                <li><a href="{{url('/mornings/'.$morning->id)}}">{{ $morning->name }}</a></li>
                <li class="active">新增處室報告</li>
            </ol>
            <div class="page-header">
                <h1>
                    {{ $morning->name }}
                    <small>
                        <span class="glyphicon glyphicon-time"></span>
                        建立時間{{ $morning->created_at->format('Y/m/d') }}
                    </small>
                </h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @include('layouts.partials.alert')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ auth()->user()->job_title }}</h4>
                </div>
                <div class="panel-body forum-content">
                    {{ Form::open(['route' => 'reports.store', 'method' => 'POST', 'files' => true]) }}
                    <div class="form-group">
                     <label for="content">內文*：</label>
                        {{ Form::textarea('content', null, ['id' => 'content', 'class' => 'form-control', 'rows' => 10, 'placeholder' => '請輸入內容']) }}
                    </div>
                        {{ Form::hidden('morning_id', $morning->id) }}
                    <label for="file">附檔：</label>
                    <input name="upload[]" type="file" multiple>
                    <div class="text-right">
                        <a href="{{url('/mornings/'.$morning->id)}}" class="btn btn-link">返回</a>
                        <button type="submit" class="btn btn-success">新增報告</button>
                    </div>
                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    附檔可多選，單檔超過5MB將略過不上傳。
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="well">
                <h4>編輯提示</h4>
                <div>
                    <ul>
                        <li>使用 -*想要提醒的字*- <br>
                            會變成 <font color="red"><strong>想要提醒的字</strong></font></li>
                        <li>教師晨會當日中午後，將鎖定不得再更改。</li>
                        <li>校務會議當日凌晨後，將鎖定不得再更改。</li>
                        <li>附檔單個超過5MB將自動略過不上傳。</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection