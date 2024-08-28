@extends('hakateq_admin.layouts.app')

@section('content')
    <div class="w3-white w3-round w3-margin-bottom w3-border">
        <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Services
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
                        <h4 class="w3-text-white">Add New Service</h4>
                    </header>
                    <div class="w3-container w3-padding-large">
                        <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data" >
                            @csrf

                            <div class="w3-margin-bottom">
                                <label for="name" class="w3-label">Name</label>
                                <input type="text" class="w3-input w3-round w3-border" id="name" name="name" placeholder="Service Name" required>
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="icon" class="w3-label">Icon</label>
                                <input type="text" class="w3-input w3-round w3-border" id="icon" name="icon" placeholder="Icon (e.g., fa fa-home)">
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="icon_color" class="w3-label">Icon Color</label>
                                <input type="text" class="w3-input w3-round w3-border" id="icon_color" name="icon_color" placeholder="Icon Color (e.g., text-primary)">
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="image" class="w3-label">Image</label>
                                <input type="file" class="w3-input w3-round w3-border" id="image" name="image">
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="brief_description" class="w3-label">Brief Description</label>
                                <input type="text" class="w3-input w3-round w3-border" id="brief_description" name="brief_description" placeholder="Brief Description">
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="description" class="w3-label">Description</label>
                                <textarea class="w3-input w3-round w3-border" id="description" name="description" rows="4" placeholder="Detailed Description" required></textarea>
                            </div>
                            <div class="w3-margin-bottom">
                                <button type="submit" class="w3-button bg-app w3-primary w3-text-white w3-round">Add Service</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <!-- Table with Borders -->
            <table id="tableData" class="w3-table w3-bordered w3-border">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brief Description</th>
                    <th scope="col">Action</th>

                </tr>
                <tbody>
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($services as $service)
                        <tr>
                            <th scope="row">{{ $i++ }}</td>
                            </th>
                            <td><i class="{{$service->icon}} {{$service->icon_color}}"></i></td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->brief_description}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" id="dropdown1"
                                        class="w3-button w3-primary bg-app dropdown-btn">
                                        Action <i class="fa fa-chevron-down"></i>
                                    </a>
                                    <div id="dropdown-content1" class="dropdown-content">
                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('viewModal{{ $service->id }}').style.display='block'"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('editModal{{ $service->id }}').style.display='block'">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('deleteModal{{ $service->id }}').style.display='block'"><i
                                                class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- view team member Modal -->
                        <div id="viewModal{{ $service->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('viewModal{{ $service->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Service</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <div class="w3-center">
                                        <h5>{{$service->name}}</h5>
                                        <p>Service Icon: <span><i class="{{$service->icon}}"></i></span></p>
                                        <p>Service Icon Color: <span>{{$service->icon_color}}</span></p>
                                        <img src="{{asset($service->image)}}" width="250px" alt="">
                                    </div>
                                        <h5>Meta Description</h5>
                                        <p>{{$service->brief_description}}</p>

                                        <h5>Description</h5>
                                        <p>{{$service->description}}</p>




                                </div>
                            </div>
                        </div>

                        <!-- edit team member Modal -->
                        <div id="editModal{{ $service->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('editModal{{ $service->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Edit Service</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="w3-margin-bottom">
                                            <label for="name" class="w3-label">Name</label>
                                            <input type="text" class="w3-input w3-round w3-border" id="name" name="name" value="{{ $service->name }}" placeholder="Service Name" required>
                                        </div>
                                        <div class="w3-margin-bottom">
                                            <label for="icon" class="w3-label">Icon</label>
                                            <input type="text" class="w3-input w3-round w3-border" id="icon" name="icon" value="{{ $service->icon }}" placeholder="Icon URL">
                                        </div>
                                        <div class="w3-margin-bottom">
                                            <label for="icon_color" class="w3-label">Icon Color</label>
                                            <input type="text" class="w3-input w3-round w3-border" id="icon_color" name="icon_color" value="{{ $service->icon_color }}" placeholder="Icon Color (e.g., #ffffff)">
                                        </div>
                                        <div class="w3-margin-bottom">
                                            <label for="image" class="w3-label">Image</label>
                                            <input type="file" class="w3-input w3-round w3-border" id="image" name="image">
                                            @if($service->image)
                                                <img src="{{ asset($service->image) }}" alt="Service Image" class="w3-margin-top" style="max-width: 150px;">
                                            @endif
                                        </div>
                                        <div class="w3-margin-bottom">
                                            <label for="brief_description" class="w3-label">Brief Description</label>
                                            <input type="text" class="w3-input w3-round w3-border" id="brief_description" name="brief_description" value="{{ $service->brief_description }}" placeholder="Brief Description">
                                        </div>
                                        <div class="w3-margin-bottom">
                                            <label for="description" class="w3-label">Description</label>
                                            <textarea class="w3-input w3-round w3-border" id="description" name="description" rows="4" placeholder="Detailed Description" required>{{ $service->description }}</textarea>
                                        </div>
                                        <div class="w3-margin-bottom">
                                            <button type="submit" class="w3-button bg-app w3-primary w3-text-white w3-round">Update Service</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- ----- delete Service Model-- --}}
                        <div id="deleteModal{{ $service->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-2">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('deleteModal{{ $service->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Delete Service</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <h3 class="w3-center">Are You Sure, You want to delete This Service</h3>
                                    <form action="{{ route('service.destroy', $service->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <div class="w3-center">


                                            <button type="submit" class="w3-button w3-red w3-round">Delete</button>
                                            <button type="reset"
                                                onclick="document.getElementById('deleteModal{{ $service->id }}').style.display='none'"
                                                class="w3-button w3-gray w3-text-white w3-round">Cancel</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </tbody>


            </table>
            {{ $services->links('components.pagination') }}


        </div>
    </div>
@endsection
