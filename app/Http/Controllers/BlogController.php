<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Blog\BlogRepositoryInterface;

class BlogController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $blogRepo;

    public function __construct(BlogRepositoryInterface $blogRepo)
    {
        $this->blogRepo = $blogRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blogs = Blog::withCount('comments')->paginate(6);
        $view = 'blogs.index';
        if ($request->is('admin/*')) {
            $blogs = Blog::paginate(10);
            $view = 'admin.blogs.index';
            // search blogs
            $search_params = $request->query('search-keyword');
            if (!empty($search_params)) {
                $blogs = Blog::search($search_params)->paginate(10);
            }
        }

        return view($view, compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('type', 'Blog')->get();

        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->blogRepo->validate($request, $access = ['only' => ['thumbnail']]);

        // move image from storage/app/public/image to public/images folder
        $file = $request->file('thumbnail');
        $image_name = time() . '.' . $request->image . $file->extension();
        $file->move(public_path('images'), $image_name);

        $request_all = $request->all();
        $request_all['thumbnail'] = $image_name;
        $request_all['category_id'] = $request->input('category');
        $request_all['user_id'] = auth()->user()->id;

        Blog::create($request_all);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $categories = Category::withCount('blogs')->withCount('items')->get();

        return view("blogs.detail", compact('blog', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $this->blogRepo->validate($request, ['excepts' => ['thumbnail']]);

        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->category_id = $request->input('category');

        if (!empty($request->input('thumbnail'))) {
            $this->validate($request, ['only' => ['thumbnail']]);
            $blog->thumbnail = $request->input('thumbnail');
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }
}
