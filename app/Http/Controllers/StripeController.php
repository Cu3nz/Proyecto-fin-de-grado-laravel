<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    public function checkout()
    {
        $productosEnCarrito = ShoppingCart::where('user_id', auth()->user()->id)->get();
        return view('checkout', compact('productosEnCarrito'));
    }

    public function session(Request $request)
    {
        Stripe::setApiKey(config('stripe.sk'));

        $lineItems = [];
        $productosEnCarrito = ShoppingCart::where('user_id', auth()->user()->id)->get();
        

        foreach ($productosEnCarrito as $producto) {
            $priceWithTax = $producto->precio_unitario * 1.21; // Incluir IVA del 21%
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',  // Cambiado a euros
                    'product_data' => [
                        'name' => $producto->nombre_producto,
                        'images' => [asset('storage/' . $producto->imagen_producto)], // Agregar imagen del producto
                    ],
                    'unit_amount' => round($priceWithTax * 100), // La cantidad debe estar en centavos
                ],
                'quantity' => $producto->cantidad,
            ];
        }

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('success'),
                'cancel_url' => route('checkout'),
            ]);

            return redirect($session->url);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Hubo un problema con la transacción, por favor intenta de nuevo.');
        }
    }

    public function success()
    {
        ShoppingCart::where('user_id', auth()->user()->id)->delete(); // Limpiar carrito
        return view('success');
    }
}
