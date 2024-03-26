<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage About Me Section</title>
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
                    <h4 class="card-title">MANAGE ABOUT ME SECTION</h4>
              
                         <div class="mb-4">
                        <a href="add_about.php" class="btn yarn">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-container" style="overflow: auto;">
        <table id="about-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php

          // Fetch data from database
          $sql = "SELECT * FROM about";
          $query = $conn->query($sql);

          // Output table rows
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
              echo '<tr>';
              echo '<td><img src="' . $row['about_image'] . '" alt="About Image" style="max-width: 100px;"></td>';
              echo '<td>' . htmlspecialchars($row['about_title']) . '</td>';
              echo '<td>' . htmlspecialchars($row['about_description']) . '</td>';
              echo '<td>
                      <button class="btn btn-danger delete-btn" data-id="' . $row['id'] . '">Delete</button>
                      <a href="edit_about_me.php?id=' . $row['id'] . '" class="btn btn-primary edit-btn">Edit</a>
                    </td>';
              echo '</tr>';
          }
          ?>

            </tbody>
        </table>
    </div>
</div>

<!-- Include SweetAlert2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Include DataTables library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#about-table').DataTable();
        
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
                    deleteAboutItem(id);
                }
            });
        });

        // Function to delete about item
        function deleteAboutItem(id) {
            // AJAX request to delete the about item
            $.ajax({
                url: 'delete_about_me.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    // Show success message
                    Swal.fire(
                        'Deleted!',
                        'The about item has been deleted.',
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
                        'Failed to delete the about item.',
                        'error'
                    );
                }
            });
        }
    });
</script>

<?php include ('../includes/footer.php'); ?>

</body>
</html>
