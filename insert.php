<?php


$conn = mysqli_connect('localhost', 'root', '', 'todop');

// if ($conn) {
//     echo "Database Connected";
// }

extract($_POST);
if (isset($_POST['readrecord'])) {
    $data = '<table class=" table table-bordered table-striped">
               <tr>
                     <th> No.</th>  
                     <th>First  Name</th>  
                     <th>Last Name</th>  
                     <th>Email</th>  
                     <th> Edit </th>  
                     <th> Delete </th>  
    
               </tr>';

    $displayquery = "SELECT * FROM `top`";
    $result = mysqli_query($conn, $displayquery);

    if (mysqli_num_rows($result)) {
        $number = 1;
        while ($row = mysqli_fetch_array($result)) {
            $data .= '<tr>
                <td>' . $number . '</td>
                <td>' . $row['firstname'] . '</td>
                <td>' . $row['lastname'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>
                <a href="update.php?edit=' . $row['id'] . ';?>"class="btn btn-primary">Edit</button>
                </td>
                <td>
                <button onclick=DeleteUser(' . $row['id'] . ') class="btn btn-danger">Delete</button>
                </td>
                     </tr>';
            $number++;
        }
    }
    $data .= '</table>';
    echo $data;
}

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])) {
    $sql = "INSERT INTO `top` (`firstname`, `lastname`, `email`) VALUES ( '$firstname', '$lastname', '$email')";
    mysqli_query($conn, $sql);
}

// Delete  User Id

if (isset($_POST['deleteid'])) {
    $userid = $_POST['deleteid'];
    $deletequery = "DELETE FROM `top` WHERE `top`.`id` = '$userid'";
    mysqli_query($conn, $deletequery);
}
