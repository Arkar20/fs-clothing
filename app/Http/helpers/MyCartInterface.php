<?php

namespace App\Http\helpers;

use App\Models\ItemDetail;

interface MyCartInterface {
        public function addintocart(ItemDetail $itemdetail,$qty);

}