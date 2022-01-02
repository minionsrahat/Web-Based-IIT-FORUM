<?php
include('php_script/mql_connection.php');
?>
<?php
include('php_script/header.php');
?>


<section>
    <div class="container mx-auto">
        <div class="row">
            <?php
    $sql="SELECT cat_id, cat_name, cat_desc FROM categories";
    $result=$con->query($sql);
    while($row = mysqli_fetch_assoc($result))
    {
    echo '<div class="col-lg-4 p-4">
    <div class="card">
      <img src="https://source.unsplash.com/500x300/?'.$row['cat_name'].',coding" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">'.$row['cat_name'].'</h5>
        <p class="card-text">'.substr($row['cat_desc'],0,100).'......</p>
        <a href="php_script/catagories.php?cat_id='.$row['cat_id'].'" class="btn btn-primary">Explore</a>
      </div></div></div>';
    }
    ?>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      Launch
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    Body
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <hr class="bg-success my-2">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 mx-auto p-5">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://source.unsplash.com/500x500/?google,coding" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://source.unsplash.com/500x500/?iit,microsoft" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://source.unsplash.com/500x500/?groups,web developing"
                                    class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Your Full Name</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    <button class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>













<script>
document.getElementById("myBtn").addEventListener("click", function() {
    $('#myModal').modal('toggle');
});

function srcvalidateForm() {
    var x = document.forms["srcForm"]["query"].value;

    if (x == "") {
        alert("Your Search must have atleast 3 character");
        return false;
    }
}
</script>
<?php
 
 include('php_script/footer.php');
 ?>