<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PostRepository
{

    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     *
     * @param integer $id
     * @return void
     */
    public function show(int $id)
    {
        return $this->post->find($id);
    }

    /**
     *
     * @param array
     * @return Post[]|Collection
     */
    public function index()
    {
        return $this->post->all();
    }

    /**
     * @param array $post_info
     */
    public function store(array $post_info)
    {
        $post = new Post();
        $post->fill($post_info)->save();
    }

    /**
     *
     * @param array $post
     * @param int $postId
     * @return void
     */
    public function update(array $post, int $postId)
    {
        try {
            DB::beginTransaction();

            $post_info = $this->post->find($postId);
            $post_info->fill($post)->save();

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
        return $this->post->find($id)->delete();
    }
}
