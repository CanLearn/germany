@extends('front.layout.main')

@section('main')
    @include('front.layout.header')
    <main class="index-main">
        <section class="gallery-category">
            <h1> Beiträge<sub>Neueste Beiträge </sub></h1>
            <div class="gallery-category__body">
                @foreach($posts as $post)
                    @if($loop->first || $loop->iteration % 10 == 1)
                        <!-- شروع یک ستون جدید -->
                        <div class="column">
                            @endif

                            <div class="column__photo">
                                @if($post->video)
                                    <figure>
                                        <figcaption>{{ $post->title }}</figcaption>
                                        <a href="">
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
                                                <div class="rating-show">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span class="rating-star {{ $i <= $post->averageRating() ? 'checked' : '' }}">★</span>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                @endif
                                <figure>
                                    <figcaption>{{ $post->title }}</figcaption>
                                    <a href="{{ $post->path() }}"><img src="{{ $post->getImageUrl() }}" alt="{{ $post->title }}"></a>
                                    <div class="image-info">
                                        <div class="comment-counter">
                                            Anzahl der Kommentare:
                                            <span>{{ $post->comments_count }}</span><span>Kommentar</span>
                                        </div>
                                        <div class="rating-show">
                                            <div class="rating-show">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span class="rating-star {{ $i <= $post->averageRating() ? 'checked' : '' }}">★</span>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>

                            @if($loop->iteration % 10 == 0 || $loop->last)
                                <!-- پایان ستون -->
                        </div>
                    @endif
                @endforeach

            </div>
        </section>
    </main>
@endsection
