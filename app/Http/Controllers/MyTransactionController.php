<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MyTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Transaction::query()->with(['user'])->where('users_id', Auth::user()->id);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <a href="' . route('dashboard.my-transaction.show', $item->id) . '" class="bg-yellow-500 text-white hover:bg-yellow-700 rounded-md px-2 py-1 m-2 inline-block">
                        Show
                    </a>';
                })
                ->editColumn('total_price', function ($item) {
                    return number_format($item->total_price);
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.my-transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $myTransaction)
    {
        if (request()->ajax()) {
            $query = TransactionItem::with(['product'])->where('transactions_id', $myTransaction->id);

            return DataTables::of($query)

                ->editColumn('product.price', function ($item) {
                    return number_format($item->product->price);
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.my-transaction.show', [
            'transaction' => $myTransaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
