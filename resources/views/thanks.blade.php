@extends('layouts.master3')
@section('css')
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- row opened -->
    <div class="row row-sm">

   <div class="col-md-12">
       <div class="jumbotron text-center">
           <h1 class="display-3">Thank You!</h1>
           <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
           <hr>
           <p>
               Having trouble? <a href="https://mail.google.com/mail/?view=cm&fs=1&to=aminabdo8@gmail.com">Contact us</a>
           </p>
           <p class="lead">
               <a class="btn btn-primary btn-sm" href="{{url('/')}}" role="button">Continue to homepage</a>
           </p>
       </div>

   </div>

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
