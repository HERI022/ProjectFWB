@extends('layouts.header')
@section('title', 'Edit Data')
{{-- EDIT DONASI --}}

@section('content')
    <div class="d-flex justify-content-center">
        <form class="form" action="{{ route('donaturs.update', $donatur->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card" id="card1">
                <span class="title">Edit Data</span>
                <div class="group">
                    <input placeholder="" type="text" id="name" name="nama"
                        value="{{ old('nama', $donatur->nama) }}" />
                    <label for="name">Nama</label>
                    @if ($errors->has('nama'))
                        <div class="error">{{ $errors->first('nama') }}</div>
                    @endif
                </div>
                <div class="group">
                    <textarea placeholder="" id="comment" name="pesan" rows="5" required spellcheck="false">{{ old('pesan', $donatur->pesan) }}</textarea>
                    <label for="comment">Pesan Donasi</label>
                    @if ($errors->has('pesan'))
                        <div class="error">{{ $errors->first('pesan') }}</div>
                    @endif
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="anonim" />
                    <label class="form-check-label" for="anonim">Donasi sebagai Anonim</label>
                </div>
            </div>

            <div class="card" id="card2">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="text-center">Jumlah</div>
                    </div>

                    <div class="col-sm">
                        <div class="group">
                            <input placeholder="Rp. " type="text" id="dengan-rupiah" name="total_donasi"
                                value="{{ old('total_donasi', $donatur->total_donasi) }}" required />
                            @if ($errors->has('total_donasi'))
                                <div class="error">{{ $errors->first('total_donasi') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <p>Opsi Pembayaran:</p>
                <div class="row">
                    <div class="col-sm">
                        <label>
                            <input class="radio-input" type="radio" name="tipe_bayar" value="Gopay"
                                {{ old('tipe_bayar', $donatur->tipe_bayar) == 'Gopay' ? 'checked' : '' }} required />
                            <span class="radio-tile">
                                <span class="radio-icon">
                                    <img src="/images/pembayaran/opsi1-gopay.png" alt="Gopay" />
                                </span>
                            </span>
                        </label>
                    </div>
                    <div class="col-sm">
                        <label>
                            <input class="radio-input" type="radio" name="tipe_bayar" value="Dana"
                                {{ old('tipe_bayar', $donatur->tipe_bayar) == 'Dana' ? 'checked' : '' }} required />
                            <span class="radio-tile">
                                <span class="radio-icon">
                                    <img src="/images/pembayaran/opsi2-dana.png" alt="Dana" />
                                </span>
                            </span>
                        </label>
                    </div>
                    <div class="col-sm">
                        <label>
                            <input class="radio-input" type="radio" name="tipe_bayar" value="BCA Virtual Account"
                                {{ old('tipe_bayar', $donatur->tipe_bayar) == 'BCA Virtual Account' ? 'checked' : '' }}
                                required />
                            <span class="radio-tile">
                                <span class="radio-icon">
                                    <img src="/images/pembayaran/opsi3-bca.png" alt="BCA Virtual Account" />
                                </span>
                            </span>
                        </label>
                    </div>
                </div>

                <button type="submit"><span>Update</span></button>
            </div>
        </form>
    </div>

    <script>
        var dengan_rupiah = document.getElementById("dengan-rupiah");
        dengan_rupiah.addEventListener("keyup", function(e) {
            dengan_rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }

        var anonimCheckbox = document.getElementById('anonim');
        var nameInput = document.getElementById('name');

        anonimCheckbox.addEventListener('change', function() {
            if (this.checked) {
                nameInput.value = 'Anonim';
                nameInput.disabled = true;
            } else {
                nameInput.value = '';
                nameInput.disabled = false;
            }
        });

        document.querySelector('form').addEventListener('submit', function(event) {
            var anonimCheckbox = document.getElementById('anonim');
            var nameInput = document.getElementById('name');

            if (anonimCheckbox.checked) {
                nameInput.disabled = false;
                nameInput.value = 'Anonim';
            }
        });
    </script>


    <style>
        .card {
            background-color: #fff;
            border-radius: 4px;
            padding: 20px;
            width: 400px;
            display: flex;
            flex-direction: column;
        }

        #card1 {
            margin-bottom: 7px;
        }

        .title {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        .form {
            margin-top: 15px;
            display: flex;
            flex-direction: column;
        }

        .group {
            position: relative;
        }

        .form .group label {
            font-size: 14px;
            color: rgb(99, 102, 102);
            position: absolute;
            top: -10px;
            left: 10px;
            padding: 0 5px;
            background-color: #fff;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .form .group input,
        .form .group textarea {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            outline: 0;
            width: 100%;
            background-color: transparent;
        }

        .form .group input:placeholder-shown+label,
        .form .group textarea:placeholder-shown+label {
            top: 10px;
            background-color: transparent;
        }

        .form .group input:focus,
        .form .group textarea:focus {
            border-color: #3366cc;
        }

        .form .group input:focus+label,
        .form .group textarea:focus+label {
            top: -10px;
            left: 10px;
            background-color: #fff;
            color: #3366cc;
            font-weight: 600;
            font-size: 14px;
        }

        .form .group textarea {
            resize: none;
            height: 100px;
            margin-bottom: 10px;
        }

        button {
            display: inline-block;
            border-radius: 8px;
            background-color: #2260ff;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 17px;
            padding: 16px;
            transition: all 0.5s;
            cursor: pointer;
            margin-top: 25px;
        }

        button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        button span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -15px;
            transition: 0.5s;
        }

        button:hover span {
            padding-right: 15px;
        }

        button:hover span:after {
            opacity: 1;
            right: 0;
        }

        .text-center {
            font-size: 17px;
            margin-top: 10%;
        }

        /* OPSI PEMBAYARAN  */
        .radio-inputs {
            display: flex;
            justify-content: center;
            align-items: center;
            /* max-width: 350px; */
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .radio-inputs>* {
            margin: 6px;
        }

        .radio-input:checked+.radio-tile {
            border-color: #2260ff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            color: #2260ff;
        }

        .radio-input:checked+.radio-tile:before {
            transform: scale(1);
            opacity: 1;
            background-color: #2260ff;
            border-color: #2260ff;
        }

        .radio-input:focus+.radio-tile {
            border-color: #2260ff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
        }

        .radio-input:focus+.radio-tile:before {
            transform: scale(1);
            opacity: 1;
        }

        .radio-tile {
            display: flex;
            /* flex-direction: column; */
            align-items: center;
            justify-content: center;
            width: 98px;
            min-height: 80px;
            border-radius: 0.8rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            /* box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); */
            transition: 0.15s ease;
            cursor: pointer;
            position: relative;
            padding: 7px;
        }

        .radio-tile:before {
            content: "";
            position: absolute;
            display: block;
            width: 0.75rem;
            height: 0.75rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            border-radius: 50%;
            top: 0.25rem;
            left: 0.25rem;
            opacity: 0;
            transform: scale(0);
            transition: 0.25s ease;
        }

        .radio-tile:hover {
            border-color: #2260ff;
        }

        .radio-tile:hover:before {
            transform: scale(1);
            opacity: 1;
        }

        .radio-icon img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 0.85rem;
        }

        .radio-input {
            clip: rect(0 0 0 0);
            -webkit-clip-path: inset(100%);
            clip-path: inset(100%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }
    </style>
@endsection
