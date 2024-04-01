<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository {

    public function categoryList()
    {
        return Category::latest()->paginate(config("system.pagination.per_page"));
    }
    public function storeNewCategory($request,$cat)
    {
        try {
            DB::beginTransaction();
            $cat->name = $request['name'];
            $cat->description = $request['description'];
            $cat->status = $request['status'];
            $cat->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::info($e->getMessage());
            return false;
        } catch (\Error $e) {
            DB::rollBack();
             \Log::info($e->getMessage());
            return false;
        }
    }
    public function updateCategory($request , $cat)
    {
        try {
            DB::beginTransaction();
            $cat->name = $request['name'];
            $cat->description = $request['description'];
            $cat->status = $request['status'];
            $cat->save();
            DB::commit();

            return true;
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            DB::rollBack();
            return false;
        } catch (\Error $e) {
            \Log::info($e->getMessage());
            DB::rollBack();
            return false;
        }
    }
    public function deleteCategory($category)
    {
        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            DB::rollBack();
            return false;
        } catch (\Error $e) {
            \Log::info($e->getMessage());
            DB::rollBack();
            return false;
        }
    }
}
