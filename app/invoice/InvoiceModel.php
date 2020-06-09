<?php

namespace App\invoice;

use App\home\ApertmentModel;
use App\shop\ShopModel;
use App\User;
use App\rent\RentModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceModel extends Model
{
    //
    use SoftDeletes;
    protected $table = "invoices";

    protected $fillable = [
        "user_id",
        "aprt_id",
        "shop_id",
        "rent_id",
        "date_issue",
        "date_due",
        "inv_no",
        "inv_name",
        "bill_name",
        "bill_address",
        "bill_email",
        "bill_phone",
        "bill_note",
        "original_rent",
        "collected_rent",
        "advance",
        "due",
        "expense",
        "invoice_file_path",
        "status",
        "created_by",
        "updated_by"
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

    public function rent()
    {
        return $this->belongsTo(RentModel::class, 'rent_id', 'id');
    }
}
