<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailTamplate extends Model
{
    protected $table = 'mail_tamplate';
    protected $primaryKey = 'tamplateId';
    public $timestamps = false;
}
