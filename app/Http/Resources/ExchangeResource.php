<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use Carbon\Carbon;

class ExchangeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // TODO: response data {"exchange_rate": 0.25, "udpated_at": "2022-01-01 23:59:59"}
        return $this->isEmpty() ? [] : [

            'exchange_rate' => $this['exchange_rate'],
            'updated_at'    => Carbon::parse($this['updated_at'])->timezone('Asia/Taipei')->format('Y-m-d H:i:s'),
        ];
    }
}
