@extends('hakateq_admin.layouts.app')

@section('content')
    <div class="w3-white w3-round w3-margin-bottom w3-border">
        <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Blog Posts
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
                        <h4 class="w3-text-white">Add New Blog</h4>
                    </header>
                    <div class="w3-container w3-padding-large">
                        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="w3-margin-bottom">
                                <label for="title" class="w3-label w3-text-teal">Blog Title</label>
                                <input type="text" name="title" class="w3-input w3-round w3-border" id="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="meta_description" class="w3-label w3-text-teal">Meta Description</label>
                                <input type="text" name="meta_description" class="w3-input w3-round w3-border" id="meta_description" value="{{ old('meta_description') }}" maxlength="160">
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="image" class="w3-label w3-text-teal">Blog Image</label>
                                <input type="file" name="image" class="w3-input w3-round w3-border" id="image">
                            </div>
                            <div class="w3-margin-bottom">
                                <label for="content" class="w3-label w3-text-teal">Blog Content</label>
                                <textarea name="content" class="w3-input w3-round w3-border" id="content" rows="10" required>{{ old('content') }}</textarea>
                            </div>


                            <div class="w3-margin-bottom">
                                <label for="published_at" class="w3-label w3-text-teal">Published At</label>
                                <input type="hidden" name="published_at" id="published_at" value="{{ now()->format('Y-m-d') }}">
                                <input type="text" name="published_at_display" class="w3-input w3-round w3-border" id="published_at_display" value="{{ now()->format('F j, Y') }}" readonly>
                            </div>

                            <div class="w3-margin-bottom">
                                <label for="author" class="w3-label w3-text-teal">Author</label>
                                <input type="text" name="author" class="w3-input w3-round w3-border" id="author" value="{{ Auth::user()->name }}" readonly>
                            </div>



                            <div class="w3-margin-bottom">
                                <button type="submit" class="w3-button bg-app w3-primary w3-text-white w3-round">Add Blog</button>
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
                    <th scope="col">Published by</th>
                    <th scope="col">Date Published</th>
                    <th scope="col">Action</th>

                </tr>
                <tbody>
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $i++ }}</td>
                            </th>
                            <td>
                                <img src="{{asset($blog->image_path)}}" width="100" alt="">
                            </td>
                           <td>{{$blog->title}}</td>
                           <td>{{$blog->author}}</td>
                           <td>{{ \Carbon\Carbon::parse($blog->published_at)->format('F j, Y') }}</td>

                            <td>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" id="dropdown1"
                                        class="w3-button w3-primary bg-app dropdown-btn">
                                        Action <i class="fa fa-chevron-down"></i>
                                    </a>
                                    <div id="dropdown-content1" class="dropdown-content">
                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('viewModal{{ $blog->id }}').style.display='block'"><i
                                                class="fa fa-eye"></i> View</a>
                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('editModal{{ $blog->id }}').style.display='block'">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>

                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('deleteModal{{ $blog->id }}').style.display='block'"><i
                                                class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- view team member Modal -->
                        <div id="viewModal{{ $blog->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('viewModal{{ $blog->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Blog</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <div class="w3-container w3-card-4 w3-light-grey w3-padding-16">
                                        <p><small>Published on {{ \Carbon\Carbon::parse($blog->published_at)->format('F j, Y') }}</small></p>
                                        <p>Author: <small>{{$blog->author}}</small></p>
                                        <div class="w3-center">
                                            <h4>{{$blog->title}}</h4>
                                            <img src="{{asset($blog->image_path)}}" alt="">

                                        </div>
                                        <h5>Meta Description</h5>
                                            <p>{{$blog->meta_description}}</p>
                                        <h5>Blog Content</h5>
                                        <p>{{$blog->content}}</p>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- edit blog Modal -->
                        <div id="editModal{{ $blog->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('editModal{{ $blog->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Edit Blog</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="w3-margin-bottom">
                                            <label for="title" class="w3-label w3-text-teal">Blog Title</label>
                                            <input type="text" name="title" class="w3-input w3-round w3-border" id="title" value="{{ old('title', $blog->title) }}" required>
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <label for="meta_description" class="w3-label w3-text-teal">Meta Description</label>
                                            <input type="text" name="meta_description" class="w3-input w3-round w3-border" id="meta_description" value="{{ old('meta_description', $blog->meta_description) }}" maxlength="160">
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <label for="image" class="w3-label w3-text-teal">Blog Image</label>
                                            <input type="file" name="image" class="w3-input w3-round w3-border" id="image">

                                            @if($blog->image_path)
                                                <img src="{{ asset($blog->image_path) }}" alt="Blog Image" class="w3-image w3-margin-top" style="max-width: 200px;">
                                            @endif
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <label for="content" class="w3-label w3-text-teal">Blog Content</label>
                                            <textarea name="content" class="w3-input w3-round w3-border" id="content" rows="10" required>{{ old('content', $blog->content) }}</textarea>
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <label for="published_at" class="w3-label w3-text-teal">Published At</label>
                                            <input type="hidden" name="published_at" id="published_at" value="{{ $blog->published_at }}">
                                            <input type="text" name="published_at_display" class="w3-input w3-round w3-border" id="published_at_display" value="{{ \Carbon\Carbon::parse($blog->published_at)->format('F j, Y') }}" readonly>
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <label for="author" class="w3-label w3-text-teal">Author</label>
                                            <input type="text" name="author" class="w3-input w3-round w3-border" id="author" value="{{ Auth::user()->name }}" readonly>
                                        </div>

                                        <div class="w3-margin-bottom">
                                            <button type="submit" class="w3-button bg-app w3-primary w3-text-white w3-round">Update Blog</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        {{-- ----- delete blog Model-- --}}
                        <div id="deleteModal{{ $blog->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-2">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('deleteModal{{ $blog->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Delete Service</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <h3 class="w3-center">Are You Sure, You want to delete This Blog</h3>
                                    <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <div class="w3-center">


                                            <button type="submit" class="w3-button w3-red w3-round">Delete</button>
                                            <button type="reset"
                                                onclick="document.getElementById('deleteModal{{ $blog->id }}').style.display='none'"
                                                class="w3-button w3-gray w3-text-white w3-round">Cancel</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </tbody>


            </table>
            {{ $blogs->links('components.pagination') }}


        </div>
    </div>
@endsection
