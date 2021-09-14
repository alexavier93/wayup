<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = $this->post->paginate(10);

        $posts = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'categories.title as categoryTitle')
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * validação do post 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     * 
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $slug = Str::slug($request->title, '-');
        $data['slug'] = $slug;


        //Upload e Dimensionamento da imagem
        $image = $request->file('image');

        $hash = str_replace('.', '', str_replace('/', '', Hash::make('&U%v3#tBcpeA%0Rs')));

        $input['thumbnail'] = $hash . '_thumbnail.' . $image->extension();
        $input['image'] = $hash . '.' . $image->extension();

        $filePath = public_path('storage/blog');

        $img = Image::make($image->path());

        $img->fit(850, 568, function ($const) {
            $const->aspectRatio();
        })->save($filePath . '/' . $input['thumbnail']);

        $image->move($filePath, $input['image']);

        $data['image'] = 'blog/' . $input['image'];
        $data['thumbnail'] = 'blog/' . $input['thumbnail'];

        $this->post->create($data);

        flash('Post Criado com Sucesso!')->success();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $post = $this->post->findOrFail($post);

        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $data = $request->all();

        $post = $this->post->find($post);

        $slug = Str::slug($request->title, '-');
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
			
			if (Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            if (Storage::disk('public')->exists($post->thumbnail)) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            //Upload e Dimensionamento da imagem
            $image = $request->file('image');

            $hash = str_replace('.', '', str_replace('/', '', Hash::make('&U%v3#tBcpeA%0Rs')));

            $input['thumbnail'] = $hash . '_thumbnail.' . $image->extension();
            $input['image'] = $hash . '.' . $image->extension();

            $filePath = public_path('storage/blog');

            $img = Image::make($image->path());

            $img->fit(800, 550, function ($const) {
                $const->aspectRatio();
            })->save($filePath . '/' . $input['thumbnail']);

            $image->move($filePath, $input['image']);

            $data['image'] = 'blog/' . $input['image'];
            $data['thumbnail'] = 'blog/' . $input['thumbnail'];
        }

        $post->update($data);

        flash('Post Atualizado com Sucesso!')->success();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;

        $post = $this->post->find($id);

        if ($post->delete() == TRUE) {

			if (Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            if (Storage::disk('public')->exists($post->thumbnail)) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            flash('Post removido com sucesso!')->success();
            return redirect()->route('admin.posts.index');

        }
        
    }

}
