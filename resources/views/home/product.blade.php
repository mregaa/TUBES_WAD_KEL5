<div class="container-xxl py-5" id='menu'>
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Products</h1>
                        <p>Menu dari tenant yang berkualitas, aman, dan terpecaya</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#all">All</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="all" class="tab-pane fade show p-0 active">
                    <div class="row g-4">

                        @foreach ($menus as $menu)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ $menu->image }}" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{ $menu->kode_tenant }}</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">{{ $menu->nama_menu }}</a>
                                    <span class="text-primary me-1">Rp. {{ number_format($menu->harga, 0, ',', '.')}}</span>
                                    <span class="text-muted d-block">{{ $menu->deskripsi}}</span>
                                    {{-- <span class="text-body text-decoration-line-through">$29.00</span> --}}
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center py-2 d-flex align-items-center justify-content-center">
                                        <a class="text-body" href="{{url('product_details',$menu->id)}}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2 d-flex align-items-center justify-content-center">
                                        <form action="{{ url('add_cart', $menu->id) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            <input type="number" name="quantity" value="1" min="1" class="form-control me-2" style="width: 60px;">
                                            <button type="submit" class="btn btn-primary">
                                                <a class="text-body"></a><i class="fa fa-shopping-bag text-white me-2"></i>Add to cart
                                            </button>
                                        </form>
                                    </small>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
