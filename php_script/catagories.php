<?php
include('mql_connection.php');
include('header.php');
$id=$_GET['cat_id'];
$login=False;
if(isset($_SESSION['loggedin']))
{
    $login=True;
}
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $title=$_POST['prob_title'];
    $title=str_replace('<','&lt;',$title);
    $title=str_replace('>','&gt;',$title);
    $title=mysqli_real_escape_string($con,$title);
 
    $desc=$_POST['prob_desc'];
    
    $desc=str_replace('<','&lt;',$desc);
    $desc=str_replace('>','&gt;',$desc);
    $desc=mysqli_real_escape_string($con,$desc);
  
    $prob_user=$_SESSION['user_id'];
    $query="INSERT INTO problems (`problem_id`, `cat_id`, `problem_title`, `problem_desc`, `user_id`, `timestamp`) VALUES (NULL, '$id', '$title','$desc', '$prob_user', current_timestamp())";
    $result=$con->query($query);
    if(!$result)
    {
        echo "unsuccessfull";
    }

    
}
?>

<?php
$sql="SELECT cat_id, cat_name, cat_desc FROM categories where cat_id=$id";
$result=$con->query($sql);
$row = mysqli_fetch_assoc($result);
?>
<section>
    <div class="container">
        <div class="row mx-auto mt-4">
            <div class="jumbotron">
                <h1 class="display-4"><?php echo $row['cat_name']?></h1>
                <p class="lead"><?php echo $row['cat_desc']?></p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>
        <?php
         if($login)
         {
    ?>
        <div class="row mx-auto">
            <div class="col-md-8">
                <form name="myForm" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post"
                    onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="title">Problem </label>
                        <input type="text" class="form-control" name='prob_title' id="title"
                            placeholder="Write your problem heading">
                    </div>
                    <div class="form-group">
                        <label for="description">Problem Description</label>
                        <textarea class="form-control" name="prob_desc" id="description" rows="3"
                            placeholder="Elavorate your Problem"></textarea>
                    </div>
                    <button class="btn btn-primary px-5" id='submit'>Post</button>
                </form>
            </div>
        </div>
        <?php
        }
    ?>

        <h3 class="display-5">Browse Question:</h3>
        <?php
$sql="SELECT problem_id, problem_title, problem_desc, user_id, timestamp FROM problems WHERE cat_id=$id";
$result=$con->query($sql);
$rowcount=mysqli_num_rows($result);
if($rowcount==0)
{
?>
        <div class="jumbotron">
            <div class="row mx-auto">
                <h1>No Question Found</h1>
                <p>Be the First person to ask a question.......</p>
            </div>
        </div>
        <?php
}
else{
while($row2= mysqli_fetch_assoc($result))
{
?>
        <?php
        $prob_user_id=$row2['user_id'];
        $sql="SELECT username FROM user_info WHERE user_id='$prob_user_id'";
        $usernameresult=$con->query($sql);
        $prob_user= mysqli_fetch_assoc($usernameresult)
    ?>

        <div class="row mx-auto mt-3">
            <div class="col-lg-8">
                <div class="media">
                    <img src="user.png" width="34px" lass="mr-3" alt="...">
                    <div class="media-body">
                        <p class="ml-2 mt-0"><?php  echo var_dump($prob_user); ?></p>
                        <a
                            href="problems.php?prob_id=<?php echo $row2['problem_id']; ?>"><?php echo $row2['problem_title']; ?></a>
                    </div>
                </div>
            </div>

        </div>
        <?php
}
}
?>

</section>

</div>
<script>
function validateForm() {
    var x = document.forms["myForm"]["prob_title"].value;
    var y = document.forms["myForm"]["prob_desc"].value;
    if (x == "") {
        alert("Question header field must be filled out");
        return false;
    }
    if (y == "") {
        alert("Question description field must be filled out");
        return false;
    }
}

function srcvalidateForm() {
    var x = document.forms["srcForm"]["query"].value;

    if (x == "") {
        alert("Your Search must have atleast 3 character");
        return false;
    }
}
</script>
<?php
 include('footer.php');
 ?>