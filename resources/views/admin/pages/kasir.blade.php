@extends('admin.layouts.index')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

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
                            @if ($kasir->status == 0)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        {{ $kasir->nama }}
                                    </td>
                                    <td>
                                        {{-- @dd($kasir->transaction) --}}
                                        <ul class="text-left">
                                            @foreach ($kasir->transaction as $menu)
                                                <li>{{ $menu->product->nama }} x {{ $menu->quantity }}</li>
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
                                        {{-- <button class="btn-sm btn-danger">Hapus</button> --}}

                                        {{-- Button Selesaikan --}}
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Selesai
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Transaksi
                                                            Selesai</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin Transaksi Selesai?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="/admin/{{ $kasir->id }}/update" method="post">
                                                            @method('put')
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">Iya
                                                                Selesai</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Button Bayar --}}
                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#bayar-{{ $kasir->id }}">Bayar</button>
                                        <div class="modal fade text-left" id="bayar-{{ $kasir->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Bayar Tagihan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Menu</label>
                                                            <div>
                                                                <ol class="text-left">
                                                                    @foreach ($kasir->transaction as $menu)
                                                                        <li>{{ $menu->product->nama }}</li>
                                                                    @endforeach
                                                                </ol>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nominal Pesanan (Rupiah)</label>
                                                            <input type="text" name="belanja" id="belanja"
                                                                class="form-control" value="{{ $total }}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nominal Uang Pembeli (Rupiah)</label>
                                                            <input type="number" name="harga" class="form-control"
                                                                id="beli">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kembalian</label>
                                                            <input type="text" id="kembalian" name="harga"
                                                                class="form-control" value="{{ old('harga') }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a name="tambah" class="btn btn-success"
                                                            href="/admin/{{ $kasir->id }}/struk">Cetak</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#beli').on('input', function() {
                let uangPembeli = parseInt($('#beli').val())
                let hargaBeli = parseInt($('#belanja').val())
                let uangKembalian = uangPembeli - hargaBeli
                $('#kembalian').val(uangKembalian)
            })
        })
    </script>
@endsection
