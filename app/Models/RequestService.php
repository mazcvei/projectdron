<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestService extends Model
{

    protected $table = "request_services";
    protected $fillable = [
        "company",
        "cif",
        "phone",
        "email",
        "address",
        "date_start",
        "crop_type_id",
        "service_type_id"
    ];

    public function crop_type(){
        return $this->belongsTo(CropType::class, 'crop_type_id','id');
    }
    public function service_type(){
        return $this->belongsTo(ServiceType::class, 'service_type_id','id');
    }
}
