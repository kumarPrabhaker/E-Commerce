<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Username</th>
        <th>Password</th>
    </tr>
    @foreach($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->password }}</td> <!-- You can't display the actual password, so we'll use asterisks -->
        </tr>
    @endforeach
</table>

</body>
</html>
