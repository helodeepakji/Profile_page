<?php

session_start();

if (isset($_COOKIE['username'])){
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['loggedin'] = true;
}

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login");
    exit;
    $status = "LogIn";
}else{
    $status = "Profile";
    $user = $_SESSION['username'];
    include 'Sqliconn.php';
    $result = mysqli_query($conn,"SELECT * FROM `users` WHERE `username` = '$user';");
    $row = mysqli_fetch_array($result);
  }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile - NXTTOUR India</title>
    <meta name="description"
        content="Profile of User Nxttour India Best Holiday package and trips provide in lowest price by nxttour.in." />
    <meta name="keywords"
        content="nxttour,nxttour.in, www.nxttour.in,nxttour kedarnath,nxttour badrinath,nxttour tungnath,nxttour dudhsagar,best tour nxttour,best tour and holiday packages,nxttour tour and packages, cheapest holiday packages,Nxtour Most Famous Trips,nxt tour,NXT TOUR,Nxt trips,NXT TRIPS,NXTTOUR,NXTTOUR.in,nxttour trips,nxttour holidays packages,nxttour india,nxttour Best Holiday package,nxttour destinations,nxttour Best Deals and holiday packages,nxttour packages,nxttour Himachal Pradesh, nxttour uttrakhand,nxttour Uttar Pradesh,NXTTOUR BEST DESTINATION,nxttour best tour,nxt tour best tour,best trips nxttour,nxttour best tour in india" />

    <meta property="og:site_name" content="NXTTOUR" />
    <meta property="og:title"
        content="NXTTOUR || Tour & Holiday Packages - Best Holiday package and trips provide in lowest price in Nxttour.in" />
    <meta property="og:description"
        content="Best Holiday package and trips provide in lowest price and explore all exciting tourist destinations in India by nxttour.in." />
    <meta property="og:type" content="website" />
    <meta property="og:error" content="https://nxttour.in" />
    <meta property="og:url" content="https://nxttour.in" />
    <meta name="robots" content="index" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://nxttour.in" />
    <link rel="shortcut icon" href="https://nxttour.in/tour/favicon.ico">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous"/>
    <style>
    body {
        font-family: 'Hind Guntur', sans-serif;
        color: #054231;
        background: #49afa8;
        background-image: url('https://github.com/OlgaKoplik/CodePen/blob/master/leaf.png?raw=true');
        background-repeat: no-repeat, no-repeat;
        background-position: 200% -40%;
        background-size: 80%;
    }

    .card {
        width: 450px;
        padding: 15px;
        margin: 30px auto;
        border-radius: 25px;
        display: flex;
        overflow: hidden;
        justify-content: center;
        box-shadow: 15px 10px 25px 0px #3fa1a9;
        background: #fff;
        background-image: url('https://github.com/OlgaKoplik/CodePen/blob/master/leaf2.png?raw=true'), url('https://github.com/OlgaKoplik/CodePen/blob/master/leaf.png?raw=true');
        background-repeat: no-repeat, no-repeat;
        background-position: 120% -5%, 200% -40%;
        background-size: 40%, 80%;
        animation: open 2s;
    }

    @keyframes open {
        0% {
            background-position: 166% -25%, 220% -69%;
        }

        100% {
            background-position: 120% -5%, 200% -40%;
        }
    }

    .span12 {
        width: 100%;
    }

    .span12 h1 {
        margin-top: 70px;
        text-align: center;
    }

    .saves,
    .save {
        font-weight: 600;
        left: -20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        width: 20px;
        box-shadow: 20px 0px 40px 0px #63d3a6;
    }

    button.saves,
    button.save {
        color: #054231;
        letter-spacing: 1px;
        margin: 20px;
        font-size: 18px;
        padding: 10px;
        text-align: center;
        transition: 0.4s;
        cursor: pointer;
        border-radius: 25px;
        border: none;
        background: #64d488;
    }

    button.saves:hover,
    button.save:hover {
        color: #fff;
        width: 150px;
        margin-right: 10px;
        box-shadow: 0px 0px 20px 0px #63d3a6;
    }

    button.saves:focus,
    button.save:focus {
        outline: none;
    }

    td {
        padding: 15px;
    }

    table.udetails td {
        padding: 15px;
    }

    .trsbtn {
        margin: 17px 0;
    }

    a.btn {
        font-size: 17px;
    }

    a.btn:hover {
        color: red;
    }

    input {
        border-radius: 15px;
        border: 1px solid #b7b7b7;
        padding: 5px;
        font-size: 15px;
        transition: 0.2s;
        width: 100%;
    }

    input:focus {
        outline: none;
        border: 1px solid #64d488;
    }

    .sect {
        display: inline;
        width: 100%;
        cursor: pointer;
    }

    .sect a button {
        margin-right: 90px;
    }


    @media screen and (max-width: 500px) {
        td {
            padding: 10px 0px;
        }

        .card {
            width: 380px;
        }

        table.udetails td {
            padding: 10px;
        }
    }

    @media screen and (max-width: 400px) {
        .card {
            width: 97%;
        }
    }
    </style>
</head>

<body>
    <?php include "navmod.php"; ?>
    <div class="card">

        <div class="span12 well pass1">
            <h1 style="text-align:center">User Profile</h1>
            <div class="trsbtn" style="float: right;">
                <a id="editp1" style="margin-right:5%;cursor: pointer;display: contents;" class="btn btn-info"> Edit
                    Profile <i class="far fa-edit" style="margin-left:5px"> </i> </a>
            </div>
            <table style="width:100%;">
                <tr>
                    <td>
                        <div class="span8" style="width:100%;">
                            <table class="udetails" style="margin:auto">
                                <tr>
                                    <td>Name </td>
                                    <td style="text-transform:capitalize;">
                                        <?php echo $row['name']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Username </td>
                                    <td>
                                        <?php echo $row['username']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>E-Mail </td>
                                    <td>
                                        <?php echo $row['email'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile No </td>
                                    <td>
                                        <?php echo $row['phone'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Age </td>
                                    <td>
                                        <?php echo $row['dob']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Gender </td>
                                    <td>
                                        <?php echo $row['gender'];?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
            <br>
            <a id="cpass" class="cntbtn" style="cursor: pointer;">
                <button class="save">Change Password</button>
            </a>
        </div>

        <div class="span12 pass2 " style="display:none;">
            <h1 style="text-align:center">Change Password</h1>
            <div class="trsbtn" style="float: right;">
                <a id="editp5" style="float:right;margin-right:5%;cursor: pointer;display: contents;"
                    class="btn btn-info">
                    Profile <i class="far fa-user-circle" style="margin-left:5px"></i></a>
            </div>
            <table style="width:100%;">
                <tr>
                    <td>
                        <form action="editprofile.php" method="post" onsubmit="return fgth()">
                            <div class="span6" style="width:100%;">
                                <table class="table" style="margin:auto">
                                    <input name="error" style="display:none" type="number" value="101">
                                    <tr>
                                        <td>New Password</td>
                                        <td><input id="p1" name="password" type="password" class="input-large"
                                                onkeyup="return check123()">
                                            <span id="ps"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Confirm Password</td>
                                        <td><input id="p2" name="cpassword" class="input-large" type="password"
                                                onkeyup="checkk()">
                                            <span id="match"
                                                style="color:#ff0000;visibility:hidden;">&nbsp;&nbsp;Password
                                                Don't
                                                Match</span>
                                        </td>
                                    </tr>
                                </table>
                                <a class="cntbtn" style="cursor: pointer;">
                                    <button type="submit" id="sub"
                                        onclick="return confirm('You want to Change your password ?');"
                                        disabled="disabled" class="save"> Change Password</button>
                                </a>
                        </form>
                    </td>
                </tr>
            </table>
            <br>
        </div>

        <div class="span12 pass3 " style="display:none;">
            <h1 style="text-align:center">Edit Profile</h1>
            <div class="trsbtn" style="float: right;">
                <a id="editp4" style="float:right;margin-right:5%;cursor: pointer;display: contents;"
                    class="btn btn-info">
                    Profile <i class="far fa-user-circle" style="margin-left:5px"></i></a>
            </div>
            <div class="span8 well">
                <table style="width:100%">
                    <td>
                        <form action="editprofile.php" method="post">
                            <div class="span6" style="width:100%;">
                                <table class="table" style="margin:auto;width:100%">
                                    <input name="error" style="display:none" type="number" value="121">
                                    <tr>
                                        <td>Name</td>
                                        <td><input name="name" type="text" value="<?php echo $row['name'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Username </td>
                                        <td><input type="text" value="<?php echo $row['username'];?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>E-Mail </td>
                                        <td><input name="email" type="mail" value="<?php echo $row['email'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile No. </td>
                                        <td><input name="phone" type="number" value="<?php echo $row['phone'];?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Age </td>
                                        <td><input name="dob" type="text" value="<?php echo $row['dob'];?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Gender </td>
                                        <td><input name="gender" type="text" value="<?php echo $row['gender'];?>">
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <a class="cntbtn" style="cursor: pointer;">
                                    <button type="submit" onclick="return confirm('You want to Edit your profile?');"
                                        class="save">Save</button>
                                </a>
                            </div>
                        </form>
                    </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card" style="display:grid;">
        <div class="sect">
            <a href="history" class="cntbtn" style="cursor: pointer;">
                <button class="save">History</button>
            </a>
            <a href="order" class="cntbtn" style="cursor: pointer;">
                <button class="saves">Order</button>
            </a>
        </div>
        <?php
           if (($user == 'helodeepakji') || ($user == 'teenaa')) {
               echo '<div class="sect">
               <a href="admin/index" class="cntbtn" style="cursor: pointer;">
               <button class="saves">Admin</button>
           </a>
           <a href="phpmyadmin" class="cntbtn" style="cursor: pointer;">
               <button class="saves">Data_Base</button>
           </a></div>';
           }

        ?>
    </div>
    <?php include "footer.php"; ?>

    <?php mysqli_close($conn); ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#cpass").click(function() {
        $(".pass1").fadeOut(1000, "linear", function() {
            $(".pass2").fadeIn(1000);
        });

    });
});

$(document).ready(function() {
    $("#editp1").click(function() {
        $(".pass1").fadeOut(1000, "linear", function() {
            $(".pass3").fadeIn(1000);
        });

    });
});

// fornt page access

$(document).ready(function() {
    $("#editp4").click(function() {
        $(".pass3").fadeOut(1000, "linear", function() {
            $(".pass1").fadeIn(1000);
        });
    });
});

$(document).ready(function() {
    $("#editp2").click(function() {
        $(".pass3").fadeOut(1000, "linear", function() {
            $(".pass1").fadeIn(1000);
        });
    });
});

$(document).ready(function() {
    $("#editp5").click(function() {
        $(".pass2").fadeOut(1000, "linear", function() {
            $(".pass1").fadeIn(1000);
        });

    });
});


function checkk() {

    var p1 = document.getElementById("p1").value;
    var p2 = document.getElementById("p2").value;
    //alert(" p1 : "+p1+"  p2 : "+p2);

    if (p1 == p2) {
        document.getElementById("match").style.visibility = "hidden";
        document.getElementById("sub").disabled = false;
    } else {
        document.getElementById("match").style.visibility = "";
        document.getElementById("sub").disabled = true;
    }
}

function check123() {
    var c = document.getElementById("p1").value;
    //alert(c.length);
    if (c.length < 8) {
        document.getElementById("ps").innerHTML =
            "<br/><font color=red>password must be atleast 8 - 32 char long</font>";
        return false;
    } else {
        document.getElementById("ps").innerHTML = "";
        return true;
    }
}
</script>
<?php

if(isset($_SESSION['error']))
{
if($_SESSION['error']==6)
{echo "<script>document.getElementById(\"chang\").style.display=\"\";</script>";
 }
//unset($_SESSION['error']);
}
?>

</html>