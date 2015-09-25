<!DOCTYPE html>
<html>
  @include('backend.includes.head2')
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      @include('backend.includes.header2')

      @include('backend.includes.sidebar2')

      @yield('content')

      @include('backend.includes.footer2')

      @include('backend.includes.controlbar2')
    </div>

    @include('backend.includes.script2')
  </body>
</html>
