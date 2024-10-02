@extends('front.layout.main')

@section('main')
    @include('front.layout.header')
    <main class="index-main">
        <section class="gallery-category">
            <h1> Beiträge<sub>Neueste Beiträge </sub></h1>
            <div class="gallery-category__body">
                <div class="column">
                   @foreach($posts as $post )
                       @if($post->video)
                            <div class="column__photo">
                                <figure>
                                    <figcaption>Bildunterschrift</figcaption>
                                    <a href="">
                                        <video autoplay loop>
                                            <source src="{{ $post->getVideo()  }}" type="video/mp4">
                                            {{ $post->title  }}
                                        </video>
                                    </a>
                                    <div class="image-info">
                                        <div class="comment-counter">
                                            Anzahl der Kommentare : <span>{{ $comments_count  }}</span><span>Kommentar</span>
                                        </div>
{{--                                        <div class="rating-show">--}}
{{--                                                  <span class="rating-star checked">--}}
{{--                                                    ★--}}
{{--                                                  </span>--}}
{{--                                                        <span class="rating-star checked">--}}
{{--                                                    ★--}}
{{--                                                  </span>--}}
{{--                                                        <span class="rating-star">--}}
{{--                                                    ★--}}
{{--                                                  </span>--}}
{{--                                                        <span class="rating-star">--}}
{{--                                                    ★--}}
{{--                                                  </span>--}}
{{--                                                        <span class="rating-star">--}}
{{--                                                    ★--}}
{{--                                                  </span>--}}
{{--                                        </div>--}}
                                    </div>
                                </figure>
                            </div>
                        @endif
                        <div class="column__photo">
                            <figure>
                                <figcaption>{{ $post->title  }}</figcaption>
                                <a href="{{ $post->path()  }}"><img src="{{ $post->getImageUrl()  }}" alt="{{ $post->title  }}"></a>
                                <div class="image-info">
                                    <div class="comment-counter">
                                        Anzahl der Kommentare : <span>{{ $post->comments_count  }}</span><span>Kommentar</span>
                                    </div>
{{--                                    <div class="rating-show">--}}
{{--                                          <span class="rating-star checked">--}}
{{--                                            ★--}}
{{--                                          </span>--}}
{{--                                                                <span class="rating-star checked">--}}
{{--                                            ★--}}
{{--                                          </span>--}}
{{--                                                                <span class="rating-star">--}}
{{--                                            ★--}}
{{--                                          </span>--}}
{{--                                                                <span class="rating-star">--}}
{{--                                            ★--}}
{{--                                          </span>--}}
{{--                                                                <span class="rating-star">--}}
{{--                                            ★--}}
{{--                                          </span>--}}
{{--                                    </div>--}}
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
