@extends('admin')
@section('contain')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Article</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-6">
                {!! Form::model($article = new App\Article ,['url' => 'articles']) !!}
                @include('admin.articles.form', ['submitButtonText' => 'Add Article'])
                
                {!! Form::close() !!}
                
                
                @include('errors.list')
            </div>
        </div>
    </div>
    
      
@stop