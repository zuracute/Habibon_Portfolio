<?php
include('../includes/connection.php');

$updateSuccess = false;
$updateError = false;
$pageTitle = "Edit Education Item";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM education_d WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->execute([$id]);
        $education_item = $stmt->fetch(PDO::FETCH_ASSOC);

        if($education_item) {
            $pageTitle = "Edit Education Item - " . $education_item['title'];
        } else {
            // Education item not found, display error message
            echo '<div class="alert alert-danger mt-3" role="alert">Education item not found.</div>';
        }
    } else {
        // Handle SQL statement preparation error
        echo '<div class="alert alert-danger mt-3" role="alert">Error: Failed to prepare SQL statement.</div>';
    }
} else {
    // ID not provided in URL, display error message
    echo '<div class="alert alert-danger mt-3" role="alert">Error: Education ID not provided.</div>';
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Check if image file is selected
    if (isset($_FILES["education_image"]) && !empty($_FILES["education_image"]["name"])) {
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["education_image"]["name"]);

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["education_image"]["tmp_name"], $targetFile)) {
            // Update image path in the database
            $sql = "UPDATE education_d SET image = ? WHERE id = ?";
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

    // Update title in the database
    $title = isset($_POST['education_title']) ? $_POST['education_title'] : "";
    $sql = "UPDATE education_d SET title = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        if ($stmt->execute([$title, $id])) {
            $updateSuccess = true;
        } else {
            $updateError = true;
        }
    } else {
        $updateError = true;
    }
}
?>
<?php include('../includes/header.php'); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $pageTitle; ?></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-success mt-3" role="alert" style="width: 60%; margin: auto; display: <?php echo $updateSuccess ? 'block' : 'none'; ?>" id="success-message">Education item updated successfully!</div>
            
    <form method="POST" enctype="multipart/form-data" class="form">
        <input type="hidden" name="id" value="<?php echo $education_item['id']; ?>">

        <div class="form-group">
            <label for="education_title">Title</label>
            <input class="form-control" type="text" name="education_title" id="education_title" value="<?php echo $education_item['title']; ?>" required="">
        </div>

        <div class="form-group">
            <label for="education_image">Image</label>
            <input class="form-control" type="file" name="education_image" id="education_image" onchange="previewImage()">
            <img id="image-preview" src="<?php echo $education_item['image']; ?>" alt="Current Image" style="max-width: 100px;">
        </div>

        <button class="btn btn-primary mt-3" type="submit">UPDATE</button>
    </form>
</div>

<script>
    function previewImage() {
        const preview = document.getElementById('image-preview');
        const fileInput = document.getElementById('education_image');
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    // Automatically remove success message after 3 seconds
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 3000);
</script>

<!-- Display error message if update fails -->
<?php if ($updateError): ?>
    <div class="alert alert-danger mt-3" role="alert" id="error-message">Error: Failed to update education item.</div>
    <script>
        setTimeout(function() {
            document.getElementById('error-message').remove();
        }, 3000);
    </script>
<?php endif; ?>

<?php include('../includes/footer.php'); ?>

