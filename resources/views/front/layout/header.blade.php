<header class="index-header">
    <div class="container">
        @include('front.layout.category')
        <div class="container-body__iner">
            <div class="container-body__iner_l">
                <div class="motto">
                    <span>Ihre schönen Momente festhalten</span>
                </div>
                <div class="personal-info">
                    <h1>Amin</h1>
                    <span>Fotograf</span>
                    <p>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut
                        labore
                        et dolore
                        magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                        Stet
                        clita kasd
                        gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                        consetetur
                        sadipscing
                        elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                        voluptua.
                        At vero eos et
                        accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                        Lorem
                        ipsum dolor sit
                    </p>
                </div>
            </div>
            <div class="container-body__iner_r">
                <div class="bg-link-body">
                    <div class="bg-link-body__iner">
                        @foreach((new \App\repository\posts\PostRepo())->rondomItem() as $item)
                            <div class="bg-link-body__iner-box">
                                <figure class="image-place">
                                    <img class="bg-image def-image" src="{{ $item->getImagetNine()  }}"
                                         alt="{{ $item->title }}">
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
