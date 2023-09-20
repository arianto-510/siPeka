@extends('pelanggan.layouts.index')

@section('content')
    <form action="/checkout/store" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Detail Pemesanan</h2>
                <div class="p-3 p-lg-5 border bg-white">
                    <div class="form-group">
                        <label for="c_country" class="text-black">Nomor Meja <span class="text-danger">*</span></label>
                        <select id="c_country" class="form-control" name="meja">
                            <option value="1">Pilih Meja</option>
                            <option value="2">A1</option>
                            <option value="3">A2</option>
                            <option value="4">A3</option>
                            <option value="5">A4</option>
                            <option value="6">A5</option>
                            <option value="7">A6</option>
                            <option value="8">A7</option>
                            <option value="9">A8</option>
                        </select>
                        @error('meja')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="nama" class="text-black">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="hp" class="text-black">Nomor Hp </label>
                            <input type="text" class="form-control" id="hp" name="hp">
                            @error('hp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group">
                    <label for="c_order_notes" class="text-black">Order Notes</label>
                    <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                        placeholder="Write your notes here..."></textarea>
                </div> --}}

                </div>
            </div>
            <div class="col-md-6">

                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <th>Product</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    @if (session('cart'))
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach (session('cart') as $cart)
                                            @php
                                                $total += $cart['harga'] * $cart['quantity'];
                                            @endphp
                                            <tr>
                                                <input type="number" value="{{ $cart['id'] }}" name="product_id[]"
                                                    hidden>
                                                <input type="number" value="{{ $cart['quantity'] }}" name="quantity[]"
                                                    hidden>
                                                <input type="number" value="{{ $cart['harga'] * $cart['quantity'] }}"
                                                    name="total[]" hidden>
                                                <td>{{ $cart['nama'] }} <strong class="mx-2">x</strong>
                                                    {{ $cart['quantity'] }}</td>
                                                <td>{{ $cart['harga'] * $cart['quantity'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                        <td>

                                            <input class="text-black font-weight-bold" type="number"
                                                value="{{ $total }}" readonly
                                                style="border: none; font-weight: bold;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <button class="btn btn-black btn-lg py-3 btn-block"
                                    onclick="window.location='/checkout/store'" name="pesan">Pesan</button>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
