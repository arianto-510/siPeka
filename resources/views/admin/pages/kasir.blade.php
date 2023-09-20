@extends('admin.layouts.index')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Kasir</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Buyer</th>
                            <th>Menu | Quantity</th>
                            <th>Total (Rp)</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($kasirData as $kasir)
                            {{-- @if ($kasir->status == 0) --}}
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    {{-- @if ($kasirData->where('buyer_id', $kasir->buyer_id)->count() > 1)
                                            {{ $kasirData->where('buyer_id', $kasir->buyer_id)->first()->buyer->nama }}
                                        @else
                                            {{ $kasir->buyer->nama }}
                                        @endif --}}
                                    {{ $kasir->nama }}
                                </td>
                                <td>
                                    {{-- @dd($kasir->transaction) --}}
                                    <ul class="text-left">
                                        @foreach ($kasir->transaction as $menu)
                                            <li>{{ $menu->product->nama }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($kasir->transaction as $menu)
                                        @php
                                            $total += $menu->total;
                                        @endphp
                                        <div class="text-left">
                                            = {{ $menu->total }}</br>
                                        </div>
                                    @endforeach
                                    <strong>
                                        <div class="text-left">Total belanja = {{ $total }}</div>
                                    </strong>
                                </td>
                                <td>
                                    @if ($kasir->status == 0)
                                        <div class="badge badge-danger">Belum Bayar</div>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn-sm btn-danger">Hapus</button>
                                    <button class="btn-sm btn-success" data-toggle="modal"
                                        data-target="#bayar-{{ $kasir->id }}">Bayar</button>
                                </td>
                            </tr>
                            {{-- @endif --}}
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- @foreach ($kasirData->transaction as $kasir) --}}
    <form>
        <!-- Modal -->
        {{-- @csrf --}}
        <div class="modal fade" id="bayar-{{ $kasir->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bayar Tagihan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Menu</label>
                            <input type="text" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nominal Pesanan (Rupiah)</label>
                            <input type="text" name="belanja" id="belanja" class="form-control" value=""
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Nominal Uang Pembeli (Rupiah)</label>
                            <input type="text" name="harga" class="form-control" id="beli">
                        </div>
                        <div class="form-group">
                            <label>Kembalian</label>
                            <input type="text" id="kembalian" name="harga" class="form-control"
                                value="{{ old('harga') }}" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a name="tambah" class="btn btn-success" href="">Cetak</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- @endforeach --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-success').on('click', function() {
                // alert('oke')
                // console.log('oke')
            })
        })
    </script>
@endsection
