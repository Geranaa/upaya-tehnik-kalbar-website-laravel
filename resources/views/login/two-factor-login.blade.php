<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Upaya Tehnik - Verification</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="/css/2factor.css">
    <style>
        .alert {
            color: red;
            text-align: center;
        }

        .resend-link {
            text-align: center;
            color: blue;
            position: absolute;
            margin-top: 350px;
            left: 50%;
            transform: translateX(-50%);
            /* Center horizontally */
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-left">
            <a href="{{ route('index') }}"><img src="/image/logo.png" alt="Company Logo" class="logo"></a>
            <div>
                <h1>PT. Upaya Tehnik</h1>
                <p>Area Kalimantan Barat, Pontianak Kota</p>
            </div>
        </div>
    </header>

    <div id="card">
        <div id="card-content" style="height: 200px;">
            <div id="card-title">
                <h2>Email Verification</h2>
                <div class="underline-title"></div>
            </div>
            <form method="post" action="{{ route('two-factor-login.index') }}" class="form">
                @csrf
                <label for="user-email" style="padding: 10px">
                    &nbsp; Masukkan Kode Verifikasi
                </label><br>
                <input id="code" class="form-content" type="text" name="code" autofocus required />
                <div class="form-border"></div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="alert">{{ $error }}</p>
                    @endforeach
                @endif

                <input id="submit-btn" type="submit" name="submit" value="Verifikasi" /> <br>
            </form>
            <a href="{{ route('two-factor-login.resend') }}" class="resend-link">Kirim ulang kode</a>
        </div>
    </div><br>

    @component('components.upa-footer')
    @endcomponent
</body>

</html>
