<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function add(Request $request) : JsonResponse {
        $budget = new Budget();
        $budget->category_id = $request->category_id;
        $budget->user_id = $request->user()->id;
        $budget->amount = $request->amount;
        $budget->period = $request->period;

        $budget->save();
        return response()->json($budget);
    }

    public function edit(Request $request, int $id) : JsonResponse {
        $budget = Budget::where('id', $id)->first();
        $budget->category_id = $request->category_id;
        $budget->user_id = $request->user()->id;
        $budget->amount = $request->amount;
        $budget->period = $request->period;
        $budget->update();
        return response()->json($budget);
    }

    public function delete(Request $request, int $id) : JsonResponse {
        $budget =  Budget::where('id', $id);
        $budget->delete();
        return response()->json($budget);
    }

    public function view(Request $request, $id) : JsonResponse {
        $budget = Budget::where('id', $id)->with('category')->first();
        return response()->json($budget);
    }

    public function list(Request $request) {
        $budget = Budget::where('user_id', $request->user()->id)->with('category')->get();
        return response()->json($budget);
    }
}