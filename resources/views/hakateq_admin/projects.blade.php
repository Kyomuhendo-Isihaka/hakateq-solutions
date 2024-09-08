@extends('hakateq_admin.layouts.app')

@section('content')
    <div class="w3-white w3-round w3-margin-bottom w3-border">
        <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Projects
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
                        <h4 class="w3-text-white">Add New Project</h4>
                    </header>
                    <div class="w3-container w3-padding-large">
                        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="w3-margin-bottom">
                                <label for="title" class="w3-label w3-text-teal">Project Title</label>
                                <input type="text" name="title" class="w3-input w3-round w3-border" id="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="title" class="w3-label w3-text-teal">Project Type</label>
                                <input type="text" name="type" class="w3-input w3-round w3-border" id="title" value="{{ old('type') }}" required>
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="title" class="w3-label w3-text-teal">Project LinK</label>
                                <input type="text" name="link" class="w3-input w3-round w3-border" id="title" value="{{ old('link') }}" required>
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="meta_description" class="w3-label w3-text-teal"> Description</label>
                                <textarea id="editor" name="description" class="w3-input w3-round w3-border"  cols="30" rows="10"></textarea>
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="image" class="w3-label w3-text-teal">Project Image</label>
                                <input type="file" name="project_image" class="w3-input w3-round w3-border" id="image">
                            </div>


                            <div class="w3-margin-bottom">
                                <button type="submit" class="w3-button bg-app w3-primary w3-text-white w3-round">Add Project</button>
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
                    <th scope="col">Image</th>
                     <th scope="col">Title</th>
                    <th scope="col">Link</th>

                    <th scope="col">Action</th>

                </tr>
                <tbody>
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $i++ }}</td>
                            </th>
                            <td>
                                <img src="{{asset($project->project_image)}}" width="100" alt="">
                            </td>
                           <td>{{$project->title}}</td>
                           <td>{{$project->link}}</td>


                            <td>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" id="dropdown1"
                                        class="w3-button w3-primary bg-app dropdown-btn">
                                        Action <i class="fa fa-chevron-down"></i>
                                    </a>
                                    <div id="dropdown-content1" class="dropdown-content">
                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('viewModal{{ $project->id }}').style.display='block'"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('editModal{{ $project->id }}').style.display='block'">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('deleteModal{{ $project->id }}').style.display='block'"><i
                                                class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- view team member Modal -->
                        <div id="viewModal{{ $project->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('viewModal{{ $project->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Project {{ $project->title }}</h4>
                                </header>

                                <div class="w3-container w3-white">
                                    <div class="w3-center">
                                    <h5 >{{ $project->title }}</h5>
                                    <p ><small>{{ $project->type }}</small></p>
                                    <p ><small>{{ $project->link }}</small></p>

                                    </div>
                                    <img src="{{ asset($project->project_image) }}" alt="">
                                    <p>{{ $project->description }}</p>
                                </div>

                            </div>
                        </div>

                        <!-- edit blog Modal -->
                        <div id="editModal{{ $project->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('editModal{{ $project->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Edit Project</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="w3-margin-bottom">
                                            <label for="title" class="w3-label w3-text-teal">Project Title</label>
                                            <input type="text" name="title" class="w3-input w3-round w3-border" id="title" value="{{ old('title', $project->title) }}" required>
                                        </div>
                                        <div class="w3-margin-bottom">
                                            <label for="title" class="w3-label w3-text-teal">Project Type</label>
                                            <input type="text" name="type" class="w3-input w3-round w3-border" id="title" value="{{ old('type', $project->type) }}" required>
                                        </div>
                                        <div class="w3-margin-bottom">
                                            <label for="title" class="w3-label w3-text-teal">Project Link</label>
                                            <input type="text" name="link" class="w3-input w3-round w3-border" id="title" value="{{ old('link', $project->link) }}" required>
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <label for="meta_description" class="w3-label w3-text-teal">Description</label>
                                            <input type="text" name="description" class="w3-input w3-round w3-border" id="meta_description" value="{{ old('description', $project->description) }}" maxlength="160">
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <label for="image" class="w3-label w3-text-teal">Project Image</label>
                                            <input type="file" name="project_image" class="w3-input w3-round w3-border" id="image">

                                            @if($project->project_path)
                                                <img src="{{ asset($project->project_image) }}" alt="projectImage" class="w3-image w3-margin-top" style="max-width: 200px;">
                                            @endif
                                        </div>




                                        <div class="w3-margin-bottom">
                                            <button type="submit" class="w3-button bg-app w3-primary w3-text-white w3-round">Update Blog</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        {{-- ----- delete blog Model-- --}}
                        <div id="deleteModal{{ $project->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-2">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('deleteModal{{ $project->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Delete project</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <h3 class="w3-center">Are You Sure, You want to delete This Project</h3>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <div class="w3-center">


                                            <button type="submit" class="w3-button w3-red w3-round">Delete</button>
                                            <button type="reset"
                                                onclick="document.getElementById('deleteModal{{ $project->id }}').style.display='none'"
                                                class="w3-button w3-gray w3-text-white w3-round">Cancel</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </tbody>


            </table>
            {{ $projects->links('components.pagination') }}


        </div>
    </div>
@endsection
