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
                            <th>ID</th>
                            <th>Nama Item</th>
                            <th>Jumlah Terjual</th>
                            <th>Total Penjualan</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($dataPenjualan->product_id) --}}
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($dataPenjualan as $report)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $report->nama }}</td>
                                <td>{{ $report->transaction->sum('quantity') }}</td>
                                <td>{{ $report->transaction->sum('total') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th>Total</th>
                            <th>84000</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
