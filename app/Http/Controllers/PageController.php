<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use App\Models\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $agent = $request->agent == 'on';
        $map = $request->map == 'on';
        $skin = $request->skin == 'on';
        $weapon = $request->weapon == 'on';

        $request->validate([
            'itemName' => 'required|max:255',
            'mainImage' => 'required',
            'about' => 'required'
        ]);

        $pg = new Page;
        $img = new Image;

        $pg->agent = $agent;
        $pg->map = $map;
        $pg->skin = $skin;
        $pg->weapon = $weapon;
        $pg->itemName = $request->input('itemName');
        $img->mainImage = $request->input('mainImage');
        $pg->about = $request->input('about');
        $img->aOneImage = $request->input('aOneImage');
        $pg->abilityOne = $request->input('abilityOne');
        $img->aTwoImage = $request->input('aTwoImage');
        $pg->abilityTwo = $request->input('abilityTwo');
        $img->aThreeImage = $request->input('aThreeImage');
        $pg->abilityThree = $request->input('abilityThree');
        $img->aFourImage = $request->input('aFourImage');
        $pg->abilityFour = $request->input('abilityFour');

        $pg->save();
        $img->save();

        return redirect(route('page.show', ['page'=>$pg->id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('page', ['page'=>$page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $page->edit();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect(route('home'));
    }
}
