@extends('admin.layouts.index')

@section('content')
    <!-- Page Heading -->
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
            <h6 class="m-0 font-weight-bold text-primary">Laporan Penjualan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Item</th>
                            <th>Jumlah Terjual</th>
                            <th>Total Penjualan</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($dataPenjualan) --}}
                        @foreach ($dataPenjualan as $report)
                            <tr>
                                <td>{{ $report->created_at }}</td>
                                <td>
                                    @foreach ($report->transaction as $rm)
                                        <div>{{ $rm->product->nama }}</br></div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($report->transaction as $rm)
                                        <div class="text-center">
                                            x {{ $rm->quantity }}</br>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($report->transaction as $menu)
                                        @php
                                            $total += $menu->total;
                                        @endphp
                                        <div class="text-left">
                                            = {{ $menu->total }}</br>
                                        </div>
                                    @endforeach
                                    <strong>
                                        <div class="text-left">Total = {{ $total }}</div>
                                    </strong>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
