<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

/**
 * Class RoleRepository.
 */
class RoleRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * admin store roles
     * 
     * @param  Request $request
     * @return object
     */
    public function adminStore($request)
    {
        $params = $request->except('permissions');
        $permissions = $request->get('permissions', []);
        
        return $this->model->create($params)
            ->syncPermissions(array_values($permissions));
    }

    /**
     * admin update roles
     * 
     * @param  Request $request
     * @param  int $id
     * @return object
     */
    public function adminUpdate($request, $id)
    {
        // handle bussiness
        $params = $request->except('permissions');
        $permissions = $request->get('permissions', []);

        $flag = $this->update($params, $id)
            ->syncPermissions(array_values($permissions));

        return $flag;
    }

    /**
     * get all permissions of user
     * 
     * @param  int $id
     * @return array
     */
    public function getPermissionUsers($id)
    {
        return $this->model->find($id)
            ->getAllPermissions()
            ->pluck('name', 'id')->toArray();
    }
}
