<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


class StoreTransFormer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var $resource
     * @return array
     */
    public function transform($resource)
    {
        return [

            'store_id' => $resource->store_id,
            'store_name' => $resource->store_name,
            'logo' => $resource->logo,
            'store_score' => $resource->store_score,
            'month_sale_num' => $resource->month_sale_num,
            'average_price' => $resource->average_price,
            'delivery_fee' => $resource->delivery_fee,
            'min_price' => $resource->min_price,

        ];
    }
}
