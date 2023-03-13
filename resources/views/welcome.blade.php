@extends('layouts.master3')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <style>
    .form-group{
        margin-top: 25px;
    }
    </style>
@endsection
@section('content')

    <div class="row row-sm mt-5 mb-5" style="width:60% !important;margin: 0 auto;">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <form action="{{route("vcard.store")}}" method="POST" enctype="multipart/form-data" class="form">


                @csrf
                <h2 class="text-center">123 NFC</h2>
                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="fname">First Name</label>
                            <input type="text" value="{{old('fname')}}" name="fname" class="form-control" id="fname" placeholder="First Name">
                            <small>Please add your first name</small>
                            <div class="alert" style="color:red;">

                                @if($errors->has('fname'))
                                    @foreach ($errors->get('fname') as $message)
                                        {{$message}}

                                    @endforeach

                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="lname">Last Name</label>
                            <input type="text" value="{{old('lname')}}" name="lname" class="form-control" id="lname" placeholder="Last Name">
                            <small>Please add your second name</small>

                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="email_auth">Your  Email</label>
                            <input type="email" value="{{old('email_auth')}}" name="email_auth" class="form-control" id="email_auth" placeholder="Your Email">
                            <small>Please add your Email</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="pass_auth">Your Password</label>
                            <input type="password" value="{{old('pass_auth')}}" name="pass_auth" class="form-control" id="pass_auth" placeholder="Last Name">
                            <small>Please add your Password</small>

                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="title"> Title</label>
                    <input type="text" value="{{old('title')}}"  name="title" class="form-control" id="title" placeholder="title">
                    <small>Please add your title like : "Dr","Eng"</small>

                </div>
                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="image">Photo</label>
                            <input type="file" name="avatar" class="form-control" id="image" accept="image/*, application/pdf" >
                            <small>Please add your Photo</small>

                            <div class="alert" style="color:red;">

                                @if($errors->has('avatar'))
                                    @foreach ($errors->get('avatar') as $message)
                                        {{$message}}

                                    @endforeach

                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="logo"> Logo</label>
                            <input type="file" name="logo" class="form-control" id="=logo" accept="image/*">
                            <small>Please add your Logo Photo</small>

                            <div class="alert" style="color:red;">

                            @if($errors->has('logo'))
                                @foreach ($errors->get('logo') as $message)
                                    {{$message}}

                                @endforeach

                            @endif
                        </div>
                    </div>

                 </div>
                </div>



                <div class="form-group mt-3">
                    <label for="birthday">Birthday</label>
                    <input type="date"  value="{{old('date')}}" class="form-control" id="birthday_date" name="date" autocomplete="date" placeholder="DD-MM-YYYY" >
                    <small>Please add your Birthday</small>

                </div>

                <div class="form-group mt-3">
                    <label for="organisationName">Organisation Name</label>
                    <input type="text"  value="{{old('organisationName')}}" name="organisationName" class="form-control" id="organisationName" placeholder="Organisation Name">
                    <small>Please add your Organisation Name</small>

                </div>
                <div class="form-group mt-3">
                    <label for="positionTitle">Position Title</label>
                    <input type="text" value="{{old('positionTitle')}}"  name="positionTitle" class="form-control" id="positionTitle" placeholder="Position Title">
                    <small>Please add your Position Title</small>

                </div>


                <div class="form-group mt-3 pt-2 ">
                    <a href="javascript:void(0);" class="add_phone  " title="Add Phone Details">Add Phone</a>

                </div>

                <div class="form-group mt-3 pt-2 ">
                    <a href="javascript:void(0);" class="add_email" title="Add Email Details">Add Email</a>

                </div>
                <div class="form-group mt-3 pt-3 ">
                    <a href="javascript:void(0);" class="add_website" title="Add website Details">Add Website</a>

                </div>
                <div class="form-group mt-3 pt-2 ">
                    <a href="javascript:void(0);" class="add_address" title="Add address Details">Add Address</a>
                </div>


                <div class="form-group mt-3 pt-2 ">
                    <label for="notes"> Notes</label>
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control"></textarea>
                    <small>Please add your Notes</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- row -->


    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>

    <script>
        $(document).ready(function(){



            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_phone'); //Add button selector
            var addEmail = $('.add_email'); //Add button selector
            var addWebsite = $('.add_website'); //Add button selector
            var addAddress = $('.add_address'); //Add button selector


            var wrapperEmail = $('#email'); //Input field wrapper

            var fieldHTML = '<div class="form-group mt-3 "> <label for="phone3" >' +
                'Your Phone</label> ' +
                 '<div class="row">' +
                '<div class="col-md-11"><input type="text"  name="phone[]" class="form-control " id="phone3" placeholder="Your Phone"></div>' +
                ' <div class="col-md-1"><button class="remove-button btn btn-danger">x</button></div> ' +
                 '<small>Please add your Phone</small>' +
                 '</div>'+
                '</div>';
            var emailHTML = '<div class="form-group mt-3 email"> ' +
                '<label for="email1">Your Email</label> ' +
                '<div class="row">' +
                '<div class="col-md-11"><input type="email"  name="email[]" class="form-control " id="email" placeholder="Your Email"> </div>' +
                '<div class="col-md-1"><button class="remove-button btn btn-danger">x</button></div> ' +
                '<small>Please add your Email</small>' +
                '</div>'+
                '</div>'
            var websiteHtml = '' +
                '<div class="form-group mt-3 website">' +
                '<label for="website">Your Website</label>' +
                '<div class="row">' +
                '<div class="col-md-11"><input type="text" name="website[]"  class="form-control" id="website" placeholder="Your website"></div>' +
                ' <div class="col-md-1"><button class="remove-button btn btn-danger">x</button></div> ' +
                '<small>Please add your Website</small>' +

                '</div>'+
                '</div>'
            var addressHtml ='' +
                '<div class="row"><div class="col-md-11"><div class="row no-gutters flex-grow-1 mt-3 address">' +
                ' <div class="col-12 col-sm-3"> <select class="form-control"  name="address_type[]" id="address_type"> <option value="" selected="">Type</option> <option value="WORK">Work</option> <option value="POSTAL">Mailing</option> <option value="HOME">Home</option> <option value="OTHER">Other</option> </select> </div> <div class="col-12 col-sm-9"> <input type="text" class="form-control" id="address_name" name="address_name[]" autocomplete="name" placeholder="Name" > </div> <div class="col-12"> <input type="text" class="form-control" id="address_street" name="address_street[]" autocomplete="address-line1" placeholder="Street Address" > </div> <div class="col-12"> <input type="text" class="form-control" id="address_extended" name="address_extended[]" autocomplete="address-line2" placeholder="Apt, Suite, Bldg." > </div> <div class="col-12 col-sm-6"> <input type="text" class="form-control" id="address_city" name="address_city[]" autocomplete="address-level2" placeholder="City" > </div> <div class="col-12 col-sm-6"> <input type="text" class="form-control" id="address_region" name="address_region[]" autocomplete="address-level1" placeholder="Region" > </div> <div class="col-12 col-sm-6"> <input type="text" class="form-control" id="country[]" name="Country[]" autocomplete="country" placeholder="Your country" > </div> <div class="col-12 col-sm-6"> <input type="text" class="form-control" id="address_zip[]" name="address_zip[]" autocomplete="postal-code" placeholder="Zip/Postal Code" > </div></div></div>' +
                ' <div class="col-md-1"><button class="remove-button-address btn btn-danger">x</button></div>' +
                '<small>Please add your Address</small>' +

                ' </div>';
            var x = 1; //Initial field counter is 1
            $(addButton).click(function(){ //Once add button is clicked
                if(x < 100){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(addButton).before(fieldHTML); // Add field html
                }
            });
            $(addEmail).click(function(){ //Once add button is clicked
                if(x < 100){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(addEmail).before(emailHTML); // Add field html
                }
            });
            $(addWebsite).click(function(){ //Once add button is clicked
                if(x < 100){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(addWebsite).before(websiteHtml); // Add field html
                }
            });
            $(addAddress).click(function(){ //Once add button is clicked
                if(x < 100){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(addAddress).before(addressHtml); // Add field html
                }
            });

            $('.form-group').on('click', '.remove-button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent().parent().parent().remove(); //Remove field html
                x--; //Decrement field counter
            });
            $('.form-group').on('click', '.remove-button-address', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent().parent().remove(); //Remove field html
                x--; //Decrement field counter
            });

        });
    </script>
@endsection
