<?php
include('components/header.php');
include('php/query.php'); // database connection file include karein

// Query to fetch data from the orders table
$query = "SELECT * FROM orders ORDER BY datetime DESC";

try {
    // Preparing the SQL query
    $stmt = $pdo->prepare($query);
    $stmt->execute(); // Execute the query
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all data as associative array
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Sales</h6>
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
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are rows in the result
                    if ($orders) {
                        // Loop through each row and display in the table
                        foreach ($orders as $row) {
                            // Display each row in the table
                            echo "<tr>
                                    <td><input class='form-check-input' type='checkbox'></td>
                                    <td>" . $row['datetime'] . "</td> 
                                    <td>INV-" . $row['id'] . "</td> <!-- Use invoice number or unique id -->
                                    <td>" . $row['u_name'] . "</td> <!-- Customer Name -->
                                    <td>$" . $row['p_price'] * $row['p_qty'] . "</td> <!-- Amount (Price * Quantity) -->
                                    <td>" . $row['status'] . "</td>
                                    <td><a class='btn btn-sm btn-primary' href='detail.php?id=" . $row['id'] . "'>Detail</a></td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No data found</td></tr>"; // If no data found
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
