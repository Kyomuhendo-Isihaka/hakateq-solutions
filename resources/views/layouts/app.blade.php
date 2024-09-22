<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakateq Solutions</title>

    <link rel="icon" href="{{asset('image/logo_red.png')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">



</head>

<body>

    @include('layouts.header')

    <main class="mt-5">
        @yield('content')
    </main>

    @include('layouts.pricing')
    @include('layouts.footer')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: [{
                        title: 'Career Development Workshop',
                        start: '2024-09-25T10:00:00',
                        end: '2024-09-25T15:00:00',
                        description: 'Join us for a comprehensive workshop on career development.'
                    },
                    {
                        title: 'Webinar: Navigating Career Transitions',
                        start: '2024-10-10T14:00:00',
                        end: '2024-10-10T16:00:00',
                        description: 'Webinar on strategies for transitioning to new careers.'
                    }
                    // Add more events as needed
                ],
                eventClick: function(event) {
                    alert(event.title + "\n" + event.description);
                    return false;
                }
            });
        });
    </script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({ selector: '#edito' });
</script>

</body>

</html>
