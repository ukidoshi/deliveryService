<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;

class ShippingController extends Controller
{
    public function showShippingForm()
    {
        return view('shipping.calcForm');
    }
    public function getShippingCost(Request $request)
    {
        // Получаем данные о доставке из $request
        $source_kladr = $request->input('source_kladr'); // кладр откуда везем
        $target_kladr = $request->input('target_kladr'); // кладр куда везем
        $weight = $request->input('weight'); // вес отправления в кг

        // В нашем случае, имеем два выбора службы доставки: fast_delivery или slow_delivery
        $selected_service = $request->input('selected_service');

        // делаем расчет доставки на основе запроса
        $shipment = new Shipment();
        $delivery_data = $shipment->calculateShippingCost($selected_service, $source_kladr, $target_kladr, $weight);

        return view('shipping.calcForm', [
            'selected_service' => $selected_service,
            'source_kladr' => $source_kladr,
            'target_kladr' => $target_kladr,
            'weight' => $weight,
            'delivery_data' => $delivery_data,
        ]);
    }
}
