<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'totalPrice' => round((1 - ($this->discount/100))* $this->price),
            'stock' => $this->stock == 0? "Out of stock": $this->stock,
            'ratings' => $this->reviews->count() > 0? round($this->reviews->sum('star')/$this->reviews->count()): "No rating yet",
            'href' => [
                'link' => route('products.show', $this->id),
            ],
        ];
    }
}
