{{-- @dd(session('cart')) --}}
@extends('pelanggan.layouts.index')

@section('content')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #harga {
            border: none;
            outline: none;
        }
    </style>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="site-blocks-table">
                @if (session()->has('success'))
                    {{-- Request::session()->forget(['cart']); --}}
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total">Total (Rp)</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @if (session('cart'))
                            @forelse (session('cart') as $key => $cart)
                                @php
                                    $total += $cart['harga'] * $cart['quantity'];
                                @endphp
                                <tr>
                                    <td id="myTd" hidden>
                                        {{ $cart['id'] }}
                                    </td>
                                    <td class="product-thumbnail">
                                        <img src="{{ asset('storage/' . $cart['gambar']) }}" alt="Image"
                                            class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $cart['nama'] }}</h2>
                                    </td>
                                    <td>
                                        <h2 id="harga{{ $key }}" class="h5 text-black">{{ $cart['harga'] }}</h2>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                            style="max-width: 120px;">
                                            <input type="number"
                                                class="form-control text-center quantity-amount border-0 disabled"
                                                value="{{ $cart['quantity'] }}" placeholder=""
                                                aria-label="Example text with button addon" aria-describedby="button-addon1"
                                                id="qty{{ $key }}">
                                        </div>
                                    </td>
                                    <td id="ttl{{ $key }}" class="h5 text-black">
                                        {{ $cart['quantity'] * $cart['harga'] }}</td>
                                    <td>
                                        <button type="submit" class="cart_remove border-0"><b>X</b></button>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-warning">Data Pesanan Belum Ada</div>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                    <a href="/menu"><button class="btn btn-black btn-sm btn-block">Kembali</button></a>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                    <a href="/emptycart"><button class="btn btn-black btn-sm btn-block">Bersihkan Pesanan</button></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                            <h3 class="text-black h4 text-uppercase">Belanja</h3>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <strong class="text-black" id="ttl">Rp. {{ $total }}</strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-black btn-lg py-3 btn-block"
                                onclick="window.location='/checkout'">Proses</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $('.cart_remove').click(function(e) {
                e.preventDefault();
                if (confirm('Yakin ingin menghapus item?')) {
                    $.ajax({
                        url: '{{ route('remove-from-cart') }}',
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: $('#myTd').text(),
                        },
                        success: function(response) {
                            // console.log(response);
                            window.location.reload();
                        }
                    })
                }
            });
        </script>
    @endpush
@endsection
