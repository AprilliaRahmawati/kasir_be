<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Product;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return response()->json([
            'status' => true,
            'data' => $transactions,
            'message' => 'Success'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'total' => 'required|integer',
            'nama' => 'required',
            'bayar' => 'required|integer',
            'kembali' => 'required|integer',
        ]);

        $transaction = Transaction::create([
            'number' => $request->number,
            'total' => $request->total,
            'nama' => $request->nama,
            'bayar' => $request->bayar,
            'kembali' => $request->kembali,
        ]);



          // Mengurangi stok produk berdasarkan item transaksi
          foreach ($request->items as $item) {
            $product = Product::where('barcode', $item['barcode'])->first();
            if ($product) {
                $product->stock -= $item['qty'];
                $product->save();
            }

            DetailTransaction::create([
                'transaction_id' => $transaction->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['qty'],
                'total' => $item['total']
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $transaction,
            'message' => 'Success'
        ]);
    }

    public function show($id)
    {
        $transaction = Transaction::with('detail_transaksi')->where('id', $id)->first();

        if (!$transaction) {
            return response()->json([
                'status' => false,
                'message' => 'Transaksi tidak ditemukan'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $transaction,
            'message' => 'Success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => 'required',
            'total' => 'required|integer',
            'nama' => 'required',
            'bayar' => 'required|integer',
            'kembali' => 'required|integer',
        ]);

        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'status' => false,
                'message' => 'Transaksi tidak ditemukan'
            ]);
        }

        $transaction->update([
            'number' => $request->number,
            'total' => $request->total,
            'nama' => $request->nama,
            'bayar' => $request->bayar,
            'kembali' => $request->kembali,
        ]);

        return response()->json([
            'status' => true,
            'data' => $transaction,
            'message' => 'Success'
        ]);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'status' => false,
                'message' => 'Transaksi tidak ditemukan'
            ]);
        }

        $transaction->delete();

        return response()->json([
            'status' => true,
            'message' => 'Transaksi berhasil dihapus'
        ]);
    }
}
