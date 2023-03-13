<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vcard extends Model
{
    use HasFactory;
    public $keyType = 'string';

    protected $fillable = [
        'cardName'
        ,'fname'
        , 'lname'
        , 'avatar'
        , 'logo'
        , 'company'
        , 'birthday'
        , 'title'
        , 'organisationName'
        , 'positionTitle'
        , 'notes'
        , 'user_id'


    ];

    public function phone()
    {
        return $this->hasMany(Phone::class,'card_id');
    }
    public function email()
    {
        return $this->hasMany(Email::class,'card_id');
    }
    public function website()
    {
        return $this->hasMany(Website::class,'card_id');
    }
    public function address()
    {
        return $this->hasMany(Address::class,'card_id');
    }

}
