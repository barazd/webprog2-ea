<?php

namespace App\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

trait HasRole
{
    /*
    * Get roles id. Accepts id, slug, or array of ids or slugs. Checks if given role exists.
    */
    private function getRoleIds(string|int|array $roles): array
    {
        return collect($roles)->flatten()->reduce(function ($array, $role) {
            // If the id of the role was given
            if (is_int($role))
            {
                $array[] = Role::findOrFail($role)->id;
            }
            // If the slug of the role was given
            else if (is_string($role))
            {
                $array[] = Role::where('slug', $role)->firstOrFail()->id;
            }

            return $array;
        }, []);
    }

    /*
    * Add role
    */
    public function addRole(string|int|array $roles)
    {
        $roleIds = $this->getRoleIds($roles);

        $this->roles()->attach($roleIds);

        return $this;
    }

    /*
    * Remove role
    */
    public function removeRole(string|int|array $roles)
    {
        $roleIds = $this->getRoleIds($roles);

        $this->roles()->detach($roleIds);

        return $this;
    }

    /*
    * Has role (ANY)
    */
    public function hasRole(string|int|array $roles)
    {
        return $roles = $this->roles()->whereIn('id', $this->getRoleIds($roles))->count();
    }
}