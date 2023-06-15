<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; // Import class Request yang benar
use App\Models\DetailTransaction;
use App\Http\Controllers\Controller;


class DetailTransactionController extends Controller
{
    public function index()
    {
        $detailTransactions = DetailTransaction::all();

        return response()->json([
            'data' => $detailTransactions,
        ]);
    }

    public function show($id)
    {
        $detailTransaction = DetailTransaction::findOrFail($id);

        return response()->json([
            'data' => $detailTransaction,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'total' => 'required',
        ]);

        $detailTransaction = DetailTransaction::create($request->all());

        return response()->json([
            'message' => 'Detail transaction created successfully',
            'data' => $detailTransaction,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'transaction_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'total' => 'required',
        ]);

        $detailTransaction = DetailTransaction::findOrFail($id);
        $detailTransaction->update($request->all());

        return response()->json([
            'message' => 'Detail transaction updated successfully',
            'data' => $detailTransaction,
        ]);
    }

    public function destroy($id)
    {
        $detailTransaction = DetailTransaction::findOrFail($id);
        $detailTransaction->delete();

        return response()->json([
            'message' => 'Detail transaction deleted successfully',
        ]);
    }
}
