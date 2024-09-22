@extends('front.layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('landing/assets/css/header.css')  }}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/category.css')  }}">
@endsection

@section('main')
    @include('front.layout.header')
    <main class="single-main">
        <section class="single-main__container">
            <div class="image-caption imginfosm">
                <h1>Grüße aus einer Welt, die in der Natur mit diesem treuen Freund entstanden ist.</h1>
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
                        <img src="assets/images/a1.jpg" alt="">
                    </figure>
                </div>
                <div class="image-show-box">
                    <figure>
                        <img src="assets/images/a3.jpg" alt="">
                    </figure>
                </div>
                <div class="image-show-box">
                    <figure>
                        <img src="assets/images/a5.jpg" alt="">
                    </figure>
                </div>
            </div>
            <div class="image-info">
                <div class="image-caption imginfolg">
                    <h1>Grüße aus einer Welt, die in der Natur mit diesem treuen Freund entstanden ist.</h1>
                </div>
                <div class="image-rating imginfolg">
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
                <div class="image-comment">
                    <h3>Ihre Ansicht</h3>
                    <div class="lcomment">
                        <form action="#">
                            <input class="username" type="text" name="" id="" placeholder="Ihr Name">
                            <div class="title">einen Kommentar hinterlassen</div>
                            <textarea name="" id="" placeholder="Ihr Kommentar"></textarea>
                            <div class="title">Ihre Bewertung</div>
                            <div class="rating">
                                <input value="1" name="rate" id="star1" type="radio">
                                <label for="star1"></label>
                                <input value="2" name="rate" id="star2" type="radio">
                                <label for="star2"></label>
                                <input value="3" name="rate" id="star3" type="radio">
                                <label for="star3"></label>
                                <input value="4" name="rate" id="star4" type="radio">
                                <label for="star4"></label>
                                <input value="5" name="rate" id="star5" type="radio">
                                <label for="star5"></label>
                            </div>
                            <button type="submit">Registrieren Sie einen Kommentar</button>
                        </form>
                    </div>
                    <div class="comment-body">
                        <div class="box">
                            <div class="writer-name">
                                <div class="writer-name_f">
                                    <h4>Rita Hansen</h4>
                                    <button id="answerC">Antwort</button>
                                </div>
                                <span>05.01.23</span>
                            </div>
                            <div class="writer-rating">
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
                            <div class="writer-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta molestiae facere consectetur nostrum
                                    eligendi odio, qui perferendis? Autem dignissimos laudantium, nesciunt quaerat eveniet vitae sed
                                    eligendi sunt ea praesentium rerum?
                                </p>
                            </div>
                            <div class="awbox">
                                <form action="">
                                    <textarea name="" id="" placeholder="Antworttext"></textarea>
                                    <button type="submit">Antwort</button>
                                </form>
                            </div>
                        </div>
                        <div class="box aw">
                            <div class="writer-name">
                                <div class="writer-name_f">
                                    <h4>Amin</h4>
                                </div>
                                <span>05.01.23</span>
                            </div>
                            <div class="writer-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta molestiae facere
                                    consectetur nostrum
                                    eligendi odio, qui perferendis? Autem dignissimos laudantium, nesciunt quaerat eveniet
                                    vitae sed
                                    eligendi sunt ea praesentium rerum?
                                </p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="writer-name">
                                <div class="writer-name_f">
                                    <h4>Rita Hansen</h4>
                                    <button id="answerC">Antwort</button>
                                </div>
                                <span>05.01.23</span>
                            </div>
                            <div class="writer-rating">
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
                            <div class="writer-text">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta molestiae facere
                                    consectetur nostrum
                                    eligendi odio, qui perferendis? Autem dignissimos laudantium, nesciunt quaerat eveniet
                                    vitae sed
                                    eligendi sunt ea praesentium rerum?
                                </p>
                            </div>
                            <div class="awbox">
                                <form action="">
                                    <textarea name="" id="" placeholder="Antworttext"></textarea>
                                    <button type="submit">Antwort</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
