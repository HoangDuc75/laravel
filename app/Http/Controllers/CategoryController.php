<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')
            ->where('is_delete', false)
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('is_delete', false)->orderBy('name')->get();
        $parentOptions = $this->buildOptions($categories);

        return view('category.create', compact('parentOptions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'parent_id' => [
                'nullable',
                'integer',
                Rule::exists('categories', 'id')->where('is_delete', false),
            ],
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['is_delete'] = false;

        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Danh mục đã được tạo.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('is_delete', false)->get();

        $excludedIds = array_merge([$category->id], $this->collectDescendants($categories, $category->id));
        $parentOptions = $this->buildOptions($categories, null, '', $excludedIds);

        return view('category.edit', compact('category', 'parentOptions'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('is_delete', false)->get();

        $excludedIds = array_merge([$category->id], $this->collectDescendants($categories, $category->id));

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'parent_id' => [
                'nullable',
                'integer',
                Rule::exists('categories', 'id')->where('is_delete', false),
            ],
        ]);

        $parentId = $data['parent_id'] ?? null;
        if ($parentId && in_array($parentId, $excludedIds, true)) {
            return back()
                ->withErrors(['parent_id' => 'Danh mục cha không hợp lệ.'])
                ->withInput();
        }

        $data['is_active'] = $request->has('is_active');

        $category->update($data);

        return redirect()->route('category.index')->with('success', 'Danh mục đã được cập nhật.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'is_delete' => true,
            'is_active' => false,
        ]);

        return redirect()->route('category.index')->with('success', 'Danh mục đã được xóa.');
    }

    private function buildOptions($categories, $parentId = null, $prefix = '', array $excludedIds = [])
    {
        $options = [];

        foreach ($categories->where('parent_id', $parentId) as $category) {
            if (in_array($category->id, $excludedIds, true)) {
                continue;
            }

            $options[] = [
                'id' => $category->id,
                'label' => $prefix . $category->name,
            ];

            $options = array_merge(
                $options,
                $this->buildOptions($categories, $category->id, $prefix . '-- ', $excludedIds)
            );
        }

        return $options;
    }

    private function collectDescendants($categories, $parentId)
    {
        $descendants = [];

        foreach ($categories->where('parent_id', $parentId) as $child) {
            $descendants[] = $child->id;
            $descendants = array_merge($descendants, $this->collectDescendants($categories, $child->id));
        }

        return $descendants;
    }
}
