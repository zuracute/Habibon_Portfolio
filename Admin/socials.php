<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Social Links</title>
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
                    <h4 class="card-title">MANAGE SOCIAL LINKS</h4>
                    <p class="card-description">MANAGE SOCIAL MEDIA LINKS</p>
                    <div class="mb-4">
                        <a href="add_socials.php" class="btn yarn">Add New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-container" style="overflow: auto;">
        <table id="social-table" class="table table-striped">
            <thead>
                <tr>
                    <!-- <th>Platform</th> -->
                    <th>Platform</th>
                    <th>URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from the socials table
                $sql = "SELECT * FROM socials";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['platform']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['url']) . '</td>';
                    echo '<td>
                    <a href="edit_socials.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a>
                          <button type="button" class="btn btn-danger delete-btn" data-id="' . $row['id'] . '">Delete</button>
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
<!-- Include DataTables and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#social-table').DataTable();
        
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
                    deleteSocialLink(id);
                }
            });
        });

        // Function to delete social link
        function deleteSocialLink(id) {
            // AJAX request to delete the social link
            $.ajax({
                url: 'delete_socials.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    // Show success message
                    Swal.fire(
                        'Deleted!',
                        'The social link has been deleted.',
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
                        'Failed to delete the social link.',
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
