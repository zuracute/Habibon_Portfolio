<?php
include('../includes/connection.php');

// Check if ID is provided
if (!isset($_GET['id'])) {
    header("Location: socials.php?error=1");
    exit();
}

$id = $_GET['id'];

// Fetch the social link details based on the provided ID
$sql = "SELECT * FROM socials WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$social = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the social link with the provided ID exists
if (!$social) {
    header("Location: socials.php?error=1");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $platform = htmlspecialchars($_POST['platform']);
    $url = htmlspecialchars($_POST['url']);

    $sql = "UPDATE socials SET platform = :platform, url = :url WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':platform', $platform);
    $stmt->bindParam(':url', $url);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: socials.php?success=1");
        exit();
    } else {
        header("Location: edit_socials.php?id=$id&error=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Social Link</title>
</head>
<body>

<?php include ('../includes/header.php'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EDIT SOCIAL LINK</h4>
                    <form action="edit_socials.php?id=<?php echo $id; ?>" method="POST">
                        <div class="mb-3">
                            <label for="platform" class="form-label">Platform</label>
                            <input type="text" class="form-control" id="platform" name="platform" value="<?php echo htmlspecialchars($social['platform']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">URL</label>
                            <input type="url" class="form-control" id="url" name="url" value="<?php echo htmlspecialchars($social['url']); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('../includes/footer.php'); ?>

</body>
</html>
