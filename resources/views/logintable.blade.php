<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <title>User Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>User Table</h1>
    <table id="userTable">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    @foreach ($datas as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td class="editable" data-field="username">{{ $data->username }}</td>
        <td class="editable" data-field="password">{{ $data->password }}</td>
        <td>
            <button class="edit-update-button">Edit</button>
        </td>
        {{-- <td>
            <button class="edit-update-button" style="display:none";>update</button>
        </td> --}}
        <td>
            <button class="delete-button" data-id="{{ $data->id }}">Delete</button>
        </td>
    </tr>
    @endforeach
</table>
<script>
    $(document).ready(function() {
    $('#userTable').DataTable();
});

</script>
{{-- for updation --}}
<script>
    const editUpdateButtons = document.querySelectorAll('.edit-update-button');
    const deleteButtons = document.querySelectorAll('.delete-button');

    editUpdateButtons.forEach(button => {
        button.addEventListener('click', function () {
            const row = this.parentElement.parentElement;
            const cells = row.querySelectorAll('.editable');
            const isEditMode = this.textContent === 'Update';

            cells.forEach(cell => {
                const field = cell.getAttribute('data-field');
                if (isEditMode) {
                    // Save changes and update the field
                    const newValue = cell.querySelector('input').value;
                    // Send the new value to the server via AJAX (you need to implement this)
                    // After a successful update, replace the input with the new value
                    cell.innerHTML = newValue;
                } else {
                    // Switch to edit mode
                    const currentValue = cell.textContent;
                    cell.innerHTML = `<input type="text" value="${currentValue}">`;
                }
            });

            // Toggle button text
            this.textContent = isEditMode ? 'Edit' : 'Update';
        });
    });

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const row = this.parentElement.parentElement;
            row.remove(); // Remove the row when the "Delete" button is clicked
        });
    });
</script>

{{-- deletion logic --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-button').on('click', function() {
            if (confirm('Are you sure you want to delete this data?')) {
                var id = $(this).data('id');
                $.ajax({
                    type: 'POST', // Use POST or DELETE method as per your route definition
                    url: "{{ route('deleteitems', ['id' => ':id']) }}".replace(':id', id),
                    //'/data/' + id,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        '_method': 'post',
                    },
                    success: function (data) {
                        // Handle success, e.g., remove the row from the table
                    },
                    error: function (data) {
                        // Handle error
                    }
                });
            }
        });
    });
</script>



</body>
</html>
