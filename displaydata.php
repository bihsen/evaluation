<style>

img{
    height: 400px;
    width: 200px;
}

</style>
<?php
require_once 'database.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
$db_name = 'real_estate';
$db_found = mysqli_select_db($conn, DB_NAME);
$query = 'SELECT * FROM housing ORDER BY  title';
$results = mysqli_query($conn, $query);

echo '<table>';
while ($db_record = mysqli_fetch_assoc($results)) {

    echo '<hr>';

    echo "<img  src='" . $db_record["photo"] . "' />" . '<br>';
    echo  $db_record['title'] . '<br>';
    echo  $db_record['adress'] . '<br>';
    echo  $db_record['city'] . '<br>';
    echo  $db_record['area'] . '<br>';
    echo  $db_record['price'] . '<br>';
    echo  $db_record['description'] . '<br>';
    
}
echo '</table>';
