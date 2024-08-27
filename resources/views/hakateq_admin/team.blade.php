@extends('hakateq_admin.layouts.app')

@section('content')
    <div class="w3-white w3-round w3-margin-bottom w3-border">
        <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Team Members
        </header>

        <div class="w3-padding-large">
            <input type="search" class="" name="searchInput" id="searchInput" onkeyup="searchTable()" placeholder="Search">


            <!-- Add Button with Modal Trigger -->
            <a href="javascript:void(0);" onclick="document.getElementById('addModal').style.display='block'"
                class="w3-button w3-right bg-app w3-primary w3-text-white w3-margin-bottom">
                <i class="fa fa-plus"></i> Add New
            </a>

            <!-- add new team Modal -->
            <div id="addModal" class="w3-modal">
                <div class="w3-modal-content w3-animate-opacity w3-card-4">
                    <header class="w3-container bg-app">
                        <span onclick="document.getElementById('addModal').style.display='none'"
                            class="w3-button w3-text-white w3-display-topright">&times;</span>
                        <h4 class="w3-text-white">Add New Member</h4>
                    </header>
                    <div class="w3-container w3-padding-large">
                        <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="w3-margin-bottom">
                                <label for="name">Name <span class="w3-text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="w3-input w3-round w3-border"
                                    placeholder="Enter Full Name" required>
                            </div>

                            <div class="w3-margin-bottom">
                                <label for="phone">Contact Phone <span class="w3-text-danger">*</span></label>
                                <input type="text" id="phone" name="phone" class="w3-input w3-round w3-border"
                                    placeholder="Enter Phone" required>
                            </div>

                            <div class="w3-margin-bottom">
                                <label for="email">Contact Email <span class="w3-text-danger">*</span></label>
                                <input type="email" id="email" name="email" class="w3-input w3-round w3-border"
                                    placeholder="Enter Email" required>
                            </div>

                            <div class="w3-margin-bottom">
                                <label for="user_type">Select User Type <span class="w3-text-danger">*</span></label>
                                <select name="user_type" id="user_type" class="w3-input w3-round w3-border">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <div class="w3-margin-bottom">
                                <label for="profile">Profile <span class="w3-text-danger">*</span></label>
                                <input type="file" id="profile" name="profile" class="w3-input w3-round w3-border"
                                    required>
                            </div>

                            <div class="w3-margin-bottom">
                                <label for="password">Password <span class="w3-text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="w3-input w3-round w3-border"
                                    placeholder="Enter Password" required>
                            </div>

                            <div class="w3-margin-bottom">
                                <label for="password_confirmation">Confirm Password <span
                                        class="w3-text-danger">*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w3-input w3-round w3-border" placeholder="Enter Confirm Password" required>
                            </div>

                            <div class="w3-margin-bottom">
                                <button type="submit" class="w3-button bg-app w3-primary w3-text-white w3-round">Add Member</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Table with Borders -->
            <table id="tableData" class="w3-table w3-bordered w3-border">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact Phone</th>
                    <th scope="col">Contact Email</th>
                    <th scope="col">Action</th>
                </tr>
                <tbody>
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($team as $member)
                        <tr>
                            <th scope="row">{{ $i++ }}</td>
                            </th>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->email }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" id="dropdown1"
                                        class="w3-button w3-primary bg-app dropdown-btn">
                                        Action <i class="fa fa-chevron-down"></i>
                                    </a>
                                    <div id="dropdown-content1" class="dropdown-content">
                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('viewModal{{ $member->id }}').style.display='block'"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('editModal{{ $member->id }}').style.display='block'">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('deleteModal{{ $member->id }}').style.display='block'"><i
                                                class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- view team member Modal -->
                        <div id="viewModal{{ $member->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('viewModal{{ $member->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Team Member</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <div class="w3-center">
                                        <img src="{{ asset('storage/' . $member->profile) }}" width="250"
                                            alt="">
                                        <h4>Name: <small>{{ $member->name }}</small></h4>
                                        <h4>Phone: <small>{{ $member->phone }}</small></h4>
                                        <h4>Email: <small>{{ $member->email }}</small></h4>
                                        <h4>User Type: <small>{{ $member->user_type }}</small></h4>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- edit team member Modal -->
                        <div id="editModal{{ $member->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('editModal{{ $member->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Edit Team Member</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <form action="{{ route('team.update', $member->id) }}" method="POST"
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
                                            <label for="user_type">Select User Type <span
                                                    class="w3-text-danger">*</span></label>
                                            <select name="user_type" id="user_type" class="w3-input w3-round w3-border">
                                                <option value="user"
                                                    {{ $member->user_type == 'user' ? 'selected' : '' }}>User</option>
                                                <option value="admin"
                                                    {{ $member->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <label for="profile">Profile</label>
                                            <input type="file" id="profile" name="profile"
                                                class="w3-input w3-round w3-border">
                                            @if ($member->profile)
                                                <p>Current Profile: <img src="{{ asset('storage/' . $member->profile) }}"
                                                        alt="Profile Image" width="50"></p>
                                            @endif
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="password"
                                                class="w3-input w3-round w3-border" placeholder="Enter Password">
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" id="password_confirmation"
                                                name="password_confirmation" class="w3-input w3-round w3-border"
                                                placeholder="Enter Confirm Password">
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <button class="w3-button bg-app w3-primary w3-text-white w3-round">Update
                                                Member</button>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>

                        {{-- ----- delete team Member Model-- --}}
                        <div id="deleteModal{{ $member->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-2">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('deleteModal{{ $member->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Delete Team Member</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <h3 class="w3-center">Are You Sure, You want to delete This Team Member</h3>
                                    <form action="{{ route('team.destroy', $member->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <div class="w3-center">


                                            <button type="submit" class="w3-button w3-red w3-round">Delete</button>
                                            <button type="reset"
                                                onclick="document.getElementById('deleteModal{{ $member->id }}').style.display='none'"
                                                class="w3-button w3-gray w3-text-white w3-round">Cancel</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </tbody>


            </table>
            {{ $team->links('components.pagination') }}


        </div>
    </div>
@endsection
