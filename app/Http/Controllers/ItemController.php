<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Item\ItemRepositoryInterface;

class ItemController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $itemRepo;

    public function __construct(ItemRepositoryInterface $itemRepo)
    {
        $this->itemRepo = $itemRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = $this->itemRepo->getAll();
        $view = 'items.index';
        if ($request->is('admin/*')) {
            $items = Item::paginate(10);
            $view = 'admin.items.index';
            // search items
            $search_params = $request->query('search-keyword');
            if (!empty($search_params)) {
                $items = Item::search($search_params)->paginate(10);
            }
        }

        return view($view, compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('type', 'Item')->get();

        return view('admin.items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->itemRepo->validate($request);

        // move image from storage/app/public/image to public/images folder
        $file = $request->file('input-thumbnail');
        $image_name = time() . '.' . $request->image . $file->extension();
        $file->move(public_path('images'), $image_name);

        Item::create([
            'name' => $request->input('input-name'),
            'description' => $request->input('input-description'),
            'price' => $request->input('input-price'),
            'thumbnail' => $image_name,
            'category_id' => $request->input('input-category'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $related_items = $item->category->items;

        return view("items.detail", compact('item', 'related_items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $this->itemRepo->validate($request, ['excepts' => ['input-thumbnail']]);

        $item->name = $request->input('input-name');
        $item->description = $request->input('input-description');
        $item->price = $request->input('input-price');
        $item->category_id = $request->input('input-category');

        if (!empty($request->input('input-thumbnail'))) {
            $this->itemRepo->validate($request, ['only' => ['input-thumbnail']]);
            $item->thumbnail = $request->input('input-thumbnail');
        }

        $item->save();

        return redirect()->route('items.index')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
    }
}
