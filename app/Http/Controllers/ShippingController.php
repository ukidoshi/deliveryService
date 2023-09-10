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
        $sourceKladr = $request->input('source_kladr'); // кладр откуда везем
        $targetKladr = $request->input('target_kladr'); // кладр куда везем
        $weight = $request->input('weight'); // вес отправления в кг

        // В нашем случае, имеем два выбора службы доставки: fast_delivery или slow_delivery
        $selectedService = $request->input('selected_service');

        // делаем расчет доставки на основе запроса
        $shipment = new Shipment();
        $deliveryData = $shipment->calculateShippingCost($selectedService, $sourceKladr, $targetKladr, $weight);

        return view('shipping.calcForm', [
            'selectedService' => $selectedService,
            'sourceKladr' => $sourceKladr,
            'targetKladr' => $targetKladr,
            'weight' => $weight,
            'deliveryData' => $deliveryData,
        ]);
    }
}
