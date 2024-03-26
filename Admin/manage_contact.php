<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Section</title>
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
                    <h4 class="card-title">CONTACT SECTION</h4>
                    <p class="card-description">MANAGE CONTACT ENTRIES</p>
                </div>
            </div>
        </div>
    </div>

    <div class="table-container" style="overflow: auto;">
        <table id="contact-table" class="table table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from the contact table
                $sql = "SELECT * FROM contact";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['phone']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['message']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['created_at']) . '</td>';
                    echo '<td>
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
        $('#contact-table').DataTable();
        
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
                    deleteContactEntry(id);
                }
            });
        });

        // Function to delete contact entry
        function deleteContactEntry(id) {
            // AJAX request to delete the contact entry
            $.ajax({
                url: 'delete_contact.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    // Show success message
                    Swal.fire(
                        'Deleted!',
                        'The contact entry has been deleted.',
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
                        'Failed to delete the contact entry.',
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
