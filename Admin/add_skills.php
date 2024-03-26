<?php
include('../includes/connection.php');
include('../includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    if (isset($_FILES["skills_image"])) {
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["skills_image"]["name"]);

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["skills_image"]["tmp_name"], $targetFile)) {
            // Insert into database
            $sql = "INSERT INTO skills (skills_image) VALUES (?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->execute([$targetFile]);
                // Show success message
                echo '<div class="alert alert-success mt-3" role="alert" style="width: 50%; margin: auto;">skills added successfully!</div>';
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
                    <h4 class="card-title">ADD skills ITEM</h4>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data" class="form" id="image-upload-form">
        <div class="form-group">
            <label for="skills_image">Image</label>
            <input class="form-control" type="file" name="skills_image" id="skills_image" required="" onchange="previewImage(event)">
        </div>

        <!-- Image preview -->
        <div id="image-preview" class="mt-3"></div>

        <button class="btn btn-primary mt-3" type="submit">ADD</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>

<script>
    // Function to preview the selected image
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var imagePreview = document.getElementById('image-preview');
            imagePreview.innerHTML = '<img src="' + reader.result + '" class="img-fluid" style="max-width: 200px;">';
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.querySelector('.success-message');
        if (successMessage) {
            setTimeout(function() {
                successMessage.remove();
            }, 3000);
        }
    });
</script>
