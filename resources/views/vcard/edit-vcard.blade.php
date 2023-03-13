@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm mt-5 mb-5" style="width:60% !important;margin: 0 auto;">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <form action="{{route('vcard.update',$data->id)}}" method="POST" enctype="multipart/form-data" class="form">

                @csrf
                @method('PUT')

                <h2 class="text-center">123 NFC</h2>
                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="fname">First Name</label>
                            <input type="hidden" name="cardName" value="{{$data->cardName}}"  class="form-control" id="cardName" >

                            <input type="text" name="fname" value="{{$data->fname}}"  class="form-control" id="fname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="lname">Second Name</label>
                            <input type="text" name="lname" value="{{$data->lname}}" class="form-control" id="lname" placeholder="Last Name">
                        </div>
                    </div>
                </div>


                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <img class="img-thumbnail mb-4" src="{{asset('images/'.$data->avatar)}}" width="200" height="200" alt="avatar"> <br>
                            <label for="image">Add Avatar</label>
                            <input type="file" name="avatar" class="form-control" id="image" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <img  class="img-thumbnail mb-4"  src="{{asset('images/'.$data->logo)}}" width="200" height="200" alt="logo"> <br>
                            <label for="logo">Add Logo</label>
                            <input type="file" name="logo" class="form-control" id="=logo" accept="image/*">
                        </div>
                    </div>
                </div>



                <div class="form-group mt-3">
                    <label for="birthday">Add birthday</label>
                    <input type="date" class="form-control" value="{{$data->birthday}}" id="birthday_date" name="date" autocomplete="date" placeholder="DD-MM-YYYY" >

                </div>



                <div class="form-group mt-3">
                    <label for="title">Your Title</label>
                    <input type="text" name="title" value="{{$data->title}}" class="form-control" id="title" placeholder="title">
                </div>
                <div class="form-group mt-3">
                    <label for="organisationName">Organisation Name</label>
                    <input type="text" name="organisationName" value="{{$data->organisationName}}" class="form-control" id="organisationName" placeholder="Organisation Name">
                </div>
                <div class="form-group mt-3">
                    <label for="positionTitle">Position Title</label>
                    <input type="text" name="positionTitle" value="{{$data->positionTitle}}" class="form-control" id="positionTitle" placeholder="Position Title">
                </div>


                @foreach($phone as $number)
                    <div class="form-group mt-3">
                        <label for="phone3">Your Phone</label>
                        <input type="hidden" name="phone_id[]" value="{{$number->id}}" class="form-control" id="phone3" placeholder="Your Phone">

                        <input type="text" name="phone[]" value="{{$number->phone}}" class="form-control" id="phone3" placeholder="Your Phone">
                    </div>
                @endforeach

                @foreach($emails as $email)

                <div class="form-group mt-3">
                    <label for="email1">Your Email</label>
                    <input type="hidden" name="email_id[]" value="{{$email->id}}" class="form-control" id="email" placeholder="Your Email">

                    <input type="email" name="email[]" value="{{$email->email}}" class="form-control" id="email" placeholder="Your Email">
                </div>
                @endforeach

                @foreach($websites as $website)

                    <div class="form-group mt-3">
                        <label for="website">
                            Your website
                        </label>
                        <input type="hidden" name="website_id[]" value="{{$website->id}}" class="form-control" id="website" placeholder="Your website">

                        <input type="text" name="website[]" value="{{$website->url}}" class="form-control" id="website" placeholder="Your website">
                    </div>
                @endforeach

                @foreach($addresses as $address)
                    <div class="row no-gutters flex-grow-1 mt-3">
                        <div class="col-12 col-sm-3">
                            <input type="hidden" name="address_id[]" value="{{$address->id}}" class="form-control" id="website" placeholder="Your website">

                            <select class="form-control" name="address_type[]" id="address_type">
                                <option value="{{$address->address_type}}" selected="">{{$address->address_type}}</option>
                                <option value="WORK">Work</option>
                                <option value="Mailing">Mailing</option>
                                <option value="HOME">Home</option>
                                <option value="OTHER">Other</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-9">
                            <input type="text" value="{{$address->address_name}}" class="form-control" id="address_name" name="address_name[]" autocomplete="name" placeholder="Name" >
                        </div>

                        <div class="col-12">
                            <input type="text" value="{{$address->address_street}}"  class="form-control" id="address_street" name="address_street[]" autocomplete="address-line1" placeholder="Street Address" >
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" value="{{$address->address_extended}}" id="address_extended" name="address_extended[]" autocomplete="address-line2" placeholder="Apt, Suite, Bldg." >
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" id="address_city" value="{{$address->address_city}}" name="address_city[]" autocomplete="address-level2" placeholder="City" >
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" id="address_region" value="{{$address->address_region}}" name="address_region[]" autocomplete="address-level1" placeholder="Region" >
                        </div>
                        <div class="col-12 col-sm-6"> <input type="text" class="form-control" value="{{$address->country}}" id="country[]" name="Country[]" autocomplete="country" placeholder="Your country" >
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" id="address_zip[]" name="address_zip[]" value="{{$address->address_zip}}" autocomplete="postal-code" placeholder="Zip/Postal Code" >
                        </div>
                    </div>

                @endforeach




                <div class="form-group mt-3 pt-2 ">
                    <label for="notes">Your Notes</label>
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">
                        {{$data->notes}}
                    </textarea>
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

            var wrapper = $('#phone'); //Input field wrapper
            var wrapperEmail = $('#email'); //Input field wrapper

            var fieldHTML = '<div class="form-group mt-3"> <label for="phone3">Your Phone</label> <input type="text" name="phone[]" class="form-control" id="phone3" placeholder="Your Phone"> </div>';
            var emailHTML = '<div class="form-group mt-3"> <label for="email1">Your Email</label> <input type="email" name="email[]" class="form-control" id="email" placeholder="Your Email"> </div>'
            var websiteHtml = '<div class="form-group mt-3"><label for="website">Your website</label><input type="text" name="website[]" class="form-control" id="website" placeholder="Your website"> </div>'
            var addressHtml ='' +
                '<div class="row no-gutters flex-grow-1 mt-3"> <div class="col-12 col-sm-3"> ' +
                '<select class="form-control" name="address_type[]" id="address_type">' +
                ' <option value="" selected="">Type</option> ' +
                '<option value="WORK">Work</option> ' +
                '<option value="POSTAL">Mailing</option> ' +
                '<option value="HOME">Home</option> ' +
                '<option value="OTHER">Other</option> ' +
                '</select> ' +
                '</div> ' +
                '<div class="col-12 col-sm-9"> ' +
                '<input type="text" class="form-control" id="address_name" name="address_name[]" autocomplete="name" placeholder="Name" > ' +
                '</div>' +
                ' <div class="col-12">' +
                ' <input type="text" class="form-control" id="address_street" name="address_street[]" autocomplete="address-line1" placeholder="Street Address" > </div> <div class="col-12"> <input type="text" class="form-control" id="address_extended" name="address_extended[]" autocomplete="address-line2" placeholder="Apt, Suite, Bldg." > </div> <div class="col-12 col-sm-6"> <input type="text" class="form-control" id="address_city" name="address_city[]" autocomplete="address-level2" placeholder="City" > </div> <div class="col-12 col-sm-6"> <input type="text" class="form-control" id="address_region" name="address_region[]" autocomplete="address-level1" placeholder="Region" > </div> <div class="col-12 col-sm-6"> <input type="text" class="form-control" id="country[]" name="Country[]" autocomplete="country" placeholder="Your country" > </div> <div class="col-12 col-sm-6"> <input type="text" class="form-control" id="address_zip[]" name="address_zip[]" autocomplete="postal-code" placeholder="Zip/Postal Code" > </div> </div>';
            var x = 1; //Initial field counter is 1
            $(addButton).click(function(){ //Once add button is clicked
                if(x < 10){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(addButton).before(fieldHTML); // Add field html
                }
            });
            $(addEmail).click(function(){ //Once add button is clicked
                if(x < 10){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(addEmail).before(emailHTML); // Add field html
                }
            });
            $(addWebsite).click(function(){ //Once add button is clicked
                if(x < 10){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(addWebsite).before(websiteHtml); // Add field html
                }
            });
            $(addAddress).click(function(){ //Once add button is clicked
                if(x < 50){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(addAddress).before(addressHtml); // Add field html
                }
            });

            $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('span').remove(); //Remove field html
                x--; //Decrement field counter
            });

        });
    </script>
@endsection
