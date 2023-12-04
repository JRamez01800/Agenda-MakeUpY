<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;



class CalculadoraController extends Controller
{
    
        public function suma(Request $request)
        {
            $request->validate([
                'num1' => 'required|numeric',
                'num2' => 'required|numeric',
            ]);
    
            $num1 = $request->input('num1');
            $num2 = $request->input('num2');
    
            $resultado = $num1 + $num2;
    
            return response()->json(['operacion' => "$num1 + $num2", 'resultado' => $resultado]);
        }
    
        public function resta(Request $request)
        {
            $request->validate([
                'num1' => 'required|numeric',
                'num2' => 'required|numeric',
            ]);
    
            $num1 = $request->input('num1');
            $num2 = $request->input('num2');
    
            $resultado = $num1 - $num2;
    
            return response()->json(['operacion' => "$num1 - $num2", 'resultado' => $resultado]);
        }
    
        public function multiplicacion(Request $request)
        {
            $request->validate([
                'num1' => 'required|numeric',
                'num2' => 'required|numeric',
            ]);
    
            $num1 = $request->input('num1');
            $num2 = $request->input('num2');
    
            $resultado = $num1 * $num2;
    
            return response()->json(['operacion' => "$num1 * $num2", 'resultado' => $resultado]);
        }
    
        public function division(Request $request)
        {
            $request->validate([
                'num1' => 'required|numeric',
                'num2' => 'required|numeric',
            ]);
    
            $num1 = $request->input('num1');
            $num2 = $request->input('num2');
    
            $resultado = $num1 / $num2;
    
            return response()->json(['operacion' => "$num1 / $num2", 'resultado' => $resultado]);
        }
    
    
}