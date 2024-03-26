<?php
include('../includes/connection.php');
include('../includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $gallery_title = isset($_POST['gallery_title']) ? $_POST['gallery_title'] : "";
    $gallery_description = isset($_POST['gallery_description']) ? $_POST['gallery_description'] : "";

    // Check if image file is selected
    if (isset($_FILES["gallery_image"])) {
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["gallery_image"]["name"]);

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $targetFile)) {
            // Insert into database
            $sql = "INSERT INTO gallery (gallery_image, gallery_title, gallery_description) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->execute([$targetFile, $gallery_title, $gallery_description]);
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
            <label for="gallery_title">Title</label>
            <input class="form-control" type="text" name="gallery_title" id="gallery_title" required="">
        </div>

        <div class="form-group">
            <label for="gallery_description">Description</label>
            <textarea class="form-control" name="gallery_description" id="gallery_description" rows="3" required=""></textarea>
        </div>

        <div class="form-group">
            <label for="gallery_image">Image</label>
            <input class="form-control" type="file" name="gallery_image" id="gallery_image" required="">
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
