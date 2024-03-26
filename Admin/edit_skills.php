<?php
include('../includes/connection.php');

$updateSuccess = false;
$updateError = false;

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM skills WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->execute([$id]);
        $skills_item = $stmt->fetch(PDO::FETCH_ASSOC);

        if($skills_item) {
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EDIT skills ITEM</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-success mt-3" role="alert" style="width: 60%; margin: auto;" id="success-message">skills item updated successfully!</div>
            
    <form method="POST" enctype="multipart/form-data" class="form">
        <input type="hidden" name="id" value="<?php echo $skills_item['id']; ?>">

        <div class="form-group">
            <label for="skills_image">Image</label>
            <input class="form-control" type="file" name="skills_image" id="skills_image">
        </div>

        <div class="form-group">
            <label for="current_image">Current Image</label><br>
            <img src="<?php echo $skills_item['skills_image']; ?>" alt="Current Image" style="max-width: 100px;">
        </div>

        <button class="btn btn-primary mt-3" type="submit">UPDATE</button>
    </form>
</div>

<?php
        } else {
            // skills item not found, display error message
            echo '<div class="alert alert-danger mt-3" role="alert">skills item not found.</div>';
        }
    } else {
        // Handle SQL statement preparation error
        echo '<div class="alert alert-danger mt-3" role="alert">Error: Failed to prepare SQL statement.</div>';
    }
} else {
    // ID not provided in URL, display error message
    echo '<div class="alert alert-danger mt-3" role="alert">Error: skills ID not provided.</div>';
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Check if image file is selected
    if (isset($_FILES["skills_image"]) && !empty($_FILES["skills_image"]["name"])) {
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["skills_image"]["name"]);

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["skills_image"]["tmp_name"], $targetFile)) {
            // Update image path in the database
            $sql = "UPDATE skills SET skills_image = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                if ($stmt->execute([$targetFile, $id])) {
                    $updateSuccess = true;
                } else {
                    $updateError = true;
                }
            } else {
                $updateError = true;
            }
        } else {
            $updateError = true;
        }
    }
}
?>
<?php include('../includes/header.php'); ?>

<!-- Display success message if update is successful -->
<?php if ($updateSuccess): ?>
     <script>
        setTimeout(function() {
            document.getElementById('success-message').remove();
        }, 3000);
    </script>
<?php endif; ?>

<!-- Display error message if update fails -->
<?php if ($updateError): ?>
    <div class="alert alert-danger mt-3" role="alert" id="error-message">Error: Failed to update skills item.</div>
    <script>
        setTimeout(function() {
            document.getElementById('error-message').remove();
        }, 3000);
    </script>
<?php endif; ?>

<?php include('../includes/footer.php'); ?>
