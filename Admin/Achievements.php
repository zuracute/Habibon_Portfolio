<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A, I , H Section</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</head>
<body>

<?php include ('../includes/connection.php'); ?>
<?php include ('../includes/header.php'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">MANAGE HEADER, ACHIEVEMENTS AND INTRODUCTION</h4>
                    <div class="mb-4">
                        <a href="add_achievements.php" class="btn yarn">Add New</a>
                    </div>
                </div>
             
            </div>
        </div>
    </div>

    <div class="table-container" style="overflow: auto;">
        <table id="achievements-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Intro Title</th>
                    <th>Intro Role</th>
                    <th>Intro Description</th>
                    <th>Name</th>
                    <th>Nickname</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from achievements table
                $sql = "SELECT * FROM achievements";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $row['category'] . '</td>';
                    echo '<td>' . $row['A_title'] . '</td>';
                    echo '<td><img src="' . $row['A_image'] . '" alt="Achievement Image" style="max-width: 100px;"></td>';
                    echo '<td>' . $row['intro_title'] . '</td>';
                    echo '<td>' . $row['intro_role'] . '</td>';
                    echo '<td>' . $row['intro_description'] . '</td>';
                    echo '<td>' . $row['header_name'] . '</td>';
                    echo '<td>' . $row['header_nickname'] . '</td>';
                    echo '<td>
                        <button class="btn btn-danger delete-btn" data-id="' . $row['id'] . '">Delete</button>
                        <a href="edit_Achievements.php?id=' . $row['id'] . '" class="btn btn-primary edit-btn">Edit</a>
                    </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Include DataTables library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- Include SweetAlert2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    $(document).ready(function() {
        $('#achievements-table').DataTable();
        
        // Add event listener for delete button clicks
        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            // Display SweetAlert2 confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform delete operation
                    deleteAchievement(id);
                }
            });
        });

        // Function to delete achievement
        function deleteAchievement(id) {
            // AJAX request to delete the achievement
            $.ajax({
                url: 'delete_Achievements.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    // Show success message
                    Swal.fire(
                        'Deleted!',
                        'The achievement has been deleted.',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            // Reload the page after successful deletion
                            location.reload();
                        }
                    });
                },
                error: function(xhr, status, error) {
                    // Show error message
                    Swal.fire(
                        'Error!',
                        'Failed to delete the achievement.',
                        'error'
                    );
                }
            });
        }
    });
</script>

<?php include ('../includes/footer.php'); ?>
