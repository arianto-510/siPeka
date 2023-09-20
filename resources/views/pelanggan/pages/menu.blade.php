@extends('pelanggan.layouts.index')

@section('content')
    <!-- Start Column 1 -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @foreach ($menus as $menu)
        <div class="col-12 col-md-6 col-lg-3 mb-5">
            <a class="product-item" href="#">
                <img src="{{ asset('storage') }}/{{ $menu->gambar }}" class="img-fluid product-thumbnail">
                <h3 class="product-title">{{ $menu->nama }}</h3>
                <strong class="product-price">Rp. {{ $menu->harga }}</strong>
                <span class="icon-cross">
                    <form action="/cart/{{ $menu->id }}" method="get">
                        @csrf
                        <button><img src="{{ url('front-end/images/cross.svg') }}" class="img-fluid">
                        </button>
                    </form>
                </span>
            </a>
        </div>
    @endforeach
    {{ $menus->links() }}
    <!-- End Column 1 -->
@endsection
