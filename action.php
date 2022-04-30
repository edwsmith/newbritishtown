<?php
$servername = "sql209.epizy.com";
$username = "epiz_31544851";
$password = "NLmMzea6T2v2";
$dbname = "epiz_31544851_names";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "chunk: " . $_GET["section"] . "<br>";
echo "search: " . $_GET["chunk"] . "<br>";

$sql = "SELECT DISTINCT Chunk FROM " . $_GET["section"] . " WHERE UPPER(Chunk) LIKE UPPER('" . $_GET["chunk"] . "')";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "Name: " . $row["Chunk"]. "<br>";
  }
} else {
  echo "0 results <br>";
  $sql = "INSERT INTO " . $_GET["section"] . "(Chunk) VALUES ('" . $_GET["chunk"] . "')";
  $result = mysqli_query($conn, $sql);
  echo $result . " chunk added";
}

$conn->close();
?>