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
                @if($posts->image)
                    <div class="image-show-box">
                        <figure>
                        <img src="{{ $posts->getImageUrl() }}" alt="{{ $posts->title  }}">
                        </figure>
                    </div>
                @elseif($posts->video)
                    <div class="image-show-box">
                        <figure>
                            <video autoplay loop controls>
                                <source src="{{ $posts->getVideo() }}" type="video/mp4">
                                {{ $posts->title }}
                            </video>
                        </figure>
                    </div>
                @endif
            </div>
            <div class="image-info">
                <div class="image-caption imginfolg">
                    <h1>
                        {{ $posts->title  }}
                    </h1>
                </div>
                <div class="image-rating imginfolg">
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
                            @auth
                                <livewire:post-rating :post="$posts"/>
                            @endauth
                            @guest
                                <div style="margin-top: 2px ; margin-bottom: 2px">
                                    <a href="{{ route('login')  }}">
                                    <span style="color: wheat ; border: 1px solid rgba(250, 250, 250, .05)  ;
                                    background-color: rgba(250, 250, 250, .05);
                                     border-radius: 5px;
                                     padding: 3px;
                                      font-size: x-small">
                                        Melden Sie sich an, um zu bewerten
                                    </span>
                                    </a>
                                </div>

                            @endguest
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
