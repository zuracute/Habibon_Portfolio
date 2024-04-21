<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Section</title>
    <!-- Include DataTables CSS -->
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
                    <h4 class="card-title">CURRICULUM VITAE SECTION</h4>
                    <p class="card-description">MANAGE CV ENTRIES</p>
                      <div class="mb-4">
                        <a href="add_cv.php" class="btn yarn">Add New</a>
                    </div>
                </div>
              
            </div>
        </div>
        </div>
    </div>

    <div class="table-container" style="overflow: auto;">
        <table id="cv-table" class="table table-striped">
     
            <thead>
                <tr>
                    <th>cv</th>
                    <th>Action</th>
                    <th>Action</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM cv";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . basename($row['cv_file']) . '</td>'; // Ensure column name matches database
                    echo '<td>
                            <a href="' . $row['cv_file'] . '" class="btn btn-primary" download>Download</a>
                          </td>';
                    echo '<td>
                    <a href="edit_cv.php?id=' . $row['id'] . '" class="btn btn-warning">Edit</a>
                       
                    <button type="button" class="btn btn-danger delete-btn" data-id="' . $row['id'] . '">Delete</button>
                    </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#cv-table').DataTable({
            "order": [], // Disable initial sorting
            "paging": true, // Enable paging
            "lengthMenu": [5, 10, 25, 50], // Set page length options
            "pageLength": 10 // Set default page length
        });
        
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
                    deleteCVItem(id);
                }
            });
        });

        // Function to delete CV item
        function deleteCVItem(id) {
            // AJAX request to delete the CV item
            $.ajax({
                url: 'delete_cv.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    // Show success message
                    Swal.fire(
                        'Deleted!',
                        'The CV file has been deleted.',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Error!',
                        'Failed to delete the CV file.',
                        'error'
                    );
                }
            });
        }
    });
</script>

<?php include ('../includes/footer.php'); ?>
