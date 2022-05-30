<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="NotebookResource",
 *     description="Notebook resource",
 *     @OA\Xml(
 *         name="NotebookResource"
 *     )
 * )
 */

class NotebookResource extends JsonResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     *
     * )
     *
     * @var Notebook[]
     */
    private array $data;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}