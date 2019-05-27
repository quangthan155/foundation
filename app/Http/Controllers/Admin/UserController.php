<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Http\Requests\Admin\User\DeleteRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $userRepository;
    private $roleRepository;
    private $groupRepository;

    /**
     * construct Plan
     */
    public function __construct(
        UserRepository $userRepository, 
        RoleRepository $roleRepository
        )
    {
        $this->middleware('admin');
        // $this->middleware('permission:view users', ['only' => ['index']]);
        // $this->middleware('permission:create users', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit users', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete users', ['only' => ['destroy']]);

        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $positions = config('master.positions');
        $users = $this->userRepository->getList($request);
        $roles = $this->roleRepository->pluckArray('name', 'id');

        return view('admin.user.index',compact('users', 'positions', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = config('master.positions');
        $roles = $this->roleRepository->pluckArray('name', 'id');
        $userRoles = [];
        $userGroups = [];

        return view('admin.user.form', compact('positions', 'roles', 'userRoles', 'userGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\User\CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $flag = $this->userRepository->adminStore($request);

        if ($flag) {
            return redirect(route('admin.user.index'))
                ->withSuccess('Create user success');
        } else {
            return redirect(route('admin.user.index'))
                ->withError('Create user fail');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $positions = config('master.positions');

        $roles = $this->roleRepository->pluckArray('name', 'id');
        $user = $this->userRepository->find($id);

        $userRoles = $user->getRoleNames()->toArray();

        return view('admin.user.form', compact('positions', 'user', 'roles', 'userRoles', 'userGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\User\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $flag = $this->userRepository->adminUpdate($request, $id);

        if ($flag) {
            return redirect(route('admin.user.index'))
            ->withSuccess('Update user success');
        }
        return redirect(route('admin.user.index'))
            ->withError('Update user fail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Http\Requests\Admin\User\DeleteRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, $id)
    {   
        $flag = $this->userRepository->delete($id);
        
        if ($flag) {
            return redirect(route('admin.user.index'))
            ->withSuccess('Delete user success');
        }
        return redirect(route('admin.user.index'))
            ->withError('Delete user fail');
    }
}
