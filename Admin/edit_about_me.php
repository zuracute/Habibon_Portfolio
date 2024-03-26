<?php
include('../includes/connection.php');
include('../includes/header.php');

// Check if ID is provided in the URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch about item from the database based on ID
    $sql = "SELECT * FROM about WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $aboutItem = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if about item exists
    if(!$aboutItem) {
        echo '<div class="alert alert-danger mt-3" role="alert" style="width: 50%; margin: auto;">About item not found.</div>';
    }
} else {
    echo '<div class="alert alert-danger mt-3" role="alert" style="width: 50%; margin: auto;">ID parameter is missing in the URL.</div>';
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $about_title = $_POST['about_title'];
    $about_description = $_POST['about_description'];
    $about_role = $_POST['about_role'];

    // Check if image file is selected
    if (isset($_FILES["about_image"]) && !empty($_FILES["about_image"]["name"])) {
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["about_image"]["name"]);
        move_uploaded_file($_FILES["about_image"]["tmp_name"], $targetFile);
    } else {
        // If no new image is uploaded, use the existing image
        $targetFile = $aboutItem['about_image'];
    }

    // Update about item in the database
    $sql = "UPDATE about SET about_title = ?, about_role = ?, about_description = ?, about_image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$about_title, $about_role, $about_description, $targetFile, $id]);

    // Show success message
    echo '<div class="alert alert-success mt-3" role="alert" style="width: 50%; margin: auto;">About item updated successfully!</div>';

    // Fetch updated about item data
    $sql = "SELECT * FROM about WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $aboutItem = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EDIT ABOUT ITEM</h4>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data" class="form">
        <div class="form-group">
            <label for="about_title">Title</label>
            <input class="form-control" type="text" name="about_title" id="about_title" value="<?php echo $aboutItem['about_title']; ?>" required="">
        </div>

        <div class="form-group">
            <label for="about_role">Role</label>
            <textarea class="form-control" name="about_role" id="about_role" rows="3" required=""><?php echo $aboutItem['about_role']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="about_description">Description</label>
            <textarea class="form-control" name="about_description" id="about_description" rows="3" required=""><?php echo $aboutItem['about_description']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="about_image">Image</label>
            <input class="form-control" type="file" name="about_image" id="about_image">
            <img src="<?php echo $aboutItem['about_image']; ?>" alt="About Image" style="max-width: 200px;">
        </div>

        <button class="btn btn-primary mt-3" type="submit">UPDATE</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
