<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>

    <!-- Tambahkan CSS DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 800px; /* Sesuaikan dengan kebutuhan Anda */
            margin-left: auto;
            margin-right: auto;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            cursor: pointer; /* Menambahkan kursor pointer untuk memberikan indikasi dapat diurutkan */
        }
    </style>
</head>
<body>
    <h2>Form Edit Data</h2>
    
    <form action="process.php" method="POST">
        <label for="id">Id:</label>
        <input type="text" name="id" id="id" required>

        <label for="F_name">First Name:</label>
        <input type="text" name="F_name" id="F_name" required>

        <label for="L_name">Last Name:</label>
        <input type="text" name="L_name" id="L_name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="email2">Confirm Email:</label>
        <input type="email" name="email2" id="email2" required>

        <label for="profesi">Profesi:</label>
        <input type="text" name="profesi" id="profesi" required>

        <input type="submit" value="Submit">
    </form>

    <hr>

    <h2>Data Tabel</h2>
    <!-- Tambahkan jQuery dan DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Aktifkan DataTable pada elemen tabel dengan ID "myTable"
            $('#myTable').DataTable();
        });
    </script>

    <table id="myTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Email2</th>
                <th>Profesi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Tampilkan data dari file CSV
            $csvFile = 'datapribadi.csv';
            if (($handle = fopen($csvFile, 'r')) !== false) {
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    echo '<tr>';
                    foreach ($data as $cell) {
                        echo '<td>' . htmlspecialchars($cell) . '</td>';
                    }
                    echo '</tr>';
                }
                fclose($handle);
            }
            ?>
        </tbody>
    </table>
</body>
</html>
