<?php

namespace App\Http\Controllers;

use App\Helpers\CalculatorHelper;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'a' => 'required|numeric',
            'b' => 'required|numeric',
            'operation' => 'required|in:add,subtract',
        ]);

        $a = $request->input('a');
        $b = $request->input('b');
        $operation = $request->input('operation');

        $result = $operation === 'add'
            ? CalculatorHelper::add($a, $b)
            : CalculatorHelper::subtract($a, $b);

        return view('calculator', compact('a', 'b', 'operation', 'result'));
    }
}
