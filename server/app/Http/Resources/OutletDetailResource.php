<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OutletDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'business_name' => $this->business_name,
            'address' => $this->address,
            'phone' => $this->phone,
            'show_tax_note' => $this->show_tax_note,
            'tax_amount' => $this->tax_amount,
            'taxpayer_name' => $this->taxpayer_name,
            'taxpayer_address' => $this->taxpayer_address,
            'nopd' => $this->nopd,
            'npwpd' => $this->npwpd,
            'id_business_category' => $this->id_business_category,
            'opening_hours' => $this->opening_hours,
            'print_memo' => $this->print_memo,
            'print_kitchen_memo' => $this->print_kitchen_memo,
            'active_until' => $this->active_until,
            'business_category' => $this->whenLoaded('businessCategory')

        ];
    }
}
