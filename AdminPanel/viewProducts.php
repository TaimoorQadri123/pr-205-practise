<?php 
include('php/query.php');
include('components/header.php');

?>


  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                  
                
              

                <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Description</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Product Quantity</th>
                                            <th scope="col">category</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       $query = $pdo->query("select products.id,products.name as pName ,products.price,products.qty,products.description,products.image, categories.name as cName from products inner join categories on products.c_id = categories.id");
                                       $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
                                       foreach($allProducts as $product){
                                       ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $product['pName'] ?></td>
                                            <td><?php echo $product['description'] ?></td>
                                            <td><?php echo $product['price'] ?></td>
                                            <td><?php echo $product['qty'] ?></td>
                                            <td><?php echo $product['cName'] ?></td>

                                            <td><img height="100px" src="images/<?php echo $product['image'] ?>"alt=""> </td>

                                            <td><a href="editProduct.php?pId=<?php echo $product['id'] ?>" class="btn btn-info">Edit</a></td>
                                            <td><a href="?productId=<?php echo $product['id']?>" class="btn btn-danger">Delete</a></td>
                                            
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

              
            </div>
            <!-- Blank End -->

<?php 
include('components/footer.php')
?>