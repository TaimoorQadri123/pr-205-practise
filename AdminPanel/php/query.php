<?php 
include("dbcon.php");
session_start();

$categoryName = $categoryDes = $categoryImageName = ""; 
$categoryNameErr = $categoryDesErr = $categoryImageNameErr = ""; 
if(isset($_POST['addCategory'])){
    $categoryName = $_POST['cName'];
    $categoryDes = $_POST['cDes'];
    $categoryImageName = strtolower($_FILES['cImage']['name']);
    $categoryImageTmpName = $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION);
    $destination= "images/".$categoryImageName;
    if(empty($categoryName)){
        $categoryNameErr = "Category Name is Required"; 
    }
    if(empty($categoryDes)){
        $categoryDesErr = "Category Description is Required"; 
    }
    if(empty($categoryImageName)){
        $categoryImageNameErr = "Image is Required"; 

    }
    else{
        $format = ["jpg","jpeg","png","webp","svg"];
        if(!in_array($extension,$format)){
            $categoryImageNameErr = "Invalid Extension";
        }
    }
    if(empty($categoryNameErr) && empty($categoryDesErr) && empty($categoryImageNameErr)){
        if(move_uploaded_file($categoryImageTmpName,$destination)){
            $query = $pdo->prepare("insert into categories (name,image,description) values (:name ,:image,:des)");
            $query->bindParam(':name',$categoryName);
            $query->bindParam(':des',$categoryDes);
            $query->bindParam(':image',$categoryImageName);
            $query->execute();
            echo "<script>alert('category added');</script>";
            // echo "<script>alert('Category added successfully!'); location.reload();</script>";
            // echo "<script>alert('Category added successfully!'); location.assign('your_page.php');</script>";



        }
    } 

}


// update category 
if(isset($_POST['updateCategory'])){
    $categoryId = $_GET['cId'];
    $categoryName = $_POST['cName'];
    $categoryDes = $_POST['cDes'];
    $query = $pdo->prepare("update categories set name = :cName , description = :cDes where id = :cId");
    if(!empty($_FILES['cImage']['name'])){
        $categoryImageName = $_FILES['cImage']['name'];
        $categoryImageTmpName = $_FILES['cImage']['tmp_name'];
        $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION);
        $destination= "images/".$categoryImageName;
        $format = ["jpg","jpeg","png","webp","svg"];
        if(in_array($extension,$format)){
            if(move_uploaded_file($categoryImageTmpName,$destination)){
                $query = $pdo->prepare("update categories set name = :cName , description = :cDes ,image = :cImage where id = :cId");
                $query->bindParam('cImage',$categoryImageName);
            }

        }
        else{
            echo "<script>alert('Invalid extension')</script>";
        }

    }
    $query->bindParam('cName',$categoryName);
    $query->bindParam('cDes',$categoryDes);
    $query->bindParam('cId',$categoryId);
    $query->execute();
    echo "<script>alert('Category updated');location.assign('viewCategory.php')</script>";


}
// remove  category
if(isset($_GET['categoryId'])){
    $categoryId = $_GET['categoryId'];
    $query = $pdo->prepare("delete from categories where id = :cId");
    $query->bindParam('cId',$categoryId);
    $query->execute();
    echo "<script>alert('Category deleted');location.assign('viewCategory.php')</script>";



}





// addproducts 

$productName = $productPrice = $productDes = $productQuantity = $productImageName = $categoryId = ""; 
$productNameErr = $productPriceErr = $productDesErr = $productQuantityErr = $productImageNameErr = $categoryIdErr = "";

// if(isset($_POST['addProduct'])){
    
    if(isset($_POST['addProduct'])){
        $productName = $_POST['pName'];
        $productPrice = $_POST['pPrice'];
        $productQuantity = $_POST['pQuantity'];
        $productDes = $_POST['pDes'];
        $categoryId =$_POST['cId'];
        $productImageName = strtolower($_FILES['pImage']['name']);
        $productImageTmpName = $_FILES['pImage']['tmp_name'];
        $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
        $destination= "images/".$productImageName;
        if(empty($productName)){
            $productNameErr = "product Name is Required"; 
        }
        if(empty($productPrice)){
            $productPriceErr = "product Price is Required"; 
        }
        if(empty($productQuantity)){
            $productQuantityErr = "product Quantity is Required"; 
        }
        if(empty($productDes)){
            $productDesErr = "product Description is Required"; 
        }
        if(empty($productImageName)){
            $productImageNameErr = "Image is Required"; 
    
        }
        if(empty($categoryId)){
            $categoryIdErr = "cateory is Required"; 
        }
        else{
            $format = ["jpg","jpeg","png","webp","svg"];
            if(!in_array($extension,$format)){
                $productImageNameErr = "Invalid Extension";
            }
        }

        if(empty($productNameErr) && empty($productPriceErr) && empty($productQuantityErr) && empty($productDesErr) && empty($productImageNameErr) && empty($categoryIdErr)){
            if(move_uploaded_file($productImageTmpName,$destination)){
                $query = $pdo->prepare("insert into products (name,price,description,qty,image,c_id) values (:name ,:price ,:des ,:qty ,:image,:cId)");
                $query->bindParam(':name',$productName);
                $query->bindParam(':price',$productPrice);
                $query->bindParam(':des',$productDes);
                $query->bindParam(':qty',$productQuantity);
                $query->bindParam(':image',$productImageName);
                $query->bindParam(':cId',$categoryId);           
                $query->execute();
                echo "<script>alert('product added');</script>";
    
    
    
            }
        }
        
        
    

    
    }
    


//    updat product 


// if(isset($_POST['updateProduct'])){
//     $productId = $_GET['pId'];

//     $productName = $_POST['pName'];
//     $productPrice = $_POST['pPrice'];
//     $productQuantity = $_POST['pQuantity'];
//     $productDes = $_POST['pDes'];
//     $categoryId =$_POST['cId'];

//     $query = $pdo->prepare("update products set name = :pName ,price = :pPrice,Quantity = :pQuantity , description = :pDes , c_id = :cId where id = :pId");
//     if(!empty($_FILES['pImage']['name'])){
//         $productImageName = $_FILES['pImage']['name'];
//         $productImageTmpName = $_FILES['pImage']['tmp_name'];
//         $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
//         $destination= "images/".$productImageName;
//         $format = ["jpg","jpeg","png","webp","svg"];
//         if(in_array($extension,$format)){
//             if(move_uploaded_file($productImageTmpName,$destination)){
//                 $query = $pdo->prepare("update products set name = :pName ,price = :pPrice, Quantity = :pQuantity , description = :pDes  ,image = :pImage where id = :pId");
//                 $query->bindParam('pImage',$productImageName);
//             }

//         }
//         else{
//             echo "<script>alert('Invalid extension')</script>";
//         }

//     }
//     $query->bindParam('pName',$productName);
//     $query->bindParam('pPrice',$productPrice);
//     $query->bindParam('pQuantity',$productQuantity);

//     $query->bindParam('pDes',$productDes);
//     $query->bindParam('cId',$categoryId);
    
    


//     $query->execute();
//     echo "<script>alert('Product updated');location.assign('viewproducts.php')</script>";


// }
 
if(isset($_POST['updateProduct'])){
    $productId = $_GET['pId']; // FIXED
    $productName = $_POST['pName'];
    $productPrice = $_POST['pPrice'];
    $productQuantity = $_POST['pQuantity'];
    $productDes = $_POST['pDes'];
    $categoryId = $_POST['cId'];

    if(!empty($_FILES['pImage']['name'])){
        $productImageName = $_FILES['pImage']['name'];
        $productImageTmpName = $_FILES['pImage']['tmp_name'];
        $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
        $destination = "images/".$productImageName;
        $format = ["jpg", "jpeg", "png", "webp", "svg"];
        
        if(in_array($extension, $format)){
            if(move_uploaded_file($productImageTmpName, $destination)){
                $query = $pdo->prepare("UPDATE products SET name = :pName, price = :pPrice, qty = :pqty, description = :pDes, image = :pImage, c_id = :cId WHERE id = :pId");
                $query->bindParam('pName', $productName);
                $query->bindParam('pPrice', $productPrice);
                $query->bindParam('pqty', $productQuantity);
                $query->bindParam('pDes', $productDes);
                $query->bindParam('pImage', $productImageName);
                $query->bindParam('cId', $categoryId);
                $query->bindParam('pId', $productId);
                $query->execute();
                echo "<script>alert('Product updated with image');location.assign('viewproducts.php')</script>";
                exit;
            }
        } else {
            echo "<script>alert('Invalid extension')</script>";
            exit;
        }
    } else {
        $query = $pdo->prepare("UPDATE products SET name = :pName, price = :pPrice, qty = :pqty, description = :pDes, c_id = :cId WHERE id = :pId");
        $query->bindParam('pName', $productName);
        $query->bindParam('pPrice', $productPrice);
        $query->bindParam('pqty', $productQuantity);
        $query->bindParam('pDes', $productDes);
        $query->bindParam('cId', $categoryId);
        $query->bindParam('pId', $productId);
        $query->execute();
        echo "<script>alert('Product updated');location.assign('viewproducts.php')</script>";
        exit;
    }
}



// ----- update Product ------ //

// if (isset($_POST['updateProduct'])){
//     $productId = $_GET['pId'];
//     $productName = $_POST['pName'];
//     $productDes = $_POST['pDes'];
//     $productPrice = $_POST['pPrice'];
//     $productQuantity = $_POST['pQty'];
//     $categoryId = $_POST['cId'];
//     $productImageName = "";
//     $query = $pdo->prepare("UPDATE products set 
//     id = :pId, 
//     name = :pName,
//     image = :pImage,
//     description = :pDes,
//     qty = :pQty, 
//     price = :pPrice, 
//     c_id = :c_id");
//     if(!empty($_FILES['pImage']['name'])){
//         $productImageName = $_FILES['pImage']['name'];
//         $productImageTmpName = $_FILES['pImage']['tmp_name'];
//         $extension = pathinfo($productImageName, PATHINFO_EXTENSION);
//         $destination = "images/" . $productImageName;
//         $format = ["jpg", "png", "jpeg", "webp", "svg", "gif"];
//         if(in_array($extension, $format)){
//             if(move_uploaded_file($productImageTmpName, $destination)){
//                 $query = $pdo->prepare("update products set name = 
//                 :pName, 
//                 description = :pDes, 
//                 image = :pImage , 
//                 price = pPrice ,
//                 qty = pQty where id = :pId");
//                 $query->bindParam('pImage', $productImageName);
//             }
//         }
//         else{
//             echo "<script>alert('invalid image format');</script>";
//         }
//     }
//      $query->bindParam(':pId', $productId);
//      $query->bindParam('pName',$productName);
//      $query->bindParam('pDes',$productDes);
//      $query->bindParam('pPrice',$productPrice);
//      $query->bindParam('pQty',$productQuantity);
//      $query->bindParam('c_id',$categoryId);
//      $query->bindParam('pImage',$productImageName);
//      $query->execute();
//      echo "<script>alert('Product Updated');location.assign('viewProduct.php')</script>";

// }






// remove product 
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
    $query = $pdo->prepare("DELETE FROM products WHERE id = :pId");
    $query->bindParam(':pId', $productId);
    $query->execute();
    echo "<script>alert('Product deleted');location.assign('viewproducts.php')</script>";
}

// if(isset($_GET['productId'])){
//     $categoryId = $_GET['productId'];
//     $query = $pdo->prepare("delete from product where id = :pId");
//     $query->bindParam('cId',$productId);
//     $query->execute();
//     echo "<script>alert('Product deleted');location.assign('viewproducts.php')</script>";



// }
?>