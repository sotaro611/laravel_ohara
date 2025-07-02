<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    //
    protected $fillable = [
        'name',
        'title',
        'email',
        'password',
        'url',
        'gender',
        'age',
        'contact',

    ];
}
