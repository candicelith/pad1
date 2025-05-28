<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_company,
            'company_name' => $this->company_name,
            'company_field' => $this->company_field,
            'company_description' => $this->company_description,
            'company_phone' => $this->company_phone,
            'company_address' => $this->company_address,
            'company_picture' => $this->company_picture ? asset('storage/company/' . $this->company_picture) : asset('images/default_company.png'), // Memberikan URL lengkap
            'status' => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}