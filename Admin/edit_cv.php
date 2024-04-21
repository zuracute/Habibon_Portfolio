<?php
include ('../includes/connection.php');
include ('../includes/header.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM cv WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $cv = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cv) {
        header("Location: manage_cv.php");
        exit();
    }
} else {
    header("Location: manage_cv.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $targetDir = "../admin/uploads/";
    $targetFile = basename($_FILES["cv_file"]["name"]);
    move_uploaded_file($_FILES["cv_file"]["tmp_name"], $targetFile);

    $sql = "UPDATE cv SET CV_file = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$targetFile, $id]);

    echo '<div class="alert alert-success mt-3" role="alert" style="width: 50%; margin: auto;">CV file updated successfully!</div>';
}
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit CV File</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="success-message"></div>

    <form method="POST" enctype="multipart/form-data" class="form">
        <div>
            <label for="cv_file">Select CV file</label>
            <input class="form-control" type="file" name="cv_file" id="cv_file" required="">
        </div>

        <button class="btn btn-primary mt-3" type="submit">Update</button>
    </form>
</div>

<?php include ('../includes/footer.php'); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var alert = document.querySelector('.alert');

        if (alert) {
            setTimeout(function() {
                alert.remove();
            }, 3000);
        }
    });
</script>
