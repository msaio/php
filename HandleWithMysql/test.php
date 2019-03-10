<?php
    include 'index.php';
?>

<table style='border: solid 1px black;'>
<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>
<?php
    include "data_access_helper.php";
    include "TableRows_extends_RecursiveIteratorIterator.php";
    
    $data = new DataAccessHelper();
    $data->connect_pdo();

    $sql = "SELECT id, firstname, lastname FROM guest;";
    $conn = $data->get_conn_pdo();
    $sth = $conn->prepare($sql);
    $sth->execute();
    $result = $sth->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($sth->fetchAll())) as $k=>$v) { 
        echo $v;
    }
    $data->close_pdo();
?>
</table>