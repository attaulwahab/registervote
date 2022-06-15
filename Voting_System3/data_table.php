<?php
include_once 'connect.php';
$query = ("select * from Votes");
$result = mysqli_query($con, $query);
?>

<html>
<head>
    <title>Data Table</title>
    <!-- <link rel="stylesheet" type="text/css" href="table_style.css"> -->
</head>
<body bgcolor="yellow">
<center>
<table cellpadding="5" cellspacing="4" border="2" width="90%">
<tr>
    <Td colspan="5" bgcolor="#kkkk3" aling="Center"> <Font size=+3 color="#cccccc">
        <center><tt ><b>This Is A Data Table</b></font</td></center>
    <tr style="background-color= skyblue">
        <th bgcolor="pink">Name</th>
        <th bgcolor="pink">Address</th>
        <th bgcolor="pink">Id_Card</th>
        <th bgcolor="pink">Image</th>
<?php
// $counter = 0;
while ($row = mysqli_fetch_array($result)) {                    //returns array of string

    $name = $row['name'];
    $address = $row['address'];
    $id_card = $row['id_card'];
    $image = $row['image'];

    
?>
    </tr>
    <tr bgcolor="yellow">
        <b>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['id_card']; ?></td>
        <td align="center"><img align="center" width="100" src="images/<?php echo $image;?>" alt="Image Not found"></td>
        
        </b>
    </tr>
    <?php
    // $counter++;
    }
    ?>
    
</table>
</center>
</body>
</html>

<?php
// include_once("connect.php");
// $query = "SELECT * FROM Votes";
// $result = mysqli_query($con, $query);

// while($row = mysqli_fetch_array($result)) {
//     $name = $row['name'];
    $address = $row['address'];
//     $id_card = $row['id_card'];
//     $image_name = $row['image'];
// ?>
 <!-- <h2><?php echo $name; ?></h2> -->
<!-- <?php   ?> -->