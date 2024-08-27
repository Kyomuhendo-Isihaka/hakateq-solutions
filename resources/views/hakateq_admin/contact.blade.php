@extends('hakateq_admin.layouts.app')

@section('content')
    <div class="w3-white w3-round w3-margin-bottom w3-border">
        <header class="w3-padding-large w3-large w3-border-bottom" style="font-weight: 500">Contact Messages</header>

        <div class="w3-padding-large ">
            <input type="search" class="" name="searchInput" id="searchInput" onkeyup="searchTable()" placeholder="Search">



            <!-- Table with Borders -->
            <table id="tableData" class="w3-table w3-bordered w3-border w3-margin-top">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact Email</th>
                    <th scope="col">Date Sent</th>
                    <th scope="col">Action</th>
                </tr>
                <tbody>
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $i++ }}</td>
                            </th>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" id="dropdown1"
                                        class="w3-button w3-primary bg-app dropdown-btn">
                                        Action <i class="fa fa-chevron-down"></i>
                                    </a>
                                    <div id="dropdown-content1" class="dropdown-content">
                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('viewModal{{ $contact->id }}').style.display='block'"><i
                                                class="fa fa-eye"></i> View</a>

                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('deleteModal{{ $contact->id }}').style.display='block'"><i
                                                class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- view contact  Modal -->
                        <div id="viewModal{{ $contact->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-4">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('viewModal{{ $contact->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Contact Message</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <small class="w3-center">Date: {{$contact->created_at}}</small>
                                    <h4>Name: <small>{{$contact->name}}</small></h4>
                                    <h4>Email: <small>{{$contact->email}}</small></h4>
                                    <h4>Message:</h4>
                                    <p>{{$contact->message}}</p>
                                </div>
                            </div>
                        </div>



                        {{-- ----- delete team Member Model-- --}}
                        <div id="deleteModal{{ $contact->id }}" class="w3-modal">
                            <div class="w3-modal-content w3-animate-opacity w3-card-2">
                                <header class="w3-container bg-app">
                                    <span
                                        onclick="document.getElementById('deleteModal{{ $contact->id }}').style.display='none'"
                                        class="w3-button w3-text-white w3-display-topright">&times;</span>
                                    <h4 class="w3-text-white">Delete Message</h4>
                                </header>
                                <div class="w3-container w3-padding-large">
                                    <h3 class="w3-center">Are You Sure, You want to delete This Message</h3>
                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <div class="w3-center">


                                            <button type="submit" class="w3-button w3-red w3-round">Delete</button>
                                            <button type="reset"
                                                onclick="document.getElementById('deleteModal{{ $contact->id }}').style.display='none'"
                                                class="w3-button w3-gray w3-text-white w3-round">Cancel</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </tbody>


            </table>
            {{ $contacts->links('components.pagination') }}


        </div>
    </div>
@endsection
