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
                <h1>{{ $categories->name  }}</h1>

                <h5>Diese Kategorisierung wurde am
                    <span>{{  Carbon\Carbon::create($categories->created_at)->format('j. F Y') }}</span>
                    erstellt.</h5>
            </div>
            <div class="category-main_gallery__body">
                @foreach($posts as $post)
                    @if($loop->index % 10 == 0)
                    <div class="row">
                        @endif

                        <div class="column__photo">
                            @if($post->video)
                                <figure>
                                    <figcaption>{{ $post->title }}</figcaption>
                                    <a href="{{ $post->path() }}">
                                        <video autoplay loop>
                                            <source src="{{ $post->getVideo() }}" type="video/mp4">
                                            {{ $post->title }}
                                        </video>
                                    </a>
                                    <div class="image-info">
                                        <div class="comment-counter">
                                            Anzahl der Kommentare:
                                            <span>{{ $post->comments_count }}</span><span>Kommentar</span>
                                        </div>
                                        <div class="rating-show">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="rating-star {{ $i <= $post->averageRating() ? 'checked' : '' }}">★</span>
                                            @endfor
                                        </div>
                                    </div>
                                </figure>
                            @elseif($post->getImageUrl())
                                <figure>
                                    <figcaption>{{ $post->title }}</figcaption>
                                    <a href="{{ $post->path() }}"><img src="{{ $post->getImageUrl() }}" alt="{{ $post->title }}"></a>
                                    <div class="image-info">
                                        <div class="comment-counter">
                                            Anzahl der Kommentare:
                                            <span>{{ $post->comments_count }}</span><span>Kommentar</span>
                                        </div>
                                        <div class="rating-show">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="rating-star {{ $i <= $post->averageRating() ? 'checked' : '' }}">★</span>
                                            @endfor
                                        </div>
                                    </div>
                                </figure>
                            @endif
                        </div>

                        @if($loop->index % 10 == 9 || $loop->last)
                    </div>
                    @endif
                @endforeach

            </div>
        </section>
    </main>
@endsection
