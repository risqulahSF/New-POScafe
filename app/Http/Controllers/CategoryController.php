<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public $title = "Category";

    public function index()
    {
        $data = [
            'title' => $this->title,
            'dtCategory' => Category::all(),
            'edit' => false
        ];

        return view('categories.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            Category::create([
                'nm_category' => $request->input('nmCategory'),
                'icon_category' => $request->input('iconCategory')
            ]);

            $notif = [
                'type' => 'success',
                'mess' => 'Data Disimpan'
            ];
        } catch (Exception $err) {
            $notif = [
                'type' => 'danger',
                'mess' => 'Data Gagal Disimpan'
            ];
        }

        return redirect(route('Category.index'))->with('notif', $notif);

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $Category)
    {
        // dd($Category);

        $data = [
            'title' => $this->title,
            'edit' => true,
            'dtCategory' => Category::all(),
            'recCategory' => Category::where('id', $Category->id)->first()
        ];

        return view('categories.data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $Category)
    {
        try {
            Category::where('id', $Category->id)->update([
                'nm_category' => $request->input('nmCategory'),
                'icon_category' => $request->input('iconCategory')
            ]);

            $notif = [
                'type' => 'success',
                'mess' => 'Data Disimpan'
            ];
        } catch (Exception $err) {
            $notif = [
                'type' => 'danger',
                'mess' => 'Data Gagal Disimpan'
            ];
        }

        return redirect(route('Category.index'))->with('notif', $notif);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        try {
            category::find($Category->id)->delete();

            $notif = [
                'type' => 'success',
                'mess' => 'Data Dihapus'
            ];
        } catch (Exception $err) {
            $notif = [
                'type' => 'danger',
                'mess' => 'Data Gagal Dihapus'
            ];
        }
        return back()->with('notif', $notif);
    }
}
