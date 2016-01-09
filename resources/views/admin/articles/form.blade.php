<div class="form-group">

    {!! Form::label('title','Title') !!}
    {!! Form::text('title', null, ['class'=> 'form-control','id'=> 'exampleInputEmail', 'placeholder'=> 'Title']) !!}

</div>
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-lg-offset-1">
            {!! Form::radio('lang', 'en', ['id'=> 'english'] ) !!}
            {!! Form::label('english', 'English', [ 'class'=> 'checkbox-inline' ]) !!}
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-lg-offset-1" >
            {!! Form::radio('lang', 'fr', ['id'=> 'french'] ) !!}
            {!! Form::label('french', 'French', [ 'class'=> 'checkbox-inline' ]) !!}
        </div>
    </div>
</div>

<div class="form-group">

    {!! Form::label('body','Body:') !!}
    {!! Form::textarea('body', null, ['class'=> 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('published_at','Published on:') !!}
    {!! Form::input('text', 'published_at', Carbon\Carbon::parse($article->published_at)->format('d-m-Y'), ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('tag_list','Tags:') !!}
    {!! Form::select('tag_list[]', $tags, $article->tag_list->toArray(), ['id' => 'tag_list', 'class' => 'form-control', 'multiple'] ) !!}

</div>

<div class="form-group">

    {!!Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control' ]) !!}

</div>





@push('addscript')
    <script type="text/javascript">
    
        $('#tag_list').select2({
            placeholder: 'Choose a tag'
        
        });
        
    </script>
    <script>
    
        $(function() {
            $("#published_at").datepicker({ dateFormat: 'd-m-yy'});
        });
        
    </script>
@endpush