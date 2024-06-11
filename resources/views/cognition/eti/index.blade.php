<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @yield('meta')
    @yield('base-title')
    @stack('css-includes')

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.27.5/css/patternfly.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.27.5/css/patternfly-additions.min.css">
    <style>
        BODY {
            background-color: white;
        }
    @stack('local-css')
    </style>
    @stack('scripts')
</head>
<body>
@yield('content')
@yield('footer')
@yield('errs')
<!-- Begin CDN Content for frameworks -->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.27.5/js/patternfly.js"></script>
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/c3.min.js"></script>
<script src="/assets/js/d3.v3.js"></script>
<script src="/assets/js/jquery.matchHeight-min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- End CDN Content for frameworks -->

@stack('script-libraries')

<!-- Begin Stacked JavaScripts from template heirarchy -->
<script>
    @stack('end-scripts')
</script>
<!-- End Stacked JavaScripts from template heirarchy -->
</body>
</html>