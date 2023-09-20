@extends('dapur.layouts.index')

@section('content')
    <style>
        .mu-10 {
            margin-top: -60px;
        }

        .mu-7 {
            margin-top: -20px;
        }

        .card {
            border-radius: 10px;
        }
    </style>

    <h3 class="mu-10">Pesanan Masuk</h3>
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Pesanan 1</h5>
          <hr>
            <h5 class="card-title">Arianto - 082349095583</h5>

            <h6>
                <ol type="1">
                    <li>Nasi Goreng</li>
                    <li>Nasi Nasi Ayam</li>
                </ol>
            </h6>
            <a href="#" class="btn btn-sm btn-primary">Selesai</a>
        </div>
    </div>
@endsection
