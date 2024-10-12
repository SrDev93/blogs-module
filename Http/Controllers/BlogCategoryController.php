<?php

namespace Modules\Blogs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Blogs\Entities\BlogCategory;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = BlogCategory::whereNull('parent_id')->orderBy('sort_id')->get();

        return view('blogs::category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blogs::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $ac = BlogCategory::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'page_title' => $request->page_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'canonical' => $request->canonical,
                'schema' => $request->schema,
                'banner' => (isset($request->banner)?file_store($request->banner, 'assets/uploads/photos/blog_category_banner/', 'photo_'):null)
            ]);

            return redirect()->route('BlogCategory.index')->with('flash_message', 'با موفقیت ثبت شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blogs::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(BlogCategory $BlogCategory)
    {
        return view('blogs::category.edit', compact('BlogCategory'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, BlogCategory $BlogCategory)
    {
        try {
            $BlogCategory->title = $request->title;
            $BlogCategory->slug = $request->slug;
            $BlogCategory->page_title = $request->page_title;
            $BlogCategory->meta_keywords = $request->meta_keywords;
            $BlogCategory->meta_description = $request->meta_description;
            $BlogCategory->canonical = $request->canonical;
            $BlogCategory->schema = $request->schema;

            if (isset($request->banner)) {
                if ($BlogCategory->banner){
                    File::delete($BlogCategory->banner);
                }
                $BlogCategory->banner = file_store($request->banner, 'assets/uploads/photos/blog_category_banner/', 'photo_');
            }

            $BlogCategory->save();

            return redirect()->route('BlogCategory.index')->with('flash_message', 'بروزرسانی با موفقیت انجام شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(BlogCategory $BlogCategory)
    {
        try {
            $BlogCategory->delete();

            return redirect()->route('BlogCategory.index')->with('flash_message', 'با موفقیت حذف شد');
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Sort Item.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function sort_item(Request $request)
    {
        $category_item_sort = json_decode($request->sort);
        $this->sort_category($category_item_sort, null);
    }

    /**
     * Sort Category.
     *
     *
     * @param $category_items
     * @param $parent_id
     */
    private function sort_category(array $category_items, $parent_id)
    {
        foreach ($category_items as $index => $category_item) {
            $item = BlogCategory::findOrFail($category_item->id);
            $item->sort_id = $index + 1;
            $item->parent_id = $parent_id;
            $item->save();
            if (isset($category_item->children)) {
                $this->sort_category($category_item->children, $item->id);
            }
        }
    }
}
