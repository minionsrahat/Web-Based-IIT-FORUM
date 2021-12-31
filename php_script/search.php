<?php
include('mql_connection.php');
include('header.php');
$search=$_GET['query'];
$login=False;
if(isset($_SESSION['loggedin']))
{
    $login=True;
}
?>
<section>
<div class="container">
<div class="row mx-auto">
<div class="col-md-8">
<?php
$sql="SELECT * FROM `problems` where match (problem_title,problem_title) against ('$search')";
$result=$con->query($sql);
$rowcount=mysqli_num_rows($result);
?>
<h1 class="p-5 display-4">Search Result:</h1>
<?php
   if($rowcount>0)
   {
?>
<p class="lead"><?php echo "$rowcount results found"?></p>
<hr class="bg-success my-2">
<?php
while($row2= mysqli_fetch_assoc($result))
{
?>
    <div class="row mx-auto my-3">
        <div class="col-lg-8">
            <div class="media"> 
                <img src="user.png" width="34px" class="mr-3" alt="...">
                <div class="media-body bg-info rounded"">
                    <p class="ml-3 mt-2">User</p>
                    <a class="text-white p-4"href="problems.php?prob_id=<?php echo $row2['problem_id']; ?>"><?php echo $row2['problem_title']; ?></a>
                </div>
            </div>
        </div>

    </div>
<?php
}
}
else{
?>
<h1 class="lead">No Results Found</h1>
<hr class="bg-success my-2">
<?php
}
?>
</div>

</div>

</div>
</section>



<?php
 include('footer.php');
?>