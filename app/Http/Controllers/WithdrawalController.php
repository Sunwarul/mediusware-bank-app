<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\TransactionTypeEnum;
use App\Http\Requests\WithdrawRequest;
use IWithdrawService;

class WithdrawalController extends Controller
{
    public function __construct(
        private IWithdrawService $service,
    ) {
    }

    public function index()
    {
        $withdrawalsTransactions = Transaction::where('transaction_type', TransactionTypeEnum::Withdrawal)->paginate();
        return response()->json($withdrawalsTransactions);
    }

    public function withdraw(WithdrawRequest $request)
    {
        $attributes = $request->validated();
        $withdraw = $this->service->withdraw($attributes);
        if ($withdraw) {
            return response()->json([
                'message' => __('Withdrawn successfully'),
                'amount' => $attributes['amount'],
                'new_balance' => $user->balance
            ], Response::HTTP_CREATED);
        }

        throw new Exception(__('Withdraw failed, try with valid data.'));
    }
}
