<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/icons/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/w3pro-4.13.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/w3-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body class="w3-light-grey">
    <input id="sidebar-control" type="checkbox" class="w3-hide">
    <div id="app">
        <div class="w3-mai" style="margin-top:54px">
            <div class="w3-padding-32">
                <div class="w3-auto" style="width:380px">
                    <div class="w3-white w3-round w3-margin-bottom w3-border">
                        <div class="w3-padding-large">
                            <div class="card card-signin p-3 my-5">
                                <div class="card-body">
                                    <div class="w3-center">
                                        <img class="logo" src="{{ asset('image/hakateq.png') }}" width="150">
                                    </div>
                                    <h5 class="w3-center">Forgot Your Password</h5>

                                    <!-- Display Errors -->
                                    @if ($errors->any())
                                        <div class="w3-margin-bottom">
                                            <div class="w3-text-red">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif

                                    <form method="POST" class="form-signin" action="{{route('password.email')}}">
                                        @csrf
                                        <div class="w3-margin-bottom">
                                            <input type="email" name="email" class="w3-input w3-round w3-border"
                                                placeholder="Enter email" value="{{ old('email') }}" required>
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <input type="submit" value="Send Password Reset Link"
                                                class="w3-input bg-app w3-button w3-primary w3-border">
                                        </div>
                                    </form>
                                    @if (session('status'))
                                        <p class="w3-success">{{ session('status') }}</p>
                                    @endif
                                    @if ($errors->any())
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="w3-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
