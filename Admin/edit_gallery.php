
<?php


include('../includes/connection.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM gallery WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->execute([$id]);
        $gallery_item = $stmt->fetch(PDO::FETCH_ASSOC);

        if($gallery_item) {
?>

            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">EDIT GALLERY ITEM</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <form method="POST" enctype="multipart/form-data" class="form">
                    <input type="hidden" name="id" value="<?php echo $gallery_item['id']; ?>">

                    <div class="form-group">
                        <label for="gallery_title">Title</label>
                        <input class="form-control" type="text" name="gallery_title" id="gallery_title" value="<?php echo $gallery_item['gallery_title']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="gallery_description">Description</label>
                        <textarea class="form-control" name="gallery_description" id="gallery_description" rows="3"><?php echo $gallery_item['gallery_description']; ?></textarea>
                    </div>
                      <div class="form-group">
                      <label for="gallery_link">Link</label>
                        <textarea class="form-control" name="gallery_link" id="gallery_link" rows="3"><?php echo $gallery_item['gallery_link']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gallery_image">Image</label>
                        <input class="form-control" type="file" name="gallery_image" id="gallery_image">
                    </div>

                    <div class="form-group">
                        <label for="current_image">Current Image</label><br>
                        <img src="<?php echo $gallery_item['gallery_image']; ?>" alt="Current Image" style="max-width: 100px;">
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">UPDATE</button>
                </form>
            </div>
<?php
        } else {
            // Gallery item not found, display error message
            echo '<div class="alert alert-danger mt-3" role="alert">Gallery item not found.</div>';
        }
    } else {
        // Handle SQL statement preparation error
        echo '<div class="alert alert-danger mt-3" role="alert">Error: Failed to prepare SQL statement.</div>';
    }
} else {
    // ID not provided in URL, display error message
    echo '<div class="alert alert-danger mt-3" role="alert">Error: Gallery ID not provided.</div>';
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $gallery_title = isset($_POST['gallery_title']) ? $_POST['gallery_title'] : "";
    $gallery_description = isset($_POST['gallery_description']) ? $_POST['gallery_description'] : "";
    $gallery_link = isset($_POST['gallery_link']) ? $_POST['gallery_link'] : "";

    // Check if image file is selected
    if (isset($_FILES["gallery_image"]) && !empty($_FILES["gallery_image"]["name"])) {
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["gallery_image"]["name"]);

        if (move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $targetFile)) {
            if (file_exists($targetFile)) {
                $sql = "UPDATE gallery SET gallery_image = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->execute([$targetFile, $id]);
                }
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">Error: Failed to move uploaded file.</div>';
            }
        }
    }        

    $sql = "UPDATE gallery SET gallery_title = ?, gallery_description = ?, gallery_link = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->execute([$gallery_title, $gallery_description, $gallery_link, $id]);
        header("Location: gallery.php?id=$id");
        exit();
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: Failed to prepare SQL statement for update.</div>';
    }
}
?>
<?php include('../includes/header.php'); ?>
<?php include('../includes/footer.php'); ?>
