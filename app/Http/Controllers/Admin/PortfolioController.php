<?php

namespace App\Http\Controllers\Admin;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Portfolio::generateSlug($form_data['title']);

        if(array_key_exists('image', $form_data)){
            $form_data['image_real_name']= $request->file('image')->getClientOriginalName();
            $form_data['image_path'] = Storage::put('uploads',  $form_data['image']);
        };

        $new_portfolio = new Portfolio();
        $new_portfolio->fill($form_data);
        $new_portfolio->save();

        return redirect()->route('admin.portfolios.show', $new_portfolio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
       // dd($request->file('image'));
    $form_data = $request->all();

        if($form_data['title'] !== $portfolio->title){
            $form_data['slug'] = Portfolio::generateSlug($form_data['title']);
        }else{
            $form_data['slug'] = $portfolio->slug;
        }

        if(array_key_exists('image', $form_data)){
            if($portfolio->image_path){
                Storage::disk('public')->delete($portfolio->image_path);
            }
            $form_data['image_real_name'] = $request->file('image')->getClientOriginalName();
            $form_data['image_path'] = Storage::put('uploads/', $form_data['image']);

        };

        $portfolio->update($form_data);

        return redirect()->route('admin.portfolios.show', $portfolio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if($portfolio->image_path){
        Storage::disk('public')->delete($portfolio->image_path);
    }
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index');
    }
}
