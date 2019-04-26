<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository.
 */
class UserRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * handle store user
     * 
     * @param  Request $request
     * @return object
     */
    public function adminStore($request)
    {
        $params = $this->filterStoreRequest($request);
        $roles = $request->get('roles', []);
        $groups = $request->get('groups', []);

        $user = $this->model
            ->create($params)
            ->syncRoles(array_values($roles));

        // sync groups user
        $flag = $this->sync($user->id, 'groups', $groups, true);

        return $user;
    }

    /**
     * handle update user
     * 
     * @param  Request $request
     * @param  int $id
     * @return object
     */
    public function adminUpdate($request, $id)
    {
        $params = $this->filterUpdateRequest($request);
        $roles = $request->get('roles', []);
        $groups = $request->get('groups', []);

        // sync roles user
        $this->model->find($id)
            ->syncRoles(array_values($roles));

        // sync groups user
        $this->sync($id, 'groups', $groups, true);

        return $this->update($params, $id);
    }

    /**
     * filter store request
     * 
     * @param  Request $request
     * @return array
     */
    protected function filterStoreRequest($request)
    {
        $params = $request->except(['roles']);
        $params['password'] = bcrypt($params['password']);

        return $params;
    }

    /**
     * filter update request
     * 
     * @param  Request $request
     * @return array
     */
    protected function filterUpdateRequest($request)
    {
        $params = $request->except(['email', 'roles', 'groups']);

        if (empty($params['password'])) {
            unset($params['password']);
        } else {
            $params['password'] = bcrypt($params['password']);
        }

        return $params;
    }
}
