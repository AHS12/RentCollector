<?php

namespace App\rent;

use App\home\ApertmentModel;
use App\invoice\InvoiceModel;
use App\shop\ShopModel;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentModel extends Model
{
    //
    use SoftDeletes;
    protected $table = "rents";
    protected $fillable = [
        "user_id",
        "aprt_id",
        "shop_id",
        "date",
        "month",
        "original_rent",
        "rent",
        "advance",
        "due",
        "expense",
        "status",
        "created_by",
        "updated_by",
        "soft_delete"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function apertment()
    {
        return $this->belongsTo(ApertmentModel::class, 'aprt_id', 'id');
    }

    public function shop()
    {
        return $this->belongsTo(ShopModel::class, 'shop_id', 'id');
    }

    public function invoice()
    {
        return $this->hasOne(InvoiceModel::class, 'rent_id', 'id');
    }
}
