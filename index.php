<?php
include("Php and Database Connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
</head>
<body>
    <div class="heading">
       <h2>Todo List with php and mysql</h2>
    </div>
     <form method="post" action="index.php">
     <input type="text" class="task" name="task">
     <button type="submit" class="btn" name="btn">Add Task</button>
    </form>
    <br>
 <table style="border:1px solid black;">
     <thead>
      <tr style="border:1px solid black;">
      <th style="border:1px solid black;">Sr.</th>
      <th style="border:1px solid black;">Task</th>
      <th style="border:1px solid black;">Action</th>
      </tr>
      </thead>
      <tbody>

<!-- Displaying Code -->
<?php 
$sql1="SELECT * FROM tasks";
$result=$conn->query($sql1);
while($row=$result->fetch_assoc())
         {
            $A=$row['id'];
            $B=$row['task'];
?>
           
           <tr>
           <td style="border:1px solid black;"><?php echo $row['id'];?></td>
           <td style="border:1px solid black;"><?php echo $row['task'];?></td>
           <td style="border:1px solid black;"><a href="index.php?id=<?php echo $row['id'];?>">  [Delete]</a></td>
           </tr>

<?php } ?>

<!-- Deletion Code -->    
<!-- <?php
$sql = "DELETE FROM tasks WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Deleted Successfully";
}

?> -->

      </tbody>
      </table>

<!-- Insertion Code --> 
<?php
if(isset($_POST['btn']))

{
    $task = $_POST['task'];

    $sql="INSERT INTO tasks(task) VALUES('$task')";
    if($conn->query($sql)===TRUE)
    
            {
                echo "<script>window.location = 'index.php'</script>";
            }
    
            else
            {
                echo "error";
            }
    
}
?>

</body>
</html>
