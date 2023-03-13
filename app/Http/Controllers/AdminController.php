<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Email;
use App\Models\Phone;
use App\Models\User;
use App\Models\vcard;
use App\Models\Website;
use Com\Tecnick\Barcode\Barcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function index(){
        $vcard_data = DB::table("vcards")->get();

            return view('admin.index',compact('vcard_data'));
    }

    public function create()
    {
        //
        return view('admin.add-vcard');


    }

    public function store(Request $request)
    {
        $vcard = new \JeroenDesloovere\VCard\VCard();
        $cardName =$this->incrementalHash(30);

        $emails = $request->get('email');

        $phones = $request->get('phone');

        $websites = $request->get('website');

        $address_type = $request->get('address_type');
        $address_name = $request->get('address_name');
        $address_street = $request->get('address_street');
        $address_extended = $request->get('address_extended');
        $address_city= $request->get('address_city');
        $address_region = $request->get('address_region');
        $country = $request->get('Country');
        $address_zip = $request->get('address_zip');






        $errors = Validator::make($request->all(), [
                'fname' => 'required|max:255',
                'website' => 'active_url',
                'logo' => 'mimes:jpeg,png,bmp,tiff |max:4096',
                'avatar' => 'mimes:jpeg,png,bmp,tiff |max:4096',
            ]
        );

        if($errors->fails())
        {
            return redirect()->back()->withErrors($errors)->withInput();
        }


        $fname = $request->fname;
        $lname = $request->lname;
        if (Str::length($request->file('avatar')) > 0){
            $imageName = time().'.'.$request->file('avatar')->extension();

            $request->file('avatar')->move(public_path('images'), $imageName);

        }else{
            $imageName = "avatar.png";
        }

        if (Str::length($request->file('logo')) > 0){
            $logoName = time().'.'.$request->file('logo')->extension();

            $request->logo->move(public_path('images'), $logoName);
        }else{
            $logoName = "avatar.png";
        }

        $user = Auth::user();

        $date = $request->date;
        $title = $request->title;
        $organisationName = $request->organisationName;
        $positionTitle = $request->positionTitle;
        $notes = $request->notes;
        $user_id = $user->id;



        $vc =  vcard::create([
            'cardName' => $cardName,
            'fname'=>$fname,
            "lname"=>$lname,
            "avatar"=> $imageName,
            "logo"=> $logoName,
            "birthday"=> $date,
            "title"=>$title,
            "organisationName"=> $organisationName,
            "positionTitle" => $positionTitle,
            "notes" => $notes,
            "user_id" =>$user_id
        ]);

        if($emails > 0){
            foreach ($emails as $item => $index){
                DB::table('emails')->insert([
                    'card_id' => $vc->id,
                    'email' => $emails[$item],
                ]);
                $vcard->addEmail($emails[$item]);
            }
        }else{
            $request->email = '';
        }

        if ($websites > 0){
            foreach ($request->website as $item => $index){
                DB::table('websites')->insert([
                    'card_id' => $vc->id,
                    'url' => $websites[$item],
                ]);
                $vcard->addURL($websites[$item]);
            }
        }else{
            $request->website = '';

        }

        if ($request->address_name > 0){
            foreach ($request->address_type as $item => $index){
                DB::table('addresses')->insert([
                    'card_id' => $vc->id,
                    'address_type' => $address_type[$item],
                    'address_name' => $address_name[$item],
                    'address_street' => $address_street[$item],
                    'address_extended' => $address_extended[$item],
                    'address_city' => $address_city[$item],
                    'address_region' => $address_region[$item],
                    'country' => $country[$item],
                    'address_zip' => $address_zip[$item],
                ]);
                $vcard->addAddress($address_name[$item],$address_extended[$item],$address_street[$item],$address_city[$item],$address_region[$item],$address_zip[$item],$country[$item],$address_type[$item]);

            }
        }else{
            $request->address_type = '';
            $request->address_name = '';
            $request->address_street = '';
            $request->address_extended = '';
            $request->address_city = '';
            $request->address_region = '';
            $request->Country = '';
            $request->address_zip = '';
        }


        if ($request->phone > 0){
            foreach ($request->phone as $item => $index){
                DB::table('phones')->insert([
                    'card_id' => $vc->id,
                    'phone' => $phones[$item],
                ]);
                $vcard->addPhoneNumber($phones[$item]);
            }
        }else{
            $request->phone = '';
        }





        if ($vc){
            // define vcard

// define variables
            $lastname = $fname;
            $firstname = $lname;
            $additional = '';
            $prefix = '';
            $suffix = $request->suffix;

// add personal data
            $vcard->addName($lname, $fname, $additional, $title,$prefix );

// add work data
            $vcard->addRole($positionTitle);
            $vcard->addBirthday($date);
            $vcard->addCompany($organisationName);
            $vcard->addPhoto(public_path(). "/images/" . $imageName);
//            $vcard->addAddress($address_name,$address_extended,$address_street,$address_city,$address_region,$address_zip,$country,$address_type);


// save vcard on disk
            if (!file_exists(public_path('vcards'))) {
                mkdir(public_path('vcards'), 0777, true);
            }
            $barcode = new Barcode();

            if (!file_exists(public_path('qr-code'))) {
                mkdir(public_path('qr-code'), 0777, true);
            }
            $targetPath = public_path('qr-code');

            $bobj = $barcode->getBarcodeObj('QRCODE,H',asset('vcards')."/". strtolower($cardName.$vc->id ) .".vcf" , - 16, - 16, 'black', array(
                - 2,
                - 2,
                - 2,
                - 2
            ))->setBackgroundColor('#f0f0f0');

            $imageData = $bobj->getPngData();

            file_put_contents("qr-code/" . $cardName.$vc->id. '.png', $imageData);
            $vcard->setFilename($cardName.$vc->id);
            $vcard->setSavePath("vcards");
            $vcard->save();
            if (Auth::check()){
                return Redirect::to('vcard');

            }else{
                return Redirect::to('thanks');
            }
        }else{
            return Redirect::to('/')->with('errors');

        }


    }
    public  function incrementalHash($len = 5){
        $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $base = strlen($charset);
        $result = '';

        $now = explode(' ', microtime())[1];
        while ($now >= $base){
            $i = $now % $base;
            $result = $charset[$i] . $result;
            $now /= $base;
        }
        return substr($result, -5);
    }

    public function edit($id)
    {
        $data = vcard::find($id);
        $phone = vcard::find($id)->phone;
        $emails = vcard::find($id)->email;
        $websites = vcard::find($id)->website;
        $addresses = vcard::find($id)->address;
        return view('admin.edit-vcard',compact('data','phone','emails','websites','addresses'));

    }


    public function update(Request $request,$id)
    {

        $vcard = new \JeroenDesloovere\VCard\VCard();
        $cardName = $request->cardName;


        $emails = $request->get('email');

        $phones = $request->get('phone');
        $phones_id = $request->get('phone_id');
        $websites = $request->get('website');
        $websites_id = $request->get('website_id');
        $emails_id = $request->get('email_id');
        $address_id = $request->get('address_id');
        $address_type = $request->get('address_type');
        $address_name = $request->get('address_name');
        $address_street = $request->get('address_street');
        $address_extended = $request->get('address_extended');
        $address_city= $request->get('address_city');
        $address_region = $request->get('address_region');
        $country = $request->get('Country');
        $address_zip = $request->get('address_zip');

        $oldImage = DB::table('vcards')->find($id);



        $fname = $request->fname;
        $lname = $request->lname;
        $title = $request->title;




        if ($request->hasFile('avatar') && $request->avatar != ''){
            $imageName = time().'.'.$request->file('avatar')->extension();
            $request->file('avatar')->move(public_path('images'), $imageName);
        }else if ($request->avatar == ''){
            if ($oldImage->avatar != ''){
                $imageName = $oldImage->avatar;
            }else{
                $imageName = "avatar.png";

            }
        }


        if ($request->hasFile('logo') && $request->logo != ''){
            $logoName = time().'.'.$request->file('logo')->extension();

            $request->logo->move(public_path('images'), $logoName);
        }else if ($request->logo == ''){
            if ($oldImage->logo != ''){
                $logoName = $oldImage->logo;
            }else{
                $logoName = "avatar.png";

            }
        }




        $organisationName = $request->organisationName;
        $positionTitle = $request->positionTitle;
        $date = $request->date;
        $notes = $request->notes;

        $data=array(

            'cardName' => $cardName,
            'fname'=>$fname,
            "lname"=>$lname,
            "avatar"=> $imageName,
            "logo"=> $logoName,
            "birthday"=> $date,

            "title"=>$title,
            "organisationName"=> $organisationName,
            "positionTitle" => $positionTitle,
            "notes" => $notes

        );



        $update = DB::table('vcards')
            ->where('id', $id)
            ->update($data);


        if ($request->phone > 0){
            foreach ($request->phone as $item => $index){
                DB::table('phones')
                    ->where('id', $phones_id[$item])
                    ->update(array(
                        'card_id' => $id,
                        'phone' =>  $phones[$item]
                    ));
                $vcard->addPhoneNumber($phones[$item]);
            }
        }else{
            $request->phone = '';
        }
        if ($request ->website > 0){
            foreach ($request->website as $item => $index){
                DB::table('websites')
                    ->where('id', $websites_id[$item])
                    ->update(array(
                        'card_id' => $id,
                        'url' =>  $websites[$item]
                    ));
                $vcard->addURL($websites[$item]);
            }
        }else{
            $request->phone = '';
        }
        if ($request->email > 0){
            foreach ($request->email as $item => $index){
                DB::table('emails')
                    ->where('id', $emails_id[$item])
                    ->update(array(
                        'card_id' => $id,
                        'email' =>  $emails[$item]
                    ));
                $vcard->addEmail($emails[$item]);
            }
        }else{
            $request->phone = '';
        }
        if ($request->address_name > 0){
            foreach ($request->address_name as $item => $index){
                DB::table('addresses')
                    ->where('id', $address_id[$item])
                    ->update(array(
                        'card_id' => $id,
                        'address_type' =>  $address_type[$item],
                        'address_name' =>  $address_name[$item],
                        'address_street' =>  $address_street[$item],
                        'address_extended' =>  $address_extended[$item],
                        'address_city' =>  $address_city[$item],
                        'address_region' =>  $address_region[$item],
                        'country' =>  $country[$item],
                        'address_zip' => $address_zip[$item],

                    ));
                $vcard->addAddress($address_name[$item],$address_extended[$item],$address_street[$item],$address_city[$item],$address_region[$item],$address_zip[$item],$country[$item],$address_type[$item]);
            }
        }else{
            $request->phone = '';
        }


        if ($update){
            // define vcard

// define variables
            $lastname = $fname;
            $firstname = $lname;
            $additional = '';
            $prefix = '';
            $suffix = $request->suffix;

// add personal data
            $vcard->addName($lname, $fname, $additional, $title,$prefix );

// add work data
            $vcard->addRole($positionTitle);
            $vcard->addBirthday($date);
            $vcard->addCompany($organisationName);
            $vcard->addPhoto(public_path(). "/images/" . $imageName);


// save vcard on disk
            if (!file_exists(public_path('vcards'))) {
                mkdir(public_path('vcards'), 0777, true);
            }
            $barcode = new Barcode();

            if (!file_exists(public_path('qr-code'))) {
                mkdir(public_path('qr-code'), 0777, true);
            }
            $targetPath = public_path('qr-code');

            $bobj = $barcode->getBarcodeObj('QRCODE,H',asset('vcards')."/" .strtolower($cardName.$id).".vcf" , - 16, - 16, 'black', array(
                - 2,
                - 2,
                - 2,
                - 2
            ))->setBackgroundColor('#f0f0f0');

            $imageData = $bobj->getPngData();

            file_put_contents("qr-code/" . $cardName.$id . '.png', $imageData);
            $vcard->setFilename($cardName.$id);
            $vcard->setSavePath("vcards");
            $vcard->save();
        }
        return redirect('/vcard');

    }

    public function destroy($id )
    {
        Phone::where('card_id',$id)->delete();
        Website::where('card_id',$id)->delete();
        Email::where('card_id',$id)->delete();
        Address::where('card_id',$id)->delete();
        vcard::where('id',$id)->delete();

        return redirect('/admin');

    }


}

