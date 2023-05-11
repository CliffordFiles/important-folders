    <?php
    require_once('dbconn.php');

    try {
        $productID = $_GET['bevID'];
        $product_title = $_POST['bevtitle'];
        $product_price = $_POST['bevprice'];
        $product_desc = $_POST['bevdesc'];
        $product_category = $_POST['bevcategory'];
        $product_image = null;

        // Check if a new image has been uploaded
        if (!empty($_FILES['bevimg']['name'])) {
            $product_image = file_get_contents($_FILES['bevimg']['tmp_name']);
        } else {
            // Retrieve the existing product image from the database
            $stmt = $conn->prepare("SELECT bevimg FROM beverage WHERE bevID = ?");
            $stmt->execute([$productID]);
            $row = $stmt->fetch();
            $product_image = $row['bevimg'];
        }

        $sql = "UPDATE beverage SET bevtitle = :bevtitle, bevdesc = :bevdesc, bevprice = :bevprice, bevimg = :bevimg, bevcategory = :bevcategory WHERE bevID = :bevID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':bevID', $_GET['bevID'], PDO::PARAM_STR);
        $stmt->bindParam(':bevtitle', $_POST['bevtitle'], PDO::PARAM_STR);
        $stmt->bindParam(':bevdesc', $_POST['bevdesc'], PDO::PARAM_STR);
        $stmt->bindParam(':bevprice', $_POST['bevprice'], PDO::PARAM_STR);
        $stmt->bindParam(':bevimg', $product_image, PDO::PARAM_LOB);
        $stmt->bindParam(':bevcategory', $_POST['bevcategory'], PDO::PARAM_STR);
        $stmt->execute();

        header('Location: manageproduct.php');
    } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
    $conn = null;
    ?>
