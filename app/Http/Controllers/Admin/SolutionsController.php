<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\SolutionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SolutionsController extends Controller
{

    private $solution;

    public function __construct(Solution $solution)
    {
        $this->solution = $solution;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $solutions = $this->solution->paginate(10);

        return view('admin.solutions.index', compact('solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.solutions.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * validação do solution 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        $filePath = public_path('storage/solutions');

        $img = Image::make($image->path());

        $img->fit(850, 568, function ($const) {
            $const->aspectRatio();
        })->save($filePath . '/' . $input['thumbnail']);

        $image->move($filePath, $input['image']);

        $data['image'] = 'solutions/' . $input['image'];
        $data['thumbnail'] = 'solutions/' . $input['thumbnail'];

        $this->solution->create($data);

        flash('Solução criada com Sucesso!')->success();
        return redirect()->route('admin.solutions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solution  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Solution $solution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($solution)
    {
        $solution = $this->solution->findOrFail($solution);
        return view('admin.solutions.edit', compact('solution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $solution)
    {
        $data = $request->all();

        $solution = $this->solution->find($solution);

        $slug = Str::slug($request->title, '-');
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {

            if (Storage::disk('public')->exists($solution->image)) {
                Storage::disk('public')->delete($solution->image);
            }

            if (Storage::disk('public')->exists($solution->thumbnail)) {
                Storage::disk('public')->delete($solution->thumbnail);
            }

            //Upload e Dimensionamento da imagem
            $image = $request->file('image');

            $hash = str_replace('.', '', str_replace('/', '', Hash::make('&U%v3#tBcpeA%0Rs')));

            $input['thumbnail'] = $hash . '_thumbnail.' . $image->extension();
            $input['image'] = $hash . '.' . $image->extension();

            $filePath = public_path('storage/solutions');

            $img = Image::make($image->path());

            $img->fit(800, 550, function ($const) {
                $const->aspectRatio();
            })->save($filePath . '/' . $input['thumbnail']);

            $image->move($filePath, $input['image']);

            $data['image'] = 'solutions/' . $input['image'];
            $data['thumbnail'] = 'solutions/' . $input['thumbnail'];
        }

        $solution->update($data);

        flash('Solução atualizada com sucesso!')->success();
        return redirect()->route('admin.solutions.index');
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

        $solution = $this->solution->find($id);

        if ($solution->delete() == TRUE) {

            if (Storage::disk('public')->exists($solution->image)) {
                Storage::disk('public')->delete($solution->image);
            }

            if (Storage::disk('public')->exists($solution->thumbnail)) {
                Storage::disk('public')->delete($solution->thumbnail);
            }

            flash('Solução removida com sucesso!')->success();
            return redirect()->route('admin.solutions.index');

        }
        
    }


    public function solution($solution)
    {

        $solution_items = SolutionItem::where('solution_id', $solution)->paginate(10);
        $solution = Solution::find($solution);

        return view('admin.solution_items.index', compact('solution_items', 'solution'));
    }


}
