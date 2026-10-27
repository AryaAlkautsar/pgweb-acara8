<?php
// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgw8";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

// Tautan menuju form input (Latihan 8b)
echo "<a href='input/index.html'>Input Data Baru</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1px' cellpadding='5' cellspacing='0'><tr>
    <th>Kecamatan</th>
    <th>Longitude</th>
    <th>Latitude</th>
    <th>Luas</th>
    <th>Jumlah Penduduk</th></tr>";
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["kecamatan"]."</td>
        <td>".$row["longitude"]."</td>
        <td>".$row["latitude"]."</td>
        <td>".$row["luas"]."</td>
        <td align='right'>".$row["jumlah_penduduk"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>