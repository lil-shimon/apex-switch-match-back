<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     *
     * @param integer $id
     * @return void
     */
    public function show(int $id)
    {
        return $this->user->find($id);
    }

    /**
     *
     * @param array
     * @return User[]|Collection
     */
    public function index()
    {
        return $this->user->all();
    }

    /**
     * @param array $user_info
     */
    public function store(array $user_info)
    {
        $user = new User();
        $user->fill($user_info)->save();
    }

    /**
     *
     * @param array $user
     * @param string $userId
     * @return void
     */
    public function update(array $user, string $userId)
    {
        try {
            DB::beginTransaction();

            $user_info = $this->user->find($userId);
            $user_info->fill($user)->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return;
        }
    }

    /**
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id)
    {
        return $this->user->find($id)->delete();
    }
}
