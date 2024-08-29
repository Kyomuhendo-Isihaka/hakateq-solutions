@extends('hakateq_admin.layouts.app')


@section('content')

<div class="w3-card-4 w3-white">
    <div class="w3-container w3-padding-large">
        <div class="w3-center">
            <img src="{{ asset($member->profile) }}" width="250"
                alt="">
            <h4>Name: <small>{{ $member->name }}</small></h4>
            <h4>Phone: <small>{{ $member->phone }}</small></h4>
            <h4>Email: <small>{{ $member->email }}</small></h4>
  
            <a href="javascript:void(0);" class="w3-button bg-app w3-primary w3-text-white"    onclick="document.getElementById('editModal{{ $member->id }}').style.display='block'">
            <i class="fa fa-edit"></i> Update Profile
        </a>
        </div>

        <div id="editModal{{ $member->id }}" class="w3-modal">
            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                <header class="w3-container bg-app">
                    <span
                        onclick="document.getElementById('editModal{{ $member->id }}').style.display='none'"
                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                    <h4 class="w3-text-white">Edit Profile</h4>
                </header>
                <div class="w3-container w3-padding-large">
                    <form action="{{ route('profile.update', $member->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="w3-margin-bottom">
                            <label for="name">Name <span class="w3-text-danger">*</span></label>
                            <input type="text" id="name" name="name"
                                class="w3-input w3-round w3-border"
                                value="{{ old('name', $member->name) }}" placeholder="Enter Full Name"
                                required>
                        </div>

                        <div class="w3-margin-bottom">
                            <label for="phone">Contact Phone <span
                                    class="w3-text-danger">*</span></label>
                            <input type="text" id="phone" name="phone"
                                class="w3-input w3-round w3-border"
                                value="{{ old('phone', $member->phone) }}" placeholder="Enter Phone"
                                required>
                        </div>

                        <div class="w3-margin-bottom">
                            <label for="email">Contact Email <span
                                    class="w3-text-danger">*</span></label>
                            <input type="email" id="email" name="email"
                                class="w3-input w3-round w3-border"
                                value="{{ old('email', $member->email) }}" placeholder="Enter Email"
                                required>
                        </div>
                        <div class="w3-margin-bottom">
                            <label for="profile">Profile</label>
                            <input type="file" id="profile" name="profile"
                                class="w3-input w3-round w3-border">
                            @if ($member->profile)
                                <p>Current Profile: <img src="{{ asset($member->profile) }}"
                                        alt="Profile Image" width="50"></p>
                            @endif
                        </div>


                        <div class="w3-margin-bottom">
                            <button class="w3-button bg-app w3-primary w3-text-white w3-round">Update
                                profile</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
@endsection
