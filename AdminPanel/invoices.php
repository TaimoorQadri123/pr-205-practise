<?php
include('components/header.php');
include('php/dbcon.php'); // database connection file include karein

// Query to fetch data from the invoices table
$query = "SELECT * FROM invoices ORDER BY dateTime DESC";

try {
    // Preparing the SQL query
    $stmt = $pdo->prepare($query);
    $stmt->execute(); // Execute the query
    $invoices = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all data as associative array
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Invoices</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Date</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Total Quantity</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are rows in the result
                    if ($invoices) {
                        // Loop through each row and display in the table
                        foreach ($invoices as $invoice) {
                            // Display each row in the table
                            echo "<tr>
                                    <td><input class='form-check-input' type='checkbox'></td>
                                <td>" . $invoice['datetime'] . "</td> 
                                    <td>INV-" . $invoice['id'] . "</td> <!-- Use invoice number or unique id -->
                                    <td>" . $invoice['u_name'] . "</td> <!-- Customer Name -->
                                    <td>" . $invoice['totalqty'] . "</td> <!-- Total Quantity -->
                                    <td>$" . $invoice['totalAmount'] . "</td> <!-- Total Amount -->
                                    <td>" . $invoice['status'] . "</td>
                                    <td><a class='btn btn-sm btn-primary' href='invoiceDetail.php?id=" . $invoice['id'] . "'>Detail</a></td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No data found</td></tr>"; // If no data found
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include('components/footer.php');
?>
