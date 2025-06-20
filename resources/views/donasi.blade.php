@extends('layouts.header')
@section('title', 'Mulai Donasi')
{{-- TAMPIL INFO DONASI TERKUMPUL --}}

@section('content')
    <div class="container">
        <div class="card mb-3 mt-4" id="animated-card">
            <img class="card-img-top" src="/images/index/header-2.png" alt="Card image cap" />
            <div class="card-body">
                {{-- PARAGRAF 1 --}}
                <h5 class="card-title">Bantu Mereka Korban Bencana Banjir</h5>
                <p class="card-text" id="total-donatur"><i class="fa-regular fa-circle-check"></i>{{ $totalOrang }} Orang
                    Telah Berdonasi </i>
                </p>

                <div class="row">
                    {{-- SECTION KIRI --}}
                    <div class="col-sm">
                        {{-- PARAGRAF 2 --}}
                        <p class="card-text" id="total-kumpul">Rp {{ number_format($totalTerkumpul, 0, ',', '.') }}</p>
                        {{-- PARAGRAF 3 --}}
                        <p class="card-text" id="total-jumlah">Terkumpul dari <strong>100.000.000</strong></p>
                    </div>

                    {{-- SECTION KANAN --}}
                    <div class="col-sm text-right">
                        <a href="/pembayaran">
                            {{-- TOMBOL DONASI --}}
                            <button class="pushable">
                                <span class="shadow"></span>
                                <span class="edge"></span>
                                <span class="front">Mulai Donasi</span>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="progress">
                    @php
                        $persentase = ($totalTerkumpul / 100000000) * 100;
                    @endphp

                    <div class="progress-bar" role="progressbar" style="width: {{ $persentase }}%;"
                        aria-valuenow="{{ $persentase }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
    </div>

    <style>
        /* ANIMASI */
        #animated-card {
            animation: scrollUp 1s ease-in-out forwards;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.096), 0 6px 30px rgba(0, 0, 0, 0.096);
        }

        @keyframes scrollUp {
            0% {
                transform: translateY(10px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .fa-circle-check {
            font-size: 0.9em;
            margin-right: 0.4em;
        }

        .card-title {
            font-weight: bold;
            font-size: 25px;
            margin-bottom: 0%;
        }

        #total-donatur {
            margin-bottom: 30px;
        }

        #total-kumpul {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: -0.3%;
        }

        #total-jumlah {
            font-size: 15px;/
        }

        #total-jumlah strong {
            font-weight: 600;
        }

        .progress {
            margin-top: 1rem;
            margin-bottom: 0.2rem;
            border-radius: 20px;
            height: 5px;
        }

        .progress-bar {
            /* background-color: #007bff; */
            border-radius: 20px;
            animation: animateProgressBar 2s ease-out;
            background: -webkit-linear-gradient(left, #4df3ff 0%, #007bff 100%);
        }


        @keyframes animateProgressBar {
            from {
                width: 0%;
            }

            to {
                width: {{ $persentase }}%;
            }
        }

        .pushable {
            margin-top: 0.2rem;
            position: relative;
            background: transparent;
            padding: 0px;
            border: none;
            cursor: pointer;
            outline-offset: 4px;
            outline-color: deeppink;
            transition: filter 250ms;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        .edge {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            border-radius: 12px;
            background: #073abb;
        }

        .front {
            display: block;
            position: relative;
            border-radius: 12px;
            background: #007bff;
            padding: 12px 32px;
            color: white;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 1rem;
            transform: translateY(-4px);
            transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }

        .pushable:hover {                                       
            filter: brightness(110%);
        }

        .pushable:hover .front {
            transform: translateY(-6px);
            transition: transform 250ms cubic-bezier(0.3, 0.7, 0.4, 1.5);
        }

        .pushable:active .front {
            transform: translateY(-2px);
            transition: transform 34ms;
        }

        .pushable:hover .shadow {
            transform: translateY(4px);
            transition: transform 250ms cubic-bezier(0.3, 0.7, 0.4, 1.5);
        }

        .pushable:active .shadow {
            transform: translateY(1px);
            transition: transform 34ms;
        }

        .pushable:focus:not(:focus-visible) {
            outline: none;
        }
    </style>
@endsection
