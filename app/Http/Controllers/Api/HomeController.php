<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        $transactions = Transaction::paginate();
        $currentBalance = Auth::user()->current_balance;

        return response()->json(new HomeResource($transactions, $currentBalance));
    }
}
