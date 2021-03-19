<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $id
     */
    public function show(int $id)
    {
        return $this->userRepository->show($id);
    }

    /**
     * @return User[]|Collection
     */
    public function index()
    {
        return $this->userRepository->index();
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->userRepository->store($request->toArray());
    }

    /**
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, int $id)
    {
        $this->userRepository->update($request->toArray(), $id);
    }

    /**
     * @param int $id
     */
    public function destroy(int $id)
    {
        $this->userRepository->delete($id);
    }
}
