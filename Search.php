<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Search Results</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
            color: aliceblue;
        }
        .card{
            background-color: maroon;
            border-radius: 10px;
            overflow-y: scroll;

        }
        body {
            height: 100vh;
            background-color: maroon;
            background-size:cover;
            background-position:center; 

            }


    </style>
</head>
<body>
    <br/><br/>
    <h3>&nbsp;Available Donors</h3>
    <div class="col-md-12">  
        <div class="card mt-4">
            <div class="card-body">        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Last Donated</th>
                </tr>
            </thead>
            <tbody>
            <?php
          
            include 'db_conn.php';
            
            if(isset($_GET['location']) && isset($_GET['bloodGroup']) && isset($_GET['gender']))
            {
                if(!empty($_GET['location']) && !empty($_GET['bloodGroup']) && !empty($_GET['gender']))
                {
                    $location = $_GET['location'];
                    $Blood_Group = $_GET['bloodGroup'];
                    $Gender = $_GET['gender'];

                    $sql= "SELECT Student_ID,Name,Contact_Num,Address,Email,Gender,Blood_Group,Last_Donation_Date FROM donor_list where Address like '%$location%' and Blood_Group='$Blood_Group'";
                    if ($Gender !== 'Both') 
                    {
                        $sql .= "AND Gender = '$Gender'";
                    }
                    else 
                    {
                        $sql .= "AND (Gender='Male' or Gender='Female')";
                    }

                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0)
                    {
                    foreach($result as $row){

                        $last_donated = $row['Last_Donation_Date'];
                        $last_donated_days = '-';
                        if (!empty($last_donated)) {
                            $current_date = date('Y-m-d');
                            $diff = date_diff(date_create($last_donated), date_create($current_date));
                            $last_donated_days = $diff->format('%a'). ' days ago';
                        }

                        ?>
                        <tr>  
                            <td><?= $row['Student_ID'];?></td>
                            <td><?= $row['Name'];?></td>
                            <td><?= $row['Contact_Num'];?></td>
                            <td><?= $row['Address'];?></td>
                            <td><?= $row['Email'];?></td>
                            <td><?= $row['Gender'];?></td>
                            <td><?= $row['Blood_Group'];?></td>
                            <td><?= $last_donated_days;?></td>

                           
                        </tr>
                             
                        <?php
                        }
                    }
                    else
                    {
                        echo '<P><strong>No donor found with this Criteria</strong></P>';
                    }

                }
                else
                {
                    echo '<P><strong>Please enter all the fields</strong></P>';
                }               
            }
            ?> 

            </tbody>
        </table>
    </div>
    </div>
    </div>
    <script src="jquery-3.2.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>
