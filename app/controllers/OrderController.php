<?php
// app/controllers/OrderController.php
// Handles order creation

class OrderController {

    public function create() {
        requireLogin();

        $supplierModel = new Supplier();
        $orderModel    = new Order();
        $itemModel     = new OrderItem();
        $error         = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $supplier_id     = intval($_POST['supplier_id']);
            $pickup_location = trim($_POST['pickup_location']);
            $order_date      = $_POST['order_date'];
            $quantities      = $_POST['quantity'];
            $unit_prices     = $_POST['unit_price'];
            $descriptions    = $_POST['description'];

            if (!$supplier_id || empty($pickup_location) || empty($order_date)) {
                $error = "Please fill all required fields.";
            } elseif (empty($quantities)) {
                $error = "Add at least one order item.";
            } else {
                // Calculate total
                $total = 0;
                foreach ($quantities as $i => $qty) {
                    $total += intval($qty) * floatval($unit_prices[$i]);
                }

                // Save order
                $order_id = $orderModel->create([
                    'supplier_id'     => $supplier_id,
                    'pickup_location' => $pickup_location,
                    'order_date'      => $order_date,
                    'total_amount'    => $total,
                    'created_by'      => $_SESSION['user_id']
                ]);

                // Save items
                foreach ($quantities as $i => $qty) {
                    if ($qty > 0) {
                        $itemModel->create([
                            'order_id'    => $order_id,
                            'description' => $descriptions[$i],
                            'quantity'    => intval($qty),
                            'unit_price'  => floatval($unit_prices[$i])
                        ]);
                    }
                }

                redirect('?page=receipt&id=' . $order_id . '&new=1');
            }
        }

        $suppliers = $supplierModel->getAll();
        require APP . 'views/orders/create.php';
    }
}
?>