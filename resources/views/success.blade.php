@php
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Session;

// Verifica si el código ya está en la sesión, si no, genera uno nuevo y guárdalo
if (!Session::has('purchase_code')) {
    $faker = Faker::create();
    $purchaseCode = $faker->unique()->ean8();
    Session::put('purchase_code', $purchaseCode);
} else {
    $purchaseCode = Session::get('purchase_code');
}
@endphp
<x-app-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-white">
        <div class="text-center">
            <img src="{{ Storage::url('checkout.gif') }}" alt="Ilustración de pago exitoso" class="mb-6">
            <h1 class="text-4xl font-bold text-green-600 mb-5">¡Pago Exitoso!</h1>
            <p class="text-lg text-gray-700 text-center mb-5">
                Gracias por tu compra. Recibirás un correo de confirmación en breve. 
                <br>
                Código de compra: <span class="font-bold text-gray-900">#{{ $purchaseCode }}</span>
            </p>
            <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 rosa text-white font-semibold text-lg rounded-md shadow-md  transition-colors">
                Seguir comprando
            </a>
        </div>
    </div>
</x-app-layout>
