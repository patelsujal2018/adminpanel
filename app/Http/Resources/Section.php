<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Section extends JsonResource
{
    public function toArray($request)
    {
        return [
            "myid" => $this->section_id,
            "name" => $this->section_name,
            "display_name" => $this->section_display_name,
            "title" => $this->section_title,
            "description" => $this->section_description,
            "id" => $this->id,
            "status" => $this->section_status,
        ];
    }
}
