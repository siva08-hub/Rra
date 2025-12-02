<?php
error_reporting(0);
include('includes/config.php');

// Fetch donor list
$sql = "SELECT ID, FullName, MobileNumber, BloodGroup, ProofFile FROM tblblooddonars ORDER BY ID DESC";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin - View Proof Files</title>
</head>
<body>

<h2>Admin Panel - Donor Proof Files</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Mobile</th>
    <th>Blood Group</th>
    <th>Proof File</th>
    <th>Action</th>
</tr>

<?php
if($query->rowCount() > 0)
{
    foreach($results as $row)
    {
        echo "<tr>";
        echo "<td>".$row->ID."</td>";
        echo "<td>".$row->FullName."</td>";
        echo "<td>".$row->MobileNumber."</td>";
        echo "<td>".$row->BloodGroup."</td>";
        echo "<td>".$row->ProofFile."</td>";

        $filePath = "uploads/proofs/" . $row->ProofFile;

        echo "<td>
                <a href='$filePath' target='_blank'>View</a> |
                <a href='$filePath' download>Download</a>
              </td>";
        echo "</tr>";
    }
}
else {
    echo "<tr><td colspan='6'>No records found</td></tr>";
}
?>

</table>

</body>
</html>
