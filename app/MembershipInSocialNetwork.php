<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipInSocialNetwork extends Model
{
    protected $table='membership_social_network';
    protected $primaryKey='membershipId';
    public $timestamps=false;
}
