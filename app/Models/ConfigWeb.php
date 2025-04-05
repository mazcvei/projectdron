<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigWeb extends Model
{
    protected $table = "config_webs";
    protected $fillable = ["logo","email_contact","facebook","instagram"];

}
