<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <table>
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
        <td>
            <button class="delete-button" data-id="{{ $data->id }}">Delete</button>
        </td>
    </tr>
    @endforeach
</table>

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

</body>
</html>
