<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Products;

class GroupsModel extends Model
{
    //

    protected $table = "groups";
    protected $primaryKey = "g_id";

    public function getGroupProducts()
    {
        return Products::whereGroup_id($this->g_id);
    }
}
