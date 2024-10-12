@extends('front.layout.main')

@section('main')
    @include('front.layout.header')
    <main class="index-main">
        <section class="gallery-category">
            <h1>Beiträge<sub>Neueste Beiträge</sub></h1>
            <div class="gallery-category__body grid-layout">
                @foreach($posts as $post)
                    @if($loop->index % 10 == 0) <!-- شروع یک گروه جدید بعد از هر 10 پست -->
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
