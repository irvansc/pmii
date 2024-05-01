<?php

namespace App\Http\Livewire\Back;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class Categories extends Component
{

    public $category_name;
    public $selected_category_id;
    public $updateCategoryMode = false;

    public $subcategory_name;
    public $parent_category = 0;
    public $selected_subcategory_id;
    public $updateSubCategoryMode = false;
    public $listeners = [
        'resetModalForm',
        'deleteCategoryAction',
        'deleteSubCategoryAction',
        'updateCategoryOrdering',
        'updateSubCategoryOrdering'
    ];
    public function resetModalForm()
    {
        $this->resetErrorBag();
        $this->category_name = null;
        $this->subcategory_name = null;
        $this->parent_category = null;
    }
    public function addCategory()
    {
        $this->validate([
            'category_name' => 'required|unique:categories,category_name',
        ]);
        $category = new Category();
        $category->category_name = $this->category_name;
        $saved = $category->save();

        if ($saved) {
            $this->dispatchBrowserEvent('hideCategoryModal');
            $this->category_name = null;
            flash()->addSuccess('New Category has been successfuly added.');
        } else {
            flash()->addError('Something went wrong!');
        }
    }
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->selected_category_id = $category->id;
        $this->category_name = $category->category_name;
        $this->updateCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showcategoriesModal');
    }


    public function updateCategory()
    {
        if ($this->selected_category_id) {
            $this->validate([
                'category_name' => 'required|unique:categories,category_name,' . $this->selected_category_id,
            ]);

            $category = Category::findOrFail($this->selected_category_id);
            $category->category_name = $this->category_name;
            $updated = $category->save();
            if ($updated) {
                $this->dispatchBrowserEvent('hideCategoryModal');
                $this->updateCategoryMode = false;
                flash()->addSuccess('Category has been successfuly updated.');
            } else {
                flash()->addError('Something went wrong!');
            }
        }
    }


    public function addSubCategory()
    {
        $this->validate([
            // 'parent_category' => 'required',
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name',
        ]);

        $subcategory = new SubCategory();
        $subcategory->subcategory_name = $this->subcategory_name;
        $subcategory->slug = Str::slug($this->subcategory_name);
        $subcategory->parent_category = $this->parent_category;
        $saved = $subcategory->save();

        if ($saved) {
            $this->dispatchBrowserEvent('hideSubCategoryModal');
            $this->parent_category = null;
            $this->subcategory_name = null;
            flash()->addSuccess('New Sub Category has been successfuly added.');
        } else {
            flash()->addError('Something went wrong!');
        }
    }

    public function editSubCategory($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $this->selected_subcategory_id = $subcategory->id;
        $this->parent_category = $subcategory->parent_category;
        $this->subcategory_name = $subcategory->subcategory_name;
        $this->updateSubCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showSubcategoriesModal');
    }

    public function updateSubCategory()
    {
        if ($this->selected_subcategory_id) {
            $this->validate([
                'subcategory_name' => 'required|unique:sub_categories,subcategory_name,' . $this->selected_subcategory_id,
            ]);

            $subcategory = SubCategory::findOrFail($this->selected_subcategory_id);
            $subcategory->parent_category = $this->parent_category;
            $subcategory->subcategory_name = $this->subcategory_name;
            $subcategory->slug = Str::slug($this->subcategory_name);
            $updated = $subcategory->save();
            if ($updated) {
                $this->dispatchBrowserEvent('hideSubCategoryModal');
                $this->updateSubCategoryMode = false;
                flash()->addSuccess('SubCategory has been successfuly updated.');
            } else {
                flash()->addError('Something went wrong!');
            }
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $this->dispatchBrowserEvent('deleteCategory', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <b>' . $category->category_name . '</b> category',
            'id' => $id
        ]);
    }
    public function deleteSubCategory($id)
    {
        $category = SubCategory::find($id);
        $this->dispatchBrowserEvent('deleteSubCategory', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <b>' . $category->subcategory_name . '</b> subcategory',
            'id' => $id
        ]);
    }
    public function deleteSubCategoryAction($id)
    {
        $subcategory = SubCategory::where('id', $id)->first();
        $posts = Post::where('category_id', $subcategory->id)->get()->toArray();
        if (!empty($posts) && count($posts) > 0) {
            flash()->addError('This subcategory has (' . count($posts) . ') posts related it, cannot be deleted.');
        } else {
            $subcategory->delete();
            flash()->addSuccess('Subcategory has been successfuly deleted.');
        }
    }
    public function deleteCategoryAction($id)
    {
        $category = Category::where('id', $id)->first();
        $subcategories = SubCategory::where('parent_category', $category->id)->whereHas('posts')->with('posts')->get();

        if (!empty($subcategories) && count($subcategories) > 0) {
            $totalPost = 0;
            foreach ($subcategories as $subcat) {
                $totalPost += Post::where('category_id', $subcat->id)->get()->count();
            }
            flash()->addError('This category has (' . $totalPost . ') posts related to it , cannot be deleted.');
        } else {
            SubCategory::where('parent_category', $category->id)->delete();
            $category->delete();
            flash()->addSuccess('Category has been successfuly deleted.');
        }
    }

    public function updateCategoryOrdering($positions)
    {
        foreach ($positions as $p) {
            $index = $p[0];
            $newPosition = $p[1];
            Category::where('id', $index)->update([
                'ordering' => $newPosition,
            ]);

            flash()->addSuccess('Categories ordering has been successfuly updated.');
        }
    }
    public function updateSubCategoryOrdering($positions)
    {
        foreach ($positions as $p) {
            $index = $p[0];
            $newPosition = $p[1];
            SubCategory::where('id', $index)->update([
                'ordering' => $newPosition,
            ]);

            flash()->addSuccess('Sub Categories ordering has been successfuly updated.');
        }
    }

    public function render()
    {
        return view('livewire.back.categories',
        [
            'categories' => Category::orderBy('ordering', 'asc')->get(),
            'subcategories' => SubCategory::orderBy('ordering', 'asc')->get(),
        ]);
    }
}
