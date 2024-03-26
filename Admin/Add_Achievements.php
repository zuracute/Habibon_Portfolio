<?php
include ('../includes/connection.php');
include ('../includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $category = $_POST['category'];

    if ($category == "achievements") {
        $achievementTitle = $_POST['achievementTitle'];
        // Upload image
        $targetDir = "../admin/uploads/";
        $targetFile = $targetDir . basename($_FILES["achievementImage"]["name"]);
        move_uploaded_file($_FILES["achievementImage"]["tmp_name"], $targetFile);

        // Insert into database for achievements
        $sql = "INSERT INTO achievements (A_title, A_image, category) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$achievementTitle, $targetFile, $category]);
    } else if ($category == "intro") {
        $introTitle = $_POST['introTitle'];
        $introRole = $_POST['introRole'];
        $introDescription = $_POST['introDescription'];

        // Insert into database for introduction
        $sql = "INSERT INTO achievements (intro_title, intro_role, intro_description, category) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$introTitle, $introRole, $introDescription, $category]);
    } else if ($category == "header") {
        $headerName = $_POST['headerName'];
        $headerNickname = $_POST['headerNickname'];

        // Insert into database for header
        $sql = "INSERT INTO achievements (header_name, header_nickname, category) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$headerName, $headerNickname, $category]);
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

<?php include ('../includes/header.php'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">ACHIEVEMENTS SECTION</h4>
                    <p class="card-description">MANAGE ACHIEVEMENTS</p>
                </div>
            </div>
        </div>
    </div>

    <div class="success-message"></div>

    <form method="POST" enctype="multipart/form-data" class="form">
        <p class="title">Manage Your ACHIEVEMENTS</p>

        <div>
            <select class="form-select" name="category" id="category" required="">
                <option value="">Select Category</option>
                <option value="achievements">Achievements</option>
                <option value="intro">Introduction</option>
                <option value="header">Header</option> 
            </select>
        </div>

        <div id="achievementsFields" style="display: none;">
            <label>
                <div>
                    <input class="input" type="text" name="achievementTitle" placeholder="">
                    <span>Achievement Title</span>
                </div>
            </label>
            <label>
                <div>
                    <input class="input" type="file" name="achievementImage">
                    <span>Achievement Image</span>
                </div>
            </label>
        </div>

        <div id="introFields" style="display: none;">
            <label>
                <div>
                    <input class="input" type="text" name="introTitle" placeholder="">
                    <span>Intro Title</span>
                </div>
            </label>
            <label>
                <div>
                    <input class="input" type="text" name="introRole" placeholder="">
                    <span>Intro Role</span>
                </div>
            </label>
            <label>
                <div>
                    <input class="input" type="text" name="introDescription" placeholder="">
                    <span>Intro Description</span>
                </div>
            </label>
        </div>

        <div id="headerFields" style="display: none;"> <!-- Added header fields -->
            <label>
                <div>
                    <input class="input" type="text" name="headerName" placeholder="">
                    <span>Header Name</span>
                </div>
            </label>
            <label>
                <div>
                    <input class="input" type="text" name="headerNickname" placeholder="">
                    <span>Header Nickname</span>
                </div>
            </label>
        </div>

        <button class="submit" type="submit">ADD</button>
    </form>
</div>

<?php include ('../includes/footer.php'); ?>

<script>
    document.getElementById('category').addEventListener('change', function() {
        var category = this.value;
        if (category == "achievements") {
            document.getElementById('achievementsFields').style.display = 'block';
            document.getElementById('introFields').style.display = 'none';
            document.getElementById('headerFields').style.display = 'none'; // Hide header fields
        } else if (category == "intro") {
            document.getElementById('achievementsFields').style.display = 'none';
            document.getElementById('introFields').style.display = 'block';
            document.getElementById('headerFields').style.display = 'none'; // Hide header fields
        } else if (category == "header") { // Added condition for header category
            document.getElementById('achievementsFields').style.display = 'none';
            document.getElementById('introFields').style.display = 'none';
            document.getElementById('headerFields').style.display = 'block'; // Show header fields
        } else {
            document.getElementById('achievementsFields').style.display = 'none';
            document.getElementById('introFields').style.display = 'none';
            document.getElementById('headerFields').style.display = 'none'; // Hide header fields
        }
    });
</script>

<script>
                // itu ay para sa sidebar yung hamburger yan ah if mag close ka sa labas ng sidebar yan ah
                var offcanvasElement = document.getElementById('offcanvasWithBothOptions');
                offcanvasElement.addEventListener('hidden.bs.offcanvas', function () {
                var toggleOffcanvasCheckbox = document.getElementById('toggleOffcanvas');
                toggleOffcanvasCheckbox.checked = false;
                });

                document.addEventListener('click', function(event) {
                const sidebar = document.querySelector('.sidebar');
                const toggleOffcanvas = document.getElementById('toggleOffcanvas');
                const target = event.target;

                // Check if the click is outside the sidebar and the sidebar is open
                if (!sidebar.contains(target) && toggleOffcanvas.checked) {
                toggleOffcanvas.checked = false;
                }
                });

                    document.addEventListener('DOMContentLoaded', function() {
                        var successMessage = document.querySelector('.success-message');

                        if (successMessage) {
                            setTimeout(function() {
                                successMessage.remove();
                            }, 3000);
                        }
                    });

            </script>

<?php include ('../includes/footer.php'); ?>