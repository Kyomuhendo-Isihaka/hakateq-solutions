@extends('hakateq_admin.layouts.app')

@section('content')
<div class="w3-padding-32">
    <div class="w3-auto" style="width:380px">
        <div class="w3-white w3-round w3-margin-bottom w3-border">
            <div class="w3-padding-large">
                <div class="card card-signin p-3 my-5">
                    <div class="card-body">

                        <h5 class="w3-center">Change Password</h5>

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

                        <form method="POST" class="form-signin" action="{{ route('password.changer') }}">
                            @csrf

                            <div class="w3-margin-bottom">
                                <input type="password" name="old_password" class="w3-input w3-round w3-border"
                                    placeholder="Enter Old password" value="{{ old('password') }}" required>
                            </div>

                            <div class="w3-margin-bottom">
                                <label for="password">New Password:</label>
                                <input type="password" name="password" class="w3-input w3-round w3-border"
                                    required>
                            </div>

                            <div class="w3-margin-bottom">
                                <label for="password_confirmation">Confirm New Password:</label>
                                <input type="password" name="password_confirmation"
                                    class="w3-input w3-round w3-border" required>
                            </div>

                            <div class="w3-margin-bottom">
                                <input type="submit" value="Change Password"
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
@endsection
