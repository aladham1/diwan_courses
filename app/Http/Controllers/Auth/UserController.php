<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class UserController extends Controller
{
    const PREFIX = 'manage.';

    public function __construct()
    {
        $this->authorizeResource(User::class);

    }
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
      $this->authorize('view-any', User::class);
        return view(self::PREFIX . 'users.index');
    }


    /**
     * @return LengthAwarePaginator
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getUsers(): LengthAwarePaginator
    {
        $users = User::with('roles')->where('id','!=',1);
        if (\request()->get('query') != 'null' && !empty(\request()->get('query'))) {
            $users = $users->where('name', 'LIKE', '%' . \request()->get('query') . '%')
                ->orWhere('email', 'LIKE', '%' . \request()->get('query') . '%')
                ->orWhere('phone', 'LIKE', '%' . \request()->get('query') . '%');
        }
        if (\request()->deleted != 'null') {
            $users = $users->onlyTrashed();
        }
        return $users->IsAdmin()->orderBy('id', 'DESC')->paginate(20);
    }


    /**
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $user = Manager::forceCreate([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'is_admin' => 1,
        ]);
        $user->roles()->sync($request->roles);
        return $user->load('roles');
    }
}
