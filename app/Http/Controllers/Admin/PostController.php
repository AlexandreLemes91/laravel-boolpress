<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view( 'admin.posts.create', compact('categories', 'tags') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|unique:posts',
            'content'=> 'required',
            'category_id'=> 'nullable|exists:categories,id',
            'tags'=> 'nullable|exists:tags,id',
        ],[
            'required'=> 'The :attribute is required',
            'unique'=> 'This :attribute is already used',
            'exists'=> "this :attribute don't exists",
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        $new_post = new Post();

        $new_post->fill($data);
        $new_post->save();

        //SAVE PIVOT
        if(array_key_exists('tags', $data)){
            $new_post->tags()->attach( $data['tags'] );
        } 

        return redirect()->route( 'admin.posts.show', $new_post->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::find($id);

        if($post){
            return view( 'admin.posts.show', compact('post') );
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view( 'admin.posts.edit', compact('post', 'categories', 'tags') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=> [
                'required',
                Rule::unique('posts')->ignore($post)
            ],
            'content'=> 'required',
            'category_id'=> 'nullable|exists:categories,id',
            'tags'=> 'nullable|exists:tags,id',
        ],[
            'required'=> 'The :attribute is required',
            'unique'=> 'This :attribute is already used',
            'exists'=> "this :attribute don't exists",
        ]);

        $data = $request->all();

        $data['slug'] = Str::slug( $data['title'], '-' );
        $post->update( $data );

        if( array_key_exists( 'tags', $data ) ){
            $post->tags()->sync( $data['tags'] );
        }else{
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags->detach();

        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}
