
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>tickets</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</head>

<body>
@include("layouts.navbar")

@section('sidebar')
        @show
        
  <!-- Page Content -->
  <div class="container">

   @yield('content')

  </div>
  <!-- /.container -->

  @include("layouts.footer")

  <!-- Bootstrap core JavaScript -->
 

</body>

</html>
