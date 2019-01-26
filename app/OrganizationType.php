<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationType extends Model
{
    protected $table='organizationtype';
    protected $primaryKey='organizationTypeId';
    public $timestamps=false;
}
