<?php
header('Content-Type: application/json');

// Koneksi database
$conn = new mysqli("localhost", "root", "", "pariwisataku");

// Cek koneksi
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Koneksi gagal"]);
    exit;
}

$result = $conn->query("SELECT * FROM destinasi");
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = [
        'nama' => trim($row['nama']),
        'deskripsi' => trim($row['deskripsi']),
        'gambar_url' => $row['gambar_url']
    ];
}

echo json_encode($data);
?>
