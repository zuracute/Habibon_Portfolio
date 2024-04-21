<?php
include ('../includes/connection.php');
include ('../includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $about_title = $_POST['about_title'];
    $about_description = $_POST['about_description'];
    $about_role = $_POST['about_role'];

    $targetDir = "../admin/uploads/";
    $targetFile = $targetDir . basename($_FILES["about_image"]["name"]);
    move_uploaded_file($_FILES["about_image"]["tmp_name"], $targetFile);

    $sql = "INSERT INTO about (about_image, about_title, about_role, about_description) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$targetFile, $about_title, $about_role, $about_description]);

    echo '<div class="alert alert-success mt-3" role="alert" style="width: 50%; margin: auto;">About item added successfully!</div>';
}
?>

<?php include ('../includes/header.php'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ADD ABOUT ITEM</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="success-message"></div>

    <form method="POST" enctype="multipart/form-data" class="form">
        <div>
            <label for="about_title">Title</label>
            <input class="form-control" type="text" name="about_title" id="about_title" required="">
        </div>
        
        <div>
            <label for="about_role">Role</label>
            <textarea class="form-control" name="about_role" id="about_role" rows="3" required=""></textarea>
        </div>

        <div>
            <label for="about_description">Description</label>
            <textarea class="form-control" name="about_description" id="about_description" rows="3" required=""></textarea>
        </div>

        

        <div>
            <label for="about_image">Image</label>
            <input class="form-control" type="file" name="about_image" id="about_image" required="">
        </div>

        <button class="btn btn-primary mt-3" type="submit">ADD</button>
    </form>
</div>

<?php include ('../includes/footer.php'); ?>

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
