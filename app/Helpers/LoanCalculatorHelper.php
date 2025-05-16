<?php

namespace App\Helpers;

use Exception;

class LoanCalculatorHelper
{
    /**
     * Hitung cicilan bulanan menggunakan metode anuitas.
     */
    public static function calculateMonthlyInstallment(float $principal, float $annualInterestRate, int $years): float
    {
        $monthlyRate = $annualInterestRate / 12 / 100;
        $months = $years * 12;

        if ($monthlyRate == 0) {
            return $principal / $months;
        }

        $installment = $principal * $monthlyRate / (1 - pow(1 + $monthlyRate, -$months));
        return round($installment, 2);
    }

    public static function calculateTotalInterest(float $installment, int $years, float $principal): float
    {
        $totalPaid = $installment * $years * 12;
        return round($totalPaid - $principal, 2);
    }

    public static function calculateTotalPayment(float $installment, int $years): float
    {
        return round($installment * $years * 12, 2);
    }
}
