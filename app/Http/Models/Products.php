<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\GroupsModel;
use App\Http\Models\Prices;
class Products extends Model
{
    //

    protected $table = "products";
    protected $primaryKey = "product_id";

    public function getProductGroup()
    {
        return GroupsModel::whereG_id($this->group_id)->first();
    }

    public function getProductPreviousPrice()
    {
        return Prices::whereProduct_id($this->product_id)->orderBy('pp_id','Desc');
    }

    public function getProductPrices()
    {
        return Prices::whereProduct_id($this->product_id)->orderBy('pp_id','Desc')->get();
    }
}
