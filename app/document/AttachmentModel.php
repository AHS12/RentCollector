<?php

namespace App\document;

use App\home\ApertmentModel;
use App\shop\ShopModel;
use Illuminate\Database\Eloquent\Model;

class AttachmentModel extends Model
{
    //
    protected $table = "attachments";
    protected $fillable = [
        "aprt_id",
        "shop_id",
        "attachment_path",
        "status",
        "created_by",
        "updated_by",
        "soft_delete"
    ];

    public function apertment(){
        return $this->belongsTo(ApertmentModel::class,'aprt_id','id');
    }

    public function shop(){
        return $this->belongsTo(ShopModel::class,'shop_id','id');
    }
}
