<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Upaya Tehnik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    @component('components.upa-navbar')
    @endcomponent

    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>LOGIN</h2>
                <div class="underline-title"></div>
            </div>
            <form method="post" action="{{ route('loginLogic') }}" class="form">
                @csrf
                <label for="email" style="padding-top:13px">
                    &nbsp;Username
                </label>
                <input id="email" class="form-content" type="text" name="email" autocomplete="on"
                    value="{{ old('email') }}" required />
                <div class="form-border"></div>
                <label for="password" style="padding-top:22px">&nbsp;Password
                </label>
                <input id="password" class="form-content" type="password" name="password" required />
                <div class="form-border"></div>
                <a href="{{ route('password.request') }}">
                    <span id="forgot-pass">Forgot password?</span> </a>
                </a>
                <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
            </form>
        </div>
    </div>
    <br>

    @component('components.upa-footer')
    @endcomponent

    <script>
        function redirectToFile(fileName) {
            // Redirect ke file yang ditentukan
            window.location.href = fileName;
        }
    </script>

</body>

</html>
