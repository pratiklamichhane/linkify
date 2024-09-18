<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LINKIFY</title>
    @include('layouts.components.styles')
</head>

<body>
    <div id="wrapper" class="animate">
       @include('layouts.components.navbar')
        <!-- other content -->
       @yield('content')
       <!-- other content -->
    </div>
    @include('layouts.components.scripts')
</body>
</html>

<!-- simply

We make layouts folder
inside layouts folder we make app.blade.php and components folder
inside components folder we make navbar.blade.php and styles.blade.php and scripts.blade.php
in app.blade.php we include navbar, styles and scripts