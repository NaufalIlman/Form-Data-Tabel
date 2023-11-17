<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST["id"];
    $F_name = $_POST["F_name"];
    $L_name = $_POST["L_name"];
    $email = $_POST["email"];
    $email2 = $_POST["email2"];
    $profesi = $_POST["profesi"];

    // Validasi email
    if ($email != $email2) {
        echo "Email dan Confirm Email tidak sesuai.";
        exit;
    }

    // Format data untuk ditambahkan ke file CSV
    $data = array($id, $F_name, $L_name, $email, $email2, $profesi);

    // Buka file CSV untuk menambahkan data
    $csvFile = 'datapribadi.csv';
    $handle = fopen($csvFile, 'a');
    fputcsv($handle, $data);
    fclose($handle);

    // Redirect kembali ke halaman form
    header('Location: index.php');
    exit;
}
?>
