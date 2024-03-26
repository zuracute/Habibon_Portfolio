<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Education Section</title>
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
                    <h4 class="card-title">MANAGE EDUCATION SECTION</h4>
              
                    <div class="mb-4">
                        <a href="add_education_design.php" class="btn yarn">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-container" style="overflow: auto;">
        <table id="education-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php

          // Fetch data from database
          $sql = "SELECT * FROM education_d";
          $query = $conn->query($sql);

          // Output table rows
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
              echo '<tr>';
              echo '<td><img src="' . $row['image'] . '" alt="Education Image" style="max-width: 100px;"></td>';
              echo '<td>' . htmlspecialchars($row['title']) . '</td>';
              echo '<td>
                      <button class="btn btn-danger delete-btn" data-id="' . $row['id'] . '">Delete</button>
                      <a href="edit_education_design.php?id=' . $row['id'] . '" class="btn btn-primary edit-btn">Edit</a>
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
        $('#education-table').DataTable();
        
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
                    deleteEducationItem(id);
                }
            });
        });

        // Function to delete education item
        function deleteEducationItem(id) {
            // AJAX request to delete the education item
            $.ajax({
                url: 'delete_education_design.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    // Show success message
                    Swal.fire(
                        'Deleted!',
                        'The education item has been deleted.',
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
                        'Failed to delete the education item.',
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
