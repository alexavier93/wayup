<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\SolutionItem;
use Illuminate\Http\Request;

class SolutionItemsController extends Controller
{
    private $solution_item;

    public function __construct(SolutionItem $solution_item)
    {
        $this->solution_item = $solution_item;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $solution_items = $this->solution_item->paginate(10);

        return view('admin.solution_items.index', compact('solution_items'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($solution_id)
    {

        $solution = Solution::findOrFail($solution_id);

        return view('admin.solution_items.create', compact('solution'));
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

        $solution_item = $this->solution_item->create($data);

        if($solution_item){
            flash('Item criado com sucesso!')->success();
            return redirect()->route('admin.solutions.solution', ['solution' => $solution_item->solution_id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solution  $category
     * @return \Illuminate\Http\Response
     */
    public function show(SolutionItem $solution_item)
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

        $solution_item = $this->solution_item->findOrFail($solution);
        
        $solution = $solution_item->solution_id;
        $solution = Solution::find($solution);

        return view('admin.solution_items.edit', compact('solution_item', 'solution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $solution_item)
    {
        $data = $request->all();

        $solution_item = $this->solution_item->find($solution_item);

        $solution_item->update($data);

        flash('Item atualizado com sucesso!')->success();
        return redirect()->route('admin.solutions.solution', ['solution' => $solution_item->solution_id]);

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

        $solution_item = $this->solution_item->find($id);

        if ($solution_item->delete() == TRUE) {

            flash('Item removido com sucesso!')->success();
            return redirect()->route('admin.solution_items.index');

        }
        
    }


}
