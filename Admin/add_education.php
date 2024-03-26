<?php
include('../includes/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $education_school = $_POST['education_school'];
    $education_year = $_POST['education_year'];
    $education_levels = $_POST['education_levels'];
    $education_image = ''; 
    $education_image_title = ''; // Default empty value

    // Handle design category
    if (isset($_POST['is_design']) && $_POST['is_design'] == 'true') {
        // Upload image
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["education_image"]["name"]);
        move_uploaded_file($_FILES["education_image"]["tmp_name"], $targetFile);

        $education_image = $targetFile;
        $education_image_title = $_POST['education_image_title'];
    }

    // Insert into database
    $sql = "INSERT INTO educatio (education_school, education_year, education_levels, education_image, education_image_title) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$education_school, $education_year, $education_levels, $education_image, $education_image_title]);

    // Show success message
    echo '<div class="alert alert-success mt-3" role="alert" style="width: 50%; margin: auto;">Education item added successfully!</div>';
}
?>

<?php include('../includes/header.php'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ADD EDUCATION ITEM</h4>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data" class="form">
        <div>
            <label for="education_school">School</label>
            <input class="form-control" type="text" name="education_school" id="education_school">
        </div>
        
        <div>
            <label for="education_year">Year</label>
            <input class="form-control" type="text" name="education_year" id="education_year">
        </div>
        <div>
            <label for="education_levels">Levels</label>
            <input class="form-control" type="text" name="education_levels" id="education_levels">
        </div>


        <button type="button" class="btn btn-primary mt-3" id="show-design-fields">Education Image Design</button>

        <!-- Fields for design category -->
        <div id="design-fields" style="display: none;">
            <div>
                <label for="education_image">Image</label>
                <input class="form-control" type="file" name="education_image" id="education_image">
            </div>

            <div>
                <label for="education_image_title">Image Title</label>
                <input class="form-control" type="text" name="education_image_title" id="education_image_title" >
            </div>
            <input type="hidden" name="is_design" value="true">
        </div>

        <button class="btn btn-primary mt-3" type="submit">ADD</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var showDesignFieldsBtn = document.getElementById('show-design-fields');
        var designFields = document.getElementById('design-fields');

        showDesignFieldsBtn.addEventListener('click', function() {
            if (designFields.style.display === 'none') {
                designFields.style.display = 'block';
                showDesignFieldsBtn.textContent = 'Hide Design Fields';
            } else {
                designFields.style.display = 'none';
                showDesignFieldsBtn.textContent = 'Show Design Fields';
            }
        });
    });
</script>

