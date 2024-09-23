@extends('front.layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('landing/assets/css/header.css')  }}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/category.css')  }}">
@endsection

@section('main')
    @include('front.layout.header')

    <main class="category-main">
        <div class="category-main_gallery__description">
            <p>
                Kategorie {{ $categories->name  }}
            </p>
        </div>
        <section class="category-main_gallery">
            <div class="category-main_gallery__title">
                <h1>Natur</h1>
                <h5>Diese Kategorisierung wurde am <span>5. Mai 2020</span> erstellt.</h5>
            </div>
            <div class="category-main_gallery__body">
                <div class="column">
                    @foreach($posts as $post)
                        @if($post->video)
                            <div class="column__photo">
                                <figure>
                                    <figcaption>{{ $post->title  }}</figcaption>
                                    <a href="{{ $post->path()  }}">
                                        <video autoplay loop>
                                            <source src="{{ $post->getVideo()  }}" type="video/mp4">
                                            {{ $post->content  }}
                                        </video>
                                    </a>
                                    <div class="image-info">
                                        <div class="comment-counter">
                                            Anzahl der Kommentare :
                                            <span>
                                            @php
                                                $count = $post->loadCount('comments') ;
                                            @endphp
                                                {{ $post->comments_count }}
                                        </span>
                                            <span>Kommentar</span>
                                        </div>
{{--                                        <div class="rating-show">--}}
{{--                                              <span class="rating-star checked">--}}
{{--                                                ★--}}
{{--                                              </span>--}}
{{--                                                                        <span class="rating-star checked">--}}
{{--                                                ★--}}
{{--                                              </span>--}}
{{--                                                                        <span class="rating-star">--}}
{{--                                                ★--}}
{{--                                              </span>--}}
{{--                                                                        <span class="rating-star">--}}
{{--                                                ★--}}
{{--                                              </span>--}}
{{--                                                                        <span class="rating-star">--}}
{{--                                                ★--}}
{{--                                              </span>--}}
{{--                                        </div>--}}
                                    </div>
                                </figure>
                            </div>
                        @endif
                        <div class="column__photo">
                            <figure>
                                <a href="{{ $post->path()  }}">
                                    <figcaption>{{ $post->title  }}
                                    </figcaption>
                                </a>
                                <a href="{{  $post->path()  }}"><img src="{{ $post->getImagethree()  }}" alt=""></a>
                                <div class="image-info">
                                    <div class="comment-counter">
                                        Anzahl der Kommentare :
                                        <span>
                                            @php
                                            $count = $post->loadCount('comments') ;
                                            @endphp
                                            {{ $post->comments_count }}
                                        </span>
                                        Kommentar</span>
                                    </div>
                                    <div class="rating-show">
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
                                    </div>
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
