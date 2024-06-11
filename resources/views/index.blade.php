<!DOCTYPE html>
<html lang="en" class="layout-pf layout-pf-fixed">
    <head>
      <title>@yield('title','Enterprise Monitoring System')</title>
      @include('head')
    </head>
    <body>
      @yield('content') 

      <!-- Begin CDN Content for frameworks --> 
      <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.27.5/js/patternfly.js"></script>
      <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
      <script src="/assets/js/c3.min.js"></script>
      <script src="/assets/js/d3.v3.js"></script>
      <script src="/assets/js/jquery.matchHeight-min.js"></script>
      <!-- End CDN Content for frameworks --> 

      @stack('script-libraries')

      <!-- Begin Stacked JavaScripts from template heirarchy --> 
      <script>
@stack('end-scripts')
      </script>
      <!-- End Stacked JavaScripts from template heirarchy --> 
    </body>
</html>
