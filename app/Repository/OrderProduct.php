<?php


namespace app\Repository;

use app\Trait\Ajax;
use app\Models\Order;
use app\Models\Product;
use app\Models\OrderProduct as OProduct;

class OrderProduct
{
    use Ajax;

    private Order $order;
    private array $data;
    private int $orderid;
    private float $summ = 0;
    private int $count = 0;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->order = new Order();
    }


    public function addOrder() {
        $this->order();
        $this->addOrderProduct();
    }


    private function order() {
        $this->order->ip = OrderProduct::getIp();
        $this->order->email = !empty($this->data['email']) ? $this->data['email'] : null;
        $this->order->phone = !empty($this->data['phone']) ? $this->data['phone'] : null;
        $this->order->date = date('Y-m-d H:i:s');
        $this->order->status_order = Order::STATUS_ORDERED;
        $this->order->save();
        $this->orderid = $this->order->id;
    }

    private function addOrderProduct() {
        if(!empty($this->data)) {
            foreach ($this->data as $prod) {

                $result = Product::getProduct($prod['product_id'], $prod['product_id']);
                $count = !empty($prod['count']) ? $prod['count'] : 0;

                $orderProduct = new OProduct();
                $orderProduct->order_id = !empty($this->orderid) ? $this->orderid : null;
                $orderProduct->product_id = !empty($prod['product_id']) ? $prod['product_id'] : null;
                $orderProduct->product_variant_id = !empty($prod['product_variant_id']) ? $prod['product_variant_id'] : null;
                $orderProduct->count = !empty($prod['count']) ? $prod['count'] : null;
                $orderProduct->summ = $orderProduct->count * $result->price;
                $orderProduct->save();

                $this->summ = $orderProduct->summ + $this->summ;
                $this->count = $this->count + $count;
            }

            $this->orderid->summ = $this->summ;
            $this->orderid->count = $this->count;
            $this->orderid->status_order = Order::STATUS_PROCESSING;
            $this->orderid->update();
        }
    }

}