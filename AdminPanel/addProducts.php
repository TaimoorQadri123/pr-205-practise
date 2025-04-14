<?php
include("php/query.php");
include("components/header.php");

?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded mx-0">
                    <div class="col-md-6 ">
                    <!-- <div class="col-sm-12 col-xl-6"> -->
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Product Form</h6>
                            <form method ="post"  enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Products Name</label>
                                    <input value="<?php echo $productName?>" name="pName" type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                        <small class="text-danger"><?php echo $productNameErr?></small>
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div> -->
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-control"> Products Description</label>

                                          <textarea name="pDes" class="form-control" type="text" id=""><?php echo $productDes?></textarea>
                                        <small class="text-danger"><?php echo $productDesErr?></small>

                                    <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-control"> Products Price</label>
                                         <input class="form-control" value="<?php echo $productPrice?>" name="pPrice"type="text">
                                        <small class="text-danger"><?php echo $productPriceErr?></small>

                                    <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-control"> Products Quantity</label>
                                         <input value="<?php echo $productQuantity?>" class="form-control" name="pQuantity"type="text">
                                        <small class="text-danger"><?php echo $productQuantityErr?></small>

                                    <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Products Image</label>

                                    <small class="text-danger"><?php echo $productImageNameErr?></small>

                                    <input type="file" class="form-control" name ="pImage">
                                    <!-- <input type="text" class="form-control" id="exampleInputPassword1"> -->
                                </div>
                                
                               
                                <div class="mb-3">
                                 <label for="">Select Category</label>
                                 <select class="form-control" name="cId" id="">
                                 <option>Select</option>
                                 <?php 
                                 $query= $pdo->query("select * from categories");
                                 $allcategories =$query->fetchAll(PDO::FETCH_ASSOC);
                                 foreach ($allcategories as $category) {
                                 ?>
                                  
                                 <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                                     
                                 <?php
                                  }
                                 ?>
   
                                 </select>
                                 <small class="text-danger"><?php echo $categoryIdErr?></small>

                                </div>
                                <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
                                <button name="addProduct" type="submit" class="btn btn-primary">Add Product</button>
                            </form>
                        </div>
                    <!-- </div> -->
                    </div>
                </div>
            </div>
            <!-- Blank End -->


<?php
include("components/footer.php");

?>
<div class="form-group">
 
</div>