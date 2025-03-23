<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Admin Dashboard</title>
    @vite(['resources/css/app.css'])
    <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/header.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/footer.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/card.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/darkTheme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/tagify.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/default-button.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/simplemde.min.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>
<div class="dashboard">
    {{ $slot }}
</div>
@vite(['resources/js/app.js'])
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script rel="text/javascript" src="{{ asset('assets/js/simplemde.min.js') }}"></script>
<script rel="text/javascript" src="{{ asset('assets/js/sidebar.js') }}"></script>
<script rel="text/javascript" src="{{ asset('assets/js/profile.js') }}"></script>
<script rel="text/javascript" src="{{ asset('assets/js/darkTheme.js') }}"></script>
<script rel="text/javascript" src="{{ asset('assets/js/tagify.min.js') }}"></script>
<script rel="text/javascript" src="{{ asset('assets/js/tags.js') }}"></script>
<script rel="text/javascript" src="{{ asset('assets/js/custom-simplemade.js') }}"></script>


</body>

</html>
