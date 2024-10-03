@extends('front.layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('landing/assets/css/header.css')  }}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/single.css')  }}">

@endsection

@section('main')
    @include('front.layout.header')
    <main class="single-main">
        <section class="single-main__container">
            <div class="image-caption imginfosm">
                <h1>
                    {{ $posts->title  }}
                </h1>
            </div>
            <div class="image-rating imginfosm">
                <div class="rating-show">
                          <span class="rating-star checked">
                            ★
                          </span>
                                    <span class="rating-star checked">
                            ★
                          </span>
                                    <span class="rating-star">
                            ★
                          </span>
                                    <span class="rating-star">
                            ★
                          </span>
                                    <span class="rating-star">
                            ★
                          </span>
                </div>
            </div>
            <div class="image-show">
                <div class="image-show-box">
                    <figure>
                        <img src="{{ $posts->getImageUrl() }}" alt="{{ $posts->title  }}">
                    </figure>
                </div>
            </div>
            <div class="image-info">
                <div class="image-caption imginfolg">
                    <h1>
                        {{ $posts->title  }}
                    </h1>
                </div>

{{--                <div class="image-rating imginfolg">--}}
{{--                    <span>   {{ number_format($posts->averageRating(), 1) }}</span>--}}
{{--                    <div class="rating-show">--}}
{{--                        <span class="rating-star checked">--}}
{{--                          ★--}}
{{--                        </span>--}}
{{--                        <span class="rating-star checked">--}}
{{--                              ★--}}
{{--                            </span>--}}
{{--                        <span class="rating-star">--}}
{{--                              ★--}}
{{--                            </span>--}}
{{--                        <span class="rating-star">--}}
{{--                              ★--}}
{{--                            </span>--}}
{{--                        <span class="rating-star">--}}
{{--                              ★--}}
{{--                            </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="image-rating imginfolg">
                    <span>{{ number_format($posts->averageRating(), 1) }}</span>
                    <div class="rating-show">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="rating-star {{ $i <= $posts->averageRating() ? 'checked' : '' }}">
                                ★
                            </span>
                        @endfor
                    </div>
                </div>
                <div class="image-comment">
                    <h3>Ihre Ansicht</h3>
                    <div class="lcomment">
                        <form action="{{ route("panel.comments.store") }}" method="post">
                            @csrf
                            <div class="title">einen Kommentar hinterlassen</div>
                            <textarea name="body" id="" placeholder="Ihr Kommentar"></textarea>
                            <input type="hidden" name="commentable_type" value="{{ get_class($posts) }}">
                            <input type="hidden" name="commentable_id" value="{{ $posts->id }}">
                            <livewire:post-rating :post="$posts" />

                            <button type="submit">Registrieren Sie einen Kommentar</button>
                        </form>
                    </div>
                    <div class="comment-body">
                        @foreach($posts->comments as $comment)
                            <div class="box">
                                <div class="writer-name">
                                    <div class="writer-name_f">
                                        <h4>{{ $comment->user->name  }}</h4>
                                        <button id="answerC">Antwort</button>
                                    </div>
                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="writer-rating">
                                    {{--                                    <div class="rating-show">--}}
                                    {{--                                                                      <span class="rating-star checked">--}}
                                    {{--                                                                        ★--}}
                                    {{--                                                                      </span>--}}
                                    {{--                                        <span class="rating-star checked">--}}
                                    {{--                                                                        ★--}}
                                    {{--                                                                      </span>--}}
                                    {{--                                        <span class="rating-star">--}}
                                    {{--                                                                        ★--}}
                                    {{--                                                                      </span>--}}
                                    {{--                                        <span class="rating-star">--}}
                                    {{--                                                                        ★--}}
                                    {{--                                                                      </span>--}}
                                    {{--                                        <span class="rating-star">--}}
                                    {{--                                                                        ★--}}
                                    {{--                                                                      </span>--}}
                                    {{--                                    </div>--}}
                                </div>
                                <div class="writer-text">
                                    <p>
                                        {{ $comment->body  }}
                                    </p>
                                </div>
                                <div class="awbox">
                                    <form action="{{ route("panel.comments.store") }}" method="post">
                                        @csrf
                                        <textarea name="body" id="" placeholder="Ihr Kommentar"></textarea>
                                        <input type="hidden" name="commentable_type" value="{{ get_class($posts) }}">
                                        <input type="hidden" name="commentable_id" value="{{ $posts->id }}">
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <button type="submit">Antwort</button>
                                    </form>
                                </div>
                            </div>
                            @foreach($comment->reply as $item)
                                <div class="box aw">
                                    <div class="writer-name">
                                        <div class="writer-name_f">
                                            <h4>{{ $item->user->name  }}</h4>
                                        </div>
                                        <span>{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="writer-text">
                                        <p>
                                            {{ $item->body  }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
@section('js')
    <script src="{{ asset('landing/assets/javaScript/single.js')  }}"></script>
@endsection
