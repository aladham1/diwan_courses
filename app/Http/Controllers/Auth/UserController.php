<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
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
     * @return LengthAwarePaginator|Builder[]|Collection
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getUsers(): Collection|LengthAwarePaginator|array
    {
        $users = User::with('roles')->where('id','!=',1);
        if (\request()->get('query') != 'null' && !empty(\request()->get('query'))) {
            $users = $users->where('name', 'LIKE', '%' . \request()->get('query') . '%')
                ->orWhere('ssn', 'LIKE', '%' . \request()->get('query') . '%')
                ->orWhere('phone', 'LIKE', '%' . \request()->get('query') . '%');
        }
        if (request()->all) {
            return $users->orderBy('id', 'DESC')->select('id','name')->get();
        }
        return $users->orderBy('id', 'DESC')->paginate(20);
    }


    /**
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $user = Manager::forceCreate([
            'name' => $request->name,
            'phone' => $request->phone,
            'ssn' => $request->ssn,
        ]);
        $user->roles()->sync($request->roles);
        return $user->load('roles');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'ssn' => $request->ssn,
        ]);
        return $user;
    }

    /**
     * @param User $user
     * @return Application|ResponseFactory|Response
     */
    public function destroy(User $user): Response|Application|ResponseFactory
    {
        $user->delete();
        $data = [
            'status' => 'success',
            'message' => 'تم حذف المسخدم بنجاح'
        ];
        return response($data, 200);
    }
}
