<?php
include('../includes/connection.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM educatio WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $education = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if education item exists
    if(!$education) {
        echo "Education item not found.";
        exit();
    }
} else {
    echo "ID parameter is missing.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $education_school = $_POST['education_school'];
    $education_year = $_POST['education_year'];
    $education_levels = $_POST['education_levels'];
    $education_image = $education['education_image']; 
    $education_image_title = $education['education_image_title']; 

    $sql = "UPDATE educatio SET education_school = ?, education_year = ?, education_levels = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$education_school, $education_year, $education_levels, $id]);

    header("Location: education.php");
    exit();
}
?>

<?php include('../includes/header.php'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EDIT EDUCATION ITEM</h4>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" class="form">
        <div>
            <label for="education_school">School</label>
            <input class="form-control" type="text" name="education_school" id="education_school" value="<?php echo $education['education_school']; ?>">
        </div>
        
        <div>
            <label for="education_year">Year</label>
            <input class="form-control" type="text" name="education_year" id="education_year" value="<?php echo $education['education_year']; ?>">
        </div>

        <div>
            <label for="education_levels">Levels</label>
            <input class="form-control" type="text" name="education_levels" id="education_levels" value="<?php echo $education['education_levels']; ?>">
        </div>

        <!-- Display existing image and image title -->
        <div>
            <label for="education_image">Image</label><br>
            <img src="<?php echo $education['education_image']; ?>" alt="Education Image" style="max-width: 200px;"><br>
            <label for="education_image_title">Image Title</label>
            <input class="form-control" type="text" name="education_image_title" id="education_image_title" value="<?php echo $education['education_image_title']; ?>">
        </div>

        <button class="btn btn-primary mt-3" type="submit">UPDATE</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
