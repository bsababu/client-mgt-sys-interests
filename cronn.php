<?php 
include_once "insrt/conn.php";

$fetch='';
$status = "Down";

for ($i=0; $i<=50000; $i++){
    $queryy = "SELECT * FROM connector where initial_invest = '$i' && user_ID !='$status'";
    $resultt = mysqli_query($con,$queryy) or die(mysqli_error($con));
    $rowss = mysqli_fetch_array($resultt);
    $fetch=$rowss['initial_invest'];
    
    if ($fetch == 30 )
    {
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 0.75 , user_stock = user_stock + 0.75  where initial_invest=30";

        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con)); 
        
    }
    if ($fetch == 50 )
    {
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 1.5 , user_stock = user_stock + 1.5 where initial_invest=50";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con)); 
        
    }
    if ($fetch == 100 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive+3 , user_stock = user_stock + 3 where initial_invest=100";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        
        }
    if ($fetch == 150 ) 
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 4.5 , user_stock = user_stock + 4.5 where initial_invest=150";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        
        }
    if ($fetch == 200 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 6 , user_stock = user_stock + 6 where initial_invest=200";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        
        }
    if ($fetch == 250 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 7.5 , user_stock = user_stock + 7.5 where initial_invest=250";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 300 ) 
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 9 , user_stock = user_stock + 9 where initial_invest=300";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 350 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 10.5 , user_stock = user_stock + 10.5 where initial_invest=350";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 400 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 12 , user_stock = user_stock + 12 where initial_invest=400";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 450 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 13.5 , user_stock = user_stock + 13.5 where initial_invest=450";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 500 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 15 , user_stock = user_stock + 15 where initial_invest=500";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        
        }
    if ($fetch == 550 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 16.5 , user_stock = user_stock + 16.5 where initial_invest=550";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 600 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 18 , user_stock = user_stock + 18 where initial_invest=600";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }

    if ($fetch == 650 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 19.5 , user_stock = user_stock + 19.5 where initial_invest=650";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }    
    if ($fetch == 700 ) 
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 21 , user_stock = user_stock + 21 where initial_invest=700";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 750 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 22.5 , user_stock = user_stock + 22.5 where initial_invest=750";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 800 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 24 , user_stock = user_stock + 24 where initial_invest=800";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 850 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 25.5 , user_stock = user_stock + 25.5 where initial_invest=850";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 900 ) 
    {
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 27 , user_stock = user_stock +27 where initial_invest=900";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 950 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 28.5 , user_stock = user_stock + 28.5 where initial_invest=950";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 1000 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 30 , user_stock = user_stock + 30 where initial_invest=1000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 1200 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 36 , user_stock = user_stock + 36 where initial_invest=1200";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 1500 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 45 , user_stock = user_stock + 45 where initial_invest=1500";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 1700 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 51 , user_stock = user_stock + 51 where initial_invest=1700";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 2000 ) 
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 60 , user_stock = user_stock + 60 where initial_invest=2000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 2500 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 75 , user_stock = user_stock + 75 where initial_invest=2500";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 3000 )
    {
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 90 , user_stock = user_stock + 90 where initial_invest=3000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 3500 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 105 , user_stock = user_stock + 105 where initial_invest=3500";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    
    if ($fetch == 4000 )
    {
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 120 , user_stock = user_stock + 120 where initial_invest=4000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 4500 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 135 , user_stock = user_stock + 135 where initial_invest=4500";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 5000 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 150 , user_stock = user_stock + 150 where initial_invest=5000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 5500 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 165 , user_stock = user_stock + 165 where initial_invest=5500";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 6000 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 180 , user_stock = user_stock + 180 where initial_invest=6000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 6500 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 195 , user_stock = user_stock + 195 where initial_invest=6500";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 7000 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 210 , user_stock = user_stock + 210 where initial_invest=7000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 7500 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 225 , user_stock = user_stock + 225 where initial_invest=7500";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 8000 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 240 , user_stock = user_stock + 240 where initial_invest=8000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 8500 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 255 , user_stock = user_stock + 255 where initial_invest=8500";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 9000 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 270 , user_stock = user_stock + 270 where initial_invest=9000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 9500 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 295 , user_stock = user_stock + 295 where initial_invest=9500";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($fetch == 10000 ) 
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 300 , user_stock = user_stock + 300 where initial_invest=10000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
        
    if ($fetch == 15000 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 450 , user_stock = user_stock + 450 where initial_invest=15000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 20000 ) 
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 600 , user_stock = user_stock + 600 where initial_invest=20000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 30000 ) 
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 900 , user_stock = user_stock +900 where initial_invest=30000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
    if ($fetch == 40000 ) 
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 1200 , user_stock = user_stock + 1200 where initial_invest=40000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }

    if ($fetch == 50000 )
    { 
        $updatesponsor="UPDATE connector set user_incentive = user_incentive + 1500 , user_stock = user_stock + 1500 where initial_invest=50000";
        mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
        }
}

?>