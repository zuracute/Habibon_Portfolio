<?php
include ('../includes/connection.php');
include ('../includes/header.php');

// Initialize $achievement variable
$achievement = null;

// Check if ID parameter is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID parameter to prevent SQL injection
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare SQL statement to fetch the achievement details by ID
    $sql = "SELECT * FROM achievements WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->execute([$id]);

        // Fetch the achievement details
        $achievement = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        // Handle SQL statement preparation error
        echo "Error: Failed to prepare SQL statement.";
    }
} else {
    // Handle missing ID parameter error
    echo "Error: ID parameter is missing in the URL.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $category = $_POST['category'];

    if ($category == "achievements") {
        // Update achievement details
        $achievementTitle = $_POST['achievementTitle'];
        // Upload image
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["achievementImage"]["name"]);
        move_uploaded_file($_FILES["achievementImage"]["tmp_name"], $targetFile);

        // Update achievement details in the database
        $sql = "UPDATE achievements SET A_title = ?, A_image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$achievementTitle, $targetFile, $id]);
    } else if ($category == "intro") {
        // Update introduction details
        $introTitle = $_POST['introTitle'];
        $introRole = $_POST['introRole'];
        $introDescription = $_POST['introDescription'];

        // Update introduction details in the database
        $sql = "UPDATE achievements SET intro_title = ?, intro_role = ?, intro_description = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$introTitle, $introRole, $introDescription, $id]);
    } else if ($category == "header") {
        // Update header details
        $headerName = $_POST['headerName'];
        $headerNickname = $_POST['headerNickname'];

        // Update header details in the database
        $sql = "UPDATE achievements SET header_name = ?, header_nickname = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$headerName, $headerNickname, $id]);
    }
    // Show success message
    echo '<div class="alert alert-success mt-3" role="alert" style="width: 50%; margin: auto;">Data updated successfully!</div>';
    } 
    ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successMessage = document.querySelector('.alert-success');
        var errorMessage = document.querySelector('.alert-danger');

        if (successMessage) {
            setTimeout(function() {
                successMessage.remove();
            }, 3000); // Remove success message after 3 seconds
        }

        if (errorMessage) {
            setTimeout(function() {
                errorMessage.remove();
            }, 3000); // Remove error message after 3 seconds
        }
    });
</script>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit header, introduction, and ahievement section</h4>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data" class="form">
        <input type="hidden" name="id" value="<?php echo $achievement['id']; ?>">
        <p class="title">Manage header, introduction, and ahievement section</p>

        <div>
            <select class="form-select" name="category" id="category" required="">
                <option value="">Select Category</option>
                <option value="achievements" <?php echo $achievement['category'] == 'achievements' ? 'selected' : ''; ?>>Achievements</option>
                <option value="intro" <?php echo $achievement['category'] == 'intro' ? 'selected' : ''; ?>>Introduction</option>
                <option value="header" <?php echo $achievement['category'] == 'header' ? 'selected' : ''; ?>>Header</option>
            </select>
        </div>

        <div id="achievementsFields" style="display: none;">
            <!-- Display input fields related to achievements -->
            <label>
                <div>
                    <input class="input" type="text" name="achievementTitle" placeholder="Achievement Title" value="<?php echo $achievement['A_title']; ?>">
                    <span>Achievement Title</span>
                </div>
            </label>
            <label>
                <div>
                    <input class="input" type="file" name="achievementImage">
                    <span>Achievement Image</span>
                </div>
            </label>
            <?php if (!empty($achievement['A_image'])) : ?>
                <div>
                    <img src="<?php echo $achievement['A_image']; ?>" alt="Current Image" style="max-width: 250px;">
                </div>
            <?php endif; ?>
        </div>

        <div id="introFields" style="display: none;">
            <!-- Display input fields related to introduction -->
            <label>
                <div>
                    <input class="input" type="text" name="introTitle" placeholder="Intro Title" value="<?php echo $achievement['intro_title']; ?>">
                    <span>Intro Title</span>
                </div>
            </label>
            <label>
                <div>
                    <input class="input" type="text" name="introRole" placeholder="Intro Role" value="<?php echo $achievement['intro_role']; ?>">
                    <span>Intro Role</span>
                </div>
            </label>
            <label>
                <div>
                    <input class="input" type="text" name="introDescription" placeholder="Intro Description" value="<?php echo $achievement['intro_description']; ?>">
                    <span>Intro Description</span>
                </div>
            </label>
        </div>

        <div id="headerFields" style="display: none;">
            <!-- Display input fields related to header -->
            <label>
                <div>
                    <input class="input" type="text" name="headerName" placeholder="Header Name" value="<?php echo $achievement['header_name']; ?>">
                    <span>Header Name</span>
                </div>
            </label>
            <label>
                <div>
                    <input class="input" type="text" name="headerNickname" placeholder="Header Nickname" value="<?php echo $achievement['header_nickname']; ?>">
                    <span>Header Nickname</span>
                </div>
            </label>
        </div>

        <button class="submit" type="submit">Update</button>
        <!-- <button><a href="../admin/Achievements.php" class="back">Back</a></button> -->
    </form>
</div>


<?php include ('../includes/footer.php'); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the category value
        var category = '<?php echo $achievement["category"]; ?>';

        // Show or hide fields based on category
        if (category === 'achievements') {
            document.getElementById('achievementsFields').style.display = 'block';
        } else if (category === 'intro') {
            document.getElementById('introFields').style.display = 'block';
        } else if (category === 'header') {
            document.getElementById('headerFields').style.display = 'block';
        }

        // Add event listener for category change
        document.getElementById('category').addEventListener('change', function() {
            var category = this.value;
            if (category === 'achievements') {
                // Show input fields related to achievements
                document.getElementById('achievementsFields').style.display = 'block';
                document.getElementById('introFields').style.display = 'none';
                document.getElementById('headerFields').style.display = 'none';
            } else if (category === 'intro') {
                // Show input fields related to introduction
                document.getElementById('achievementsFields').style.display = 'none';
                document.getElementById('introFields').style.display = 'block';
                document.getElementById('headerFields').style.display = 'none';
            } else if (category === 'header') {
                // Show input fields related to header
                document.getElementById('achievementsFields').style.display = 'none';
                document.getElementById('introFields').style.display = 'none';
                document.getElementById('headerFields').style.display = 'block';
            }
        });
    });
</script>

