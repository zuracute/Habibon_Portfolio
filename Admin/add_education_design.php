<?php
include('../includes/connection.php');
include('../includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $image = ''; 
    $title = ''; 
    $createdAt = ''; 

    // Check if image file is selected
    if (isset($_FILES["image"])) {
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert into database
            $image = $targetFile;
            $title = $_POST['title'];
            $createdAt = date('Y-m-d H:i:s');

            $sql = "INSERT INTO education_d (image, title, create_at) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->execute([$image, $title, $createdAt]);
                // Show success message
                echo '<div class="alert alert-success mt-3" role="alert" style="width: 50%; margin: auto;">Gallery updated successfully!</div>';
            } else {
                // Handle SQL statement preparation error
                echo '<div class="success-message mt-3" role="alert" style="width: 50%; margin: auto;">Error: Failed to prepare SQL statement.</div>';
            }
        } else {
            // Handle file upload error
            echo '<div class="success-message mt-3" role="alert" style="width: 50%; margin: auto;">Error: Failed to upload file.</div>';
        }
    } else {
        // Handle missing file upload
        echo '<div class="success-message mt-3" role="alert" style="width: 50%; margin: auto;">Error: No file uploaded.</div>';
    }
}
?>

<?php include('../includes/header.php'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ADD GALLERY ITEM</h4>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data" class="form">
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" required="">
        </div>


        <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control" type="file" name="image" id="image" required="">
        </div>

        <button class="btn btn-primary mt-3" type="submit">ADD</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.querySelector('.success-message');

        if (successMessage) {
            setTimeout(function() {
                successMessage.remove();
            }, 3000);
        }
    });
</script>
