<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hakateq-solutions</title>
    <link rel="icon" href="{{ asset('image/hakateq_-removebg-preview.png') }}">
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
        <div class="w3-top w3-card w3-white" style="height:54px">
            <div class="w3-flex-bar w3-left-align">
                <div class="admin-logo w3-bar-item w3-hide-medium w3-hide-small">
                    <h5 class="" style="line-height:1; margin:0!important; font-weight:300">
                        <a href="" class="w3-button text-app w3-bold">
                            <img src="{{ asset('image/hakateq.png') }}" alt="w3mix" class="w3-image" width="26">
                            &nbsp; Hakateq Solutions </a>
                    </h5>
                </div>
                <label for="sidebar-control" class="w3-button  w3-large w3-opacity-min"><i
                        class="fa fa-bars"></i></label>
                <div class="w3-container w3-display-container" style="width:40%">
                    <div class="w3-display-right w3-padding-small w3-margin-right"
                        onclick="this.parentNode.children[1].focus()">
                        
                    </div>

                </div>
                <div class="w3-right">

                </div>
                <div class="text-right">
                    <div class="w3-button">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="w3-bar-item text-app w3-button w3-hover-text-primary"><i
                            class="fa fa-sign-out"></i>Logout</a>

                    </div>

                </div>
            </div>
        </div>

        {{-- sidebar here --}}
        @if (session('success'))
            <div class="w3-panel w3-green w3-round">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @include('hakateq_admin.layouts.sidebar-admin')

        <div class="w3-main" style="margin-top:54px">
            <div style="padding:16px 32px">
                @if (session('success'))
                <div class="w3-panel w3-green w3-round">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

                @yield('content')

            </div>

        </div>
    </div>
    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        function toggleDropdown(dropdownBtnId, dropdownContainerId, arrowIconId) {
            var dropdownBtn = document.getElementById(dropdownBtnId);
            var dropdownContainer = document.getElementById(dropdownContainerId);
            var arrowIcon = document.getElementById(arrowIconId);

            dropdownBtn.addEventListener('click', function() {
                dropdownBtn.classList.toggle('active');
                if (dropdownContainer.style.display === "block") {
                    dropdownContainer.style.display = "none";
                    arrowIcon.classList.remove('rotate-icon');
                } else {
                    dropdownContainer.style.display = "block";
                    arrowIcon.classList.add('rotate-icon');
                }
            });
        }

        // Initialize dropdowns
        toggleDropdown('dropdownBtn1', 'dropdownContainer1', 'arrowIcon1');
        toggleDropdown('dropdownBtn3', 'dropdownContainer3', 'arrowIcon3');
        toggleDropdown('dropdownBtn4', 'dropdownContainer4', 'arrowIcon4');
        toggleDropdown('dropdownBtn5', 'dropdownContainer5', 'arrowIcon5');
        toggleDropdown('dropdownBtn6', 'dropdownContainer6', 'arrowIcon6');
        toggleDropdown('dropdownBtn7', 'dropdownContainer7', 'arrowIcon7');
        toggleDropdown('dropdownBtn8', 'dropdownContainer8', 'arrowIcon8');
        toggleDropdown('dropdownBtn9', 'dropdownContainer9', 'arrowIcon9');
        toggleDropdown('dropdownBtn10', 'dropdownContainer10', 'arrowIcon10');
        toggleDropdown('dropdownBtn2', 'dropdownContainer2', 'arrowIcon2');
        toggleDropdown('accountBtn', 'accountContainer');
    </script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>

<script>
    tinymce.init({ selector: '#edito' });
</script>

</body>

</html>
