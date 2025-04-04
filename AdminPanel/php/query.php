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

?>