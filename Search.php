<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Batch</th>
                    <th>Department</th>
                    <th>Blood Group</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Last Donated</th>
                </tr>
            </thead>
            <tbody>
            <?php

            include 'check_auth.php';
            include 'db_conn.php';
            
            if(isset($_GET['location']) && isset($_GET['bloodGroup']) && isset($_GET['gender']))
            {
                if(!empty($_GET['location']) && !empty($_GET['bloodGroup']) && !empty($_GET['gender']))
                {
                    $location = $_GET['location'];
                    $Blood_Group = $_GET['bloodGroup'];
                    $Gender = $_GET['gender'];

                    $sql = "SELECT d.Student_ID, d.Name, d.Department, d.Contact_Num, d.Address, d.Email, d.Gender, d.Blood_Group, d.Last_Donation_Date,
                    CONCAT(SUBSTRING_INDEX(SUBSTRING_INDEX(d.Student_ID, '-', -3), '-', 1),'th') AS Batch
                    FROM donor_list AS d
                    WHERE d.Address LIKE '%$location%' AND d.Blood_Group = '$Blood_Group'";
                    
            if ($Gender !== 'Both') {
                $sql .= " AND d.Gender = '$Gender'";
            } else {
                $sql .= " AND (d.Gender = 'Male' OR d.Gender = 'Female')";
            }
            
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                foreach ($result as $row) {
                    $last_donated = $row['Last_Donation_Date'];
                    $last_donated_days = '-';
                    if (!empty($last_donated)) {
                        $current_date = date('Y-m-d');
                        $diff = date_diff(date_create($last_donated), date_create($current_date));
                        $last_donated_days = $diff->format('%a'). ' days ago';
                    }
                    ?>
                    <tr>  
                        <td><?= $row['Name']; ?></td>
                        <td><?= $row['Contact_Num']; ?></td>
                        <td><?= $row['Address']; ?></td>
                        <td><?= $row['Batch']; ?></td>
                        <td><?= $row['Department']; ?></td>
                        <td><?= $row['Blood_Group']; ?></td>
                        <td><?= $row['Email']; ?></td>
                        <td><?= $row['Gender']; ?></td>
                        <td><?= $last_donated_days; ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo '<p><strong>No donor found with this criteria</strong></p>';
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
