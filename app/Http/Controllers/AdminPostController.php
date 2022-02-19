<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index',[
            'posts' => Post::paginate('50')
        ]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(){
        $post = new Post();

        $attributes = $this->validatePost($post);

        $attributes['user_id']  = auth()->id();
        $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/')->with('success','Your post created successfully');
    }

    public function edit(Post $post){
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post){

        $attributes = $this->validatePost($post);

        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = \request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success','Successfully Post Updated! ');
    }

    public function destroy(Post $post){
        $post->delete();

        return back()->with('success','Post deleted!');
    }

    /**
     * @param Post $post
     * @return array
     */
    protected function validatePost(Post $post): array
    {
        $attributes = \request()->validate([
            'title' => ['required'],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        return $attributes;
    }
}
