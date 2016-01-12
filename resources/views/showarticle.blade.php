
@extends('app')
@section('container')
    <div class="center">
        <h2>{{ trans('app.title') }}</h2>
    </div>
    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-item">
                    <?php $user1 = \Sentinel::findById($article->user_id) ?>
                    <img class="img-responsive img-blog" src="/images/blog/blog1.jpg" width="100%" alt="" />
                    <div class="row">  
                        <div class="col-xs-12 col-sm-2 text-center">
                            <div class="entry-meta">
                                <span id="publish_date">{{ Carbon\Carbon::parse($article->published_at)->format('j M')}}</span>
                                <span><i class="fa fa-user"></i>  {{ $user1->first_name }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 blog-content">
                            <h2>{{ $article->title }}</h2>
                            {{ $article->body }}
                            <div class="post-tags">
                                <strong>Tag:</strong> 
                                
                                
                                @unless ($article->tags->isEmpty())
                               
                                <ul>
                                @foreach ($article->tags as $tag)
                                <a href="{{ '/article/tag/'.$tag->id  }}"><li> {{ $tag->name }}</li></a>
                                @endforeach
                                </ul>
                                
                                @endif
            
                            </div>
                        </div>
                    </div>
                </div><!--/.blog-item-->
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
                                <li><a href="#">{{ $tag->name }} <span class="badge">{{ $nb }}</span></a></li>
                            </div>
                        </div> 
                        @empty
                    @endforelse
                </div><!--/.categories-->
            </aside>  
        </div><!--/.row-->
    </div>
    @stop