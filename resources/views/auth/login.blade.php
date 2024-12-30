<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Masuk | JDIH Bulungan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/notif/notifIt.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ assets('css/back-custom.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid ">
        <div class="row justify-content-center align-items-center" style="min-height: 500px;">
            <div class="col-11 col-lg-4 bg-white px-4 py-5 rounded-4">
                <div class="card-sigin">
                    <div class="card-sigin">
                        <div class="text-center">
                            <h5 class="text-uppercase fw-bold">Administrator Merch</h5>
                            <h5 class="mb-4">Universitas Teknologi Yogyakarta</h5>
                        </div>
                        <form autocomplete="off" method="POST" action="{{ route('login.post') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Alamat Email</label>
                                <input class="form-control rounded-pill" placeholder="Masukkan email .."type="text"
                                    name="email">
                                @error('email')
                                    <small class="text-danger ms-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Kata Sandi</label> <input class="form-control rounded-pill"
                                    placeholder="Masukkan kata sandi .." type="password" name="password">
                                @error('password')
                                    <small class="text-danger ms-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-block w-100 rounded-pill">
                                MASUK
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
