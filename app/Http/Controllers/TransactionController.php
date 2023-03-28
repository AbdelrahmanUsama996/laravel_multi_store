<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::with('product')->paginate(6);

        return View('transaction.index')->with('transactions',$transactions);

    }

    public function store(Request $request){

        $product_id = $request['product_id'];

        $transaction = New Transaction();

        $transaction->product_id = $product_id;

        $transaction-> Save();

        return View('publicWebsite.transactionDone');
    }

    public function destroy($id){
        Transaction::where('id',$id)->delete();

        return redirect()->back();
    }
}
