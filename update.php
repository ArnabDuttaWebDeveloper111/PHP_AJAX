<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update In Php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>

    <div id="records_contant">

    </div>
    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'todop');

    $id = $_GET['edit'];

    $query = "SELECT * FROM `top` WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
    }







    ?>


    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="firstname" name="firstname" id="firstname" class="form-control" value=<?php echo $firstname; ?>>

            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="lastname" name="lastname" id="lastname" class="form-control" value=<?php echo $lastname; ?>>

            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value=<?php echo $email; ?>>

            </div>
            <input type="hidden" value="<?php echo $id; ?>" id='id'>


            <div class="form-group">

                <input type="submit" name="submit" id="update" value="update" class="btn btn-success btn-block">

            </div>
        </form>
    </div>


    <script>
        $(document).ready(function() {
            $('#update').click(function(e) {
                e.preventDefault();
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                var email = $("#email").val();
                var id = $("#id").val();
                $.ajax({
                    url: 'edit.php',
                    method: "POST",
                    data: {
                        firstname: firstname,
                        lastname: lastname,
                        email: email,
                        id: id
                    },
                    dataType: "html",
                    success: function(data) {
                        $("#records_contant").html(data);
                    }

                })
            })
        })
    </script>















</body>

</html>