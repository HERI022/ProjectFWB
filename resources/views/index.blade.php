@extends('layouts.header')
@section('title', 'Berdonasi')
{{-- TAMPILAN HOME --}}

@section('content')
    {{-- AWAL SLIDE GAMBAR --}}
    <div id="carouselExampleControls" class="carousel slide fade-in" data-ride="carousel">
        <div class="carousel-caption d-none d-md-block">
            <div class="header text-center">
                <h1 class="text-black">"Sedekahmu, Senyuman Mereka"</h1>
                <p class="text-black">"Dari Hatimu untuk Dunia yang Lebih Baik"</p>
            </div>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/images/index/gambar.jpg" alt="Gambar1" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/index/gambar2.jpg" alt="Gambar2" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/index/gambar3.jpeg" alt="Gambar3" />
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    {{-- AKHIR SLIDE GAMBAR --}}

    <!-- AWAL KONTEN BAWAH -->
    <div class="content text-center mt-5 fade-in">
        <button class="pushable" onclick="redirectDonasi()">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">Mulai Donasi</span>
        </button>
    </div>

    <script>
        function redirectDonasi() {
            window.location.href = "/donasi";
        }
    </script>
    {{-- AKHIR KONTEN BAWAH --}}


    <style>
        /* ANIMASI HALAMAN */
        .fade-in {
            opacity: 0;
            animation: fadeInAnimation 1s ease-in forwards;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .carousel-caption {
            top: 40%;
            font-weight: 800;
            font-style: normal;
            text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        }

        carousel-caption h1,
        .carousel-caption p {
            font-weight: 500;
        }

        .pushable {
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

        .shadow {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: hsl(226, 25%, 69%);
            border-radius: 8px;
            filter: blur(2px);
            will-change: transform;
            transform: translateY(2px);
            transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }

        .edge {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 99%;
            border-radius: 12px;
            background: #073abb;
        }

        .front {
            display: block;
            position: relative;
            border-radius: 12px;
            background: #007bff;
            padding: 16px 32px;
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
