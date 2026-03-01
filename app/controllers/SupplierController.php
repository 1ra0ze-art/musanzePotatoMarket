<?php
// app/controllers/SupplierController.php
// Handles supplier registration, listing, deletion

class SupplierController {

    public function index() {
        requireLogin();

        $supplierModel = new Supplier();
        $success = $error = "";

        // Handle delete
        if (isset($_GET['delete'])) {
            $supplierModel->delete(intval($_GET['delete']));
            $success = "Supplier removed successfully.";
        }

        // Handle registration
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['full_name']);

            if (empty($name)) {
                $error = "Full name is required.";
            } else {
                $supplierModel->create([
                    'full_name'   => $name,
                    'phone'       => trim($_POST['phone']),
                    'location'    => trim($_POST['location']),
                    'national_id' => trim($_POST['national_id'])
                ]);
                $success = "Supplier '$name' registered successfully!";
            }
        }

        $suppliers = $supplierModel->getAll();
        require APP . 'views/suppliers/index.php';
    }
}
?>