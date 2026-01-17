<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionHistoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'              => $this->id,
            'dispensedDate'   => $this->dispensed_at?->toIso8601String(),
            'status'          => $this->status,
            'pharmacy'        => $this->pharmacy?->name,
            'hospitalName'    => $this->patient?->hospital?->hospitalName,
            'dispensedBy'     => $this->dispensedBy ? $this->dispensedBy->fullName : null,
            'notes'           => $this->notes,
            'items'           => $this->items->map(fn($item) => [
                'name'     => $item->product?->productName ?? 'Unknown',
                'quantity' => $item->quantity,
                'dosage'   => $item->dosageInstruction,
                'price'    => $item->price,
            ]),
            'totalItems'      => $this->items->count(),
            'totalCost'       => $this->items->sum('price'),
        ];
    }
}