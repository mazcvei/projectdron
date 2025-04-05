<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CropType extends Model
{
    protected $fillable = ["name"];
    protected $table = "crop_types";
}
