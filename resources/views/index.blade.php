


@extends('app')
@section('container')
    <div class="center">
        <h2>{{ trans('app.title') }}</h2>
    </div>

    <div class="blog">
        <div class="row">
             <div class="col-md-8">
                 
                @forelse($articles as $article)
                <?php $user1 = \Sentinel::findById($article->user_id) ?>
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2 text-center">
                                <div class="entry-meta">
                                    <span id="publish_date">{{ Carbon\Carbon::parse($article->published_at)->format('j M')}}</span>
                                    <span><i class="fa fa-user"></i> {{ $user1->first_name }}</span>
                                </div>
                            </div>
                   
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="{{ '/article/'.$article->id }}"><img class="img-responsive img-blog" src="/images/blog/blog1.jpg" width="100%" alt="" /></a>
                                <h2><a href="{{ '/article/'.$article->id }}">{{ $article->title }}</a></h2>
                                <h3>{{ str_limit($article->body, 255) }}</h3>
                                <a class="btn btn-primary readmore" href="blog-item.html">{{ trans('app.read') }} <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div>
                    
                @empty
                @endforelse
                    
                    
                {!! $articles->links() !!}
            </div><!--/.col-md-8-->

            <aside class="col-md-4">
                <div class="widget search">
                    <form role="form">
                            <input type="text" class="form-control search_box" autocomplete="off" placeholder="{{ trans('app.search') }}">
                    </form>
                </div><!--/.search-->
				
				
               
                <div class="widget categories">
                    <h3>Categories</h3>
                     @forelse($tags as $tag)
                     <?php $nb = $tag->articles()->where('tag_id','=', $tag->id)->count() ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category">
                                <li><a href="{{ '/article/tag/'.$tag->id  }}">{{ $tag->name }} <span class="badge">{{ $nb }}</span></a></li>
                        </div>
                    </div> 
                    	@empty
                @endforelse
                </div><!--/.categories-->
		
				
                
				
				
			</aside>  
        </div><!--/.row-->
    </div>
@stop