<?php

namespace App\Http\Resources\User;

use App\Http\Resources\BaseResourceCollection;
use App\Http\Resources\Permission\RoleForGeneralResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Role;

/**
 * User For Login Resource
 *
 * @property string id
 * @property string username
 * @property string name
 * @property Collection<Role> roles
 */
class UserForLoginResource extends JsonResource
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
            'username' => $this->username,
            'name' => $this->name,
            'roles' => new BaseResourceCollection($this->roles, RoleForGeneralResource::class)
        ];
    }
}
