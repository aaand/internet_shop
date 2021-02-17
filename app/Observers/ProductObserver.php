<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\History;

class ProductObserver
{
    /**
     * Handle the product "updated" event.
     *
     * @param \App\Product $product
     * @return void
     */
    public function updated(Product $product)
    {
        if ($product->count != $product->getOriginal('count')) {
            History::create([
                'product_id' => $product->id,
                'count_old' => $product->getOriginal('count'),
                'count_new' => $product->count,
            ]);
        }
    }
}
