<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MomoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'username' => $this->phone,
            'status' => $this->status,
            'settings' => array(
                'transfers_today' => array(
                    'times' => $this->times,
                    'amount' => $this->amount
                )
            )
        ];
    }
}
