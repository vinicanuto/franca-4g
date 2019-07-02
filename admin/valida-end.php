<?php require_once "../backend/db.inc.php" ?>

<?php
session_start();

$CEP = $_POST['cep'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

$usuario = $_SESSION['email'];
$sql = "INSERT INTO relatorio (data, usuario, descricao) VALUES (now(), '$usuario', 'LAT: $lat - LONG: $lng - CEP: $CEP')";

$conn->query($sql);

$sql = "SELECT *,(6371 *  
        acos(
         cos(radians(" . $lat . ")) * 
         cos(radians(latitude)) * 
         cos(radians(" . $lng . ") - radians(longitude)) + 
         sin(radians(" . $lat . ")) * 
         sin(radians(latitude))
      )) AS distantacia
        FROM torre HAVING distantacia <= 1";
$result = $conn->query($sql);
$num_rows = $result->num_rows;

if ($num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <h3 class="box-title"><b>Que legal, o endereço possui cobertura, está coberto pela torre <?= $row['site_id']; ?>!</b></h3>
        <!--<tr>
            <td>< $end'cep'; ?></td>
            <td>< $end'logradouro'; ?></td>
            <td><= $end'cidade'; ?></td>
        </tr> -->
        <?php
    }
}else{
    ?>
        <h3 class="box-title"><b>Este endereço ainda não possui cobertura...</b></h3>
        <!--<tr>
            <td>< $end'cep'; ?></td>
            <td>< $end'logradouro'; ?></td>
            <td><= $end'cidade'; ?></td>
        </tr> -->
        <?php
}
?>