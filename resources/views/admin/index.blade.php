@extends('layouts.master')
@section('css')
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->

@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">

        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Vcard</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0"> Name</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0">Organisation Name</th>
                                <th class="border-bottom-0">position Title</th>
                                <th class="border-bottom-0">Card </th>
                                <th class="border-bottom-0">QR Code </th>
                                <th class="border-bottom-0">Download QR Code </th>


                            </tr>
                            </thead>
                            <tbody>


                            @foreach($vcard_data as $vcard )
                                <tr>
                                    <td>{{$vcard->fname}} {{$vcard->lname}}</td>
                                    <td>{{$vcard->title}}</td>
                                    <td>{{$vcard->organisationName}}</td>
                                    <td>{{$vcard->positionTitle}}</td>
                                    <td>
                                        <a href="{{asset('/vcards')."/".strtolower($vcard->cardName.$vcard->id).'.vcf'}}" style="color:black;">
                                            <i class="fa fa-2x fa-id-card "></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{asset('/qr-code')."/".strtolower($vcard->cardName.$vcard->id).'.png'}}" style="color:black;" target="{{asset('/qr-code')."/".strtolower($vcard->cardName.$vcard->id).'.png'}}">
                                            <i class="fa fa-2x fa-qrcode "></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{asset('/qr-code')."/".strtolower($vcard->cardName.$vcard->id).'.png'}}" style="color:black;" download>
                                            <i class="fa fa-2x fa-qrcode "></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.edit', $vcard->id)}}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('admin.destroy',$vcard->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->


    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection@extends('layouts.master')

