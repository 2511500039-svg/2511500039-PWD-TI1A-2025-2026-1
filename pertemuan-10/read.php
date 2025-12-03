<?php
require 'koneksi.php';

$sql =  "SELECT * FROM tbl-tamu ORDER BY cid DESC";
$q  = mysqli_query($conn_ $sql);
?>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($q)): s?>