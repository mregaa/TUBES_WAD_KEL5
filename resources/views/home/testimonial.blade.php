<div class="container-fluid bg-light bg-icon py-6 mb-5" id="rating">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Customer Reviews</h1>
            <p>Terima Kasih telah memesan di TeluEats!</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($ratings as $rating)
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">{{ $rating->review }}</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="{{ asset('storage/' . $rating->image) }}" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">{{ $rating->name }}</h5>
                            <p>
                                @for ($i = 0; $i < $rating->stars; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor
                                @for ($i = $rating->stars; $i < 5; $i++)
                                    <i class="fa fa-star white"></i>
                                @endfor
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
