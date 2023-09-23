{{-- @dd($notif) --}}
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

    <h3 class="mu-10" id="dapur">Pesanan Masuk</h3>
    @foreach ($dataPesanan as $pesanan)
        @if ($pesanan->status === 0)
            <div class="card mb-3 me-3" style="width: 22rem;">
                <div class="card-body">
                    <h5 class="card-title">Pesanan Meja {{ $pesanan->meja }}</h5>
                    <hr>
                    <h5 class="card-title">{{ $pesanan->nama }} - {{ $pesanan->hp }}</h5>

                    <h6>
                        <ol>
                            @foreach ($pesanan->transaction as $menu)
                                <li>{{ $menu->product->nama }}</li>
                            @endforeach
                        </ol>
                    </h6>
                    {{-- <a href="#" class="btn btn-sm btn-primary">Selesai</a> --}}
                </div>
            </div>
        @endif
    @endforeach

    @if ($notif >= 1)
        <script>
            $(document).ready(function() {
                audio = new Audio('http://localhost:8000/orderan.mp3')
                audio.play()
            });
        </script>
    @endif
    <button id="test" class="btn btn-primary">Sistem Informasi Pengelolahan Cafe - Daftar Pesanan</button>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                window.location.reload(true)
            }, 2000);

            $('#test').click(function() {
                audio = new Audio('http://localhost:8000/orderan.mp3')
                audio.play()
            })
        });
    </script>
@endsection
