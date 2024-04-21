<?php
include ('../includes/connection.php');
include ('../includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $targetFile =  basename($_FILES["cv_file"]["name"]);
    move_uploaded_file($_FILES["cv_file"]["tmp_name"], $targetFile);
    
    $sql = "INSERT INTO CV (CV_file) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$targetFile]);

    echo '<div class="alert alert-success mt-3" role="alert" style="width: 50%; margin: auto;">CV file added successfully!</div>';
}
?>

<?php include ('../includes/header.php'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">UPLOAD CV FILE</h4>
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

        <button class="btn btn-primary mt-3" type="submit">UPLOAD</button>
    </form>
</div>

<?php include ('../includes/footer.php'); ?>

<script>
    setTimeout(function() {
        var alert = document.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 3000);
</script>
