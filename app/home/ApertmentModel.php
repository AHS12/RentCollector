<?php

namespace App\home;

use App\document\AttachmentModel;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ApertmentModel extends Model
{
    //
    protected $table = "apertments";
    protected $fillable = [
        "user_id",
        "name",
        "address",
        "conecrn_person",
        "conecrn_email",
        "conecrn_phone",
        "conecrn_nid_birth_passport",
        "status",
        "created_by",
        "updated_by",
        "soft_delete"
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function attachments(){
        return $this->hasMany(AttachmentModel::class,'aprt_id','id');
    }
}
