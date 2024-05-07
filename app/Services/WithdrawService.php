<?php

namespace App\Services;

use App\Enums\TransactionTypeEnum;
use App\Models\Transaction;
use App\Models\User;
use IWithdrawService;

class WithdrawService implements IWithdrawService
{
    private function calculateFee(User $user) : float
    {
        $accountType = $user->account_type;

    }

    public function withdraw(array $attributes): ?array
    {
        $user = User::find($attributes['user_id']);
        if ($user) {
            $user->balance -= $attributes['amount'];
            $user->save();

            $calculatedFee = $this->calculateFee($user);
            $transaction = Transaction::create([
                'user_id' => $attributes['user_id'],
                'transaction_type' => TransactionTypeEnum::Withdrawal->value,
                'amount' => $attributes['amount'],
                'fee' => $calculatedFee,
                'date' => today(),
            ]);

            if ($transaction) {
                return [
                    'new_balance' => $user->balance,
                    'transaction' => $transaction,
                ];
            }
        }
    }
}
