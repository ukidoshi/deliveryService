<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    /**
     * Расчет стоимости доставки
     * @param $delivery_name
     * @param $source_kladr
     * @param $target_kladr
     * @param $weight
     * @return array
     */
    public function calculateShippingCost($delivery_name, $source_kladr, $target_kladr, $weight): array
    {
        // получаем из бд DeliveryService поле base_url транспортной компании $delivery_name
        // для отправки набора отправлений
        // $delivery_service = DeliveryService::where('name', $delivery_name)->first();
        //
        // if ($delivery_service) {
        //     $baseUrl = $delivery_service->base_url;
        // } else {
        //     // Обработка случая, когда служба доставки с указанным именем не найдена
        // }

        // отправляем запрос в службу доставки
        // $delivery_service = new DeliveryService();
        // $request_to_shipping_company = [
        //    'source_kladr' => $source_kladr,
        //    'target_kladr' => $target_kladr,
        //    'weight' => $weight,
        // ];
        // $shipping_data = $delivery_service->getShippingData($request_to_shipping_company, $base_url);

        // Пример ответа (в зависимости, от выбора службы доставки):
        $example_shipping_data = [];
        if ($delivery_name == "fast_delivery") {
            $example_shipping_data = [
                'price' => 2400,
                'period' => 7,
                'error' => '',
            ];
        } elseif ($delivery_name == "slow_delivery") {
            $example_shipping_data = [
                'coefficient' => 10.7,
                'date' => '2023-11-03',
                'error' => '',
            ];
        }

        // Приводим ответ от службы доставки к единому виду и возвращаем
        $return = [];
        if ($delivery_name == "fast_delivery") {
            // получаем дату добавив кол-во дней доставки
            $new_date_timestamp = strtotime("+".$example_shipping_data["period"]." days", strtotime(date('Y-m-d')));
            $result_date = date('Y-m-d', $new_date_timestamp);

            $return = [
                'price' => $example_shipping_data["price"],
                'date' => $result_date,
                'error' => $example_shipping_data["error"],
            ];
        } elseif ($delivery_name == "slow_delivery") {
            $return = [
                'price' => 150*$example_shipping_data["coefficient"],
                'date' => $example_shipping_data["date"],
                'error' => $example_shipping_data["error"],
            ];
        }

        return $return;
    }
}
