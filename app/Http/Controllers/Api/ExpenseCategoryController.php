<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function add(Request $request) : JsonResponse {
        $category = new ExpenseCategory();
        $category->category = $request->category;
        $category->user_id = $request->user()->id;

        $category->save();
        return response()->json($category);
    }

    public function edit(Request $request, int $id) : JsonResponse {
        $category = ExpenseCategory::where('id', $id)->first();
        $category->category = $request->category;
        $category->user_id = $request->user()->id;
        $category->update();
        return response()->json($category);
    }

    public function delete(Request $request, int $id) : JsonResponse {
        $category =  ExpenseCategory::where('id', $id);
        $category->delete();
        return response()->json($category);
    }

    public function view(Request $request, $id) : JsonResponse {
        $category = ExpenseCategory::where('id', $id)->first();
        return response()->json($category);
    }

    public function list(Request $request) {
        $categories = ExpenseCategory::where('user_id', $request->user()->id)->get();
        return response()->json($categories);
    }
}