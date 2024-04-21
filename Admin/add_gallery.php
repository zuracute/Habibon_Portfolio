<?php
include('../includes/connection.php');
include('../includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gallery_title = isset($_POST['gallery_title']) ? $_POST['gallery_title'] : "";
    $gallery_description = isset($_POST['gallery_description']) ? $_POST['gallery_description'] : "";
    $gallery_link = isset($_POST['gallery_link']) ? $_POST['gallery_link'] : "";

    if (isset($_FILES["gallery_image"])) {
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["gallery_image"]["name"]);

        if (move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $targetFile)) {

            $sql = "INSERT INTO gallery (gallery_image, gallery_title, gallery_description, gallery_link) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->execute([$targetFile, $gallery_title, $gallery_description, $gallery_link]);
                echo '<div class="alert alert-success mt-3" role="alert" style="width: 50%; margin: auto;">Gallery updated successfully!</div>';
            } else {
                echo '<div class="success-message mt-3" role="alert" style="width: 50%; margin: auto;">Error: Failed to prepare SQL statement.</div>';
            }
        } else {
            echo '<div class="success-message mt-3" role="alert" style="width: 50%; margin: auto;">Error: Failed to upload file.</div>';
        }
    } else {
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
         <div class="form-group">
            <label for="gallery_link">Projects/Works Links</label>
            <input class="form-control" type="url" name="gallery_link" id="gallery_link">
        </div>

        <button class="btn btn-primary mt-3" type="submit">ADD</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
<script>
    setTimeout(function() {
        var alert = document.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 3000);
</script>


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
