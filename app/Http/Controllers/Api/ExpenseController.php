<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function add(Request $request) : JsonResponse {
        $expense = new Expense();
        $expense->category_id = $request->category_id;
        $expense->user_id = $request->user()->id;
        $expense->amount = $request->amount;

        $expense->save();
        return response()->json($expense);
    }

    public function edit(Request $request, int $id) : JsonResponse {
        $expense = Expense::where('id', $id)->first();
        $expense->category_id = $request->category;
        $expense->user_id = $request->user()->id;
        $expense->amount = $request->amount;
        $expense->update();
        return response()->json($expense);
    }

    public function delete(Request $request, int $id) : JsonResponse {
        $expense =  Expense::where('id', $id);
        $expense->delete();
        return response()->json($expense);
    }

    public function view(Request $request, $id) : JsonResponse {
        $expense = Expense::where('id', $id)->with('category')->first();
        return response()->json($expense);
    }

    public function list(Request $request) {
        $expense = Expense::where('user_id', $request->user()->id)->with('category')->get();
        return response()->json($expense);
    }
}