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
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Category Description</th>
                                            <th scope="col">Category Image</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                       $query = $pdo->query("select * from categories");
                                       $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                       foreach($allCategories as $category){
                                       ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td><?php echo $category['name'] ?></td>
                                            <td><?php echo $category['description'] ?></td>
                                            <td><img height="100px" src="images/<?php echo $category['image'] ?>"alt=""> </td>

                                            <td><a href="editCategory.php?cId=<?php echo $category['id'] ?>" class="btn btn-info">Edit</a></td>
                                            <td><a href="?categoryId=<?php echo $category['id']?>" class="btn btn-danger">Delete</a></td>
                                            
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