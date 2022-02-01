<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax crud Operation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">



</head>

<body>
    <div class="container">
        <h1 class="text-primary text-uppercase text-center">AJAX CRUD OPERATION</h1>

        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                Open modal
            </button>
        </div>

        <h2 class="text-danger">All Records</h2>
        <div id="records_contant">

        </div>

        <!-- Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">AJAX CRUD OPERATION</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Firstname:</label>
                            <input type="text" name="" id="firstname" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Lastname:</label>
                            <input type="text" name="" id="lastname" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" name="" id="email" class="form-control">

                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecord()">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>



    </div>







    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            readRecord();
        })

        function readRecord() {
            var readrecord = "readrecord";

            $.ajax({
                url: "insert.php",
                type: 'post',
                data: {
                    readrecord: readrecord
                },
                success: function(data, status) {
                    $('#records_contant').html(data);
                }
            });


        }

        function DeleteUser(deleteid) {
            var conf = confirm("Are you want to delete");
            if (conf == true) {
                $.ajax({
                    url: "insert.php",
                    type: 'post',
                    data: {
                        deleteid: deleteid
                    },
                    success: function(data, status) {
                        readRecord();
                    }
                })

            }
        }








        function addRecord() {
            var firstname = $("#firstname").val();
            var lastname = $('#lastname').val();
            var email = $('#email').val();

            $.ajax({
                url: "insert.php",
                type: 'post',
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    email: email
                },
                success: function(data, status) {
                    readRecord();
                }


            });
        }
    </script>
</body>

</html>