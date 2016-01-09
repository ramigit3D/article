@extends('admin')
@section('contain')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit : {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-6">
            
                {!! Form::model($article , ['method' => 'PATCH', 'action' => ['ArticlesController@update' , $article->id]]) !!}
                @include('admin.articles.form', ['submitButtonText' => 'Update Article'])
                {!! Form::close() !!}
                
                @include('errors.list')
            </div>
        </div>
    </div>

@stop
