<?php

    session_start();

    require_once 'config.php';


    // Display User data //
    function display_data(){
        global $conn;
        $query = "select * from user_form";
        $result = mysqli_query($conn,$query);
        return $result;
    }
    // Display Stocks //
    function display_stocks(){
        global $conn;
        $query = "select * from materials";
        $result = mysqli_query($conn,$query);
        return $result;
    }
    // Display material price //
    function display_material_price(){
        global $conn;
        $query = "select * from item_materials";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    // -- Display Pending Orders -- //
    function display_order(){
        global $conn;
        $user_id = $_SESSION['ID'];
        $query = "select * from order_form where customer_id = '$user_id' && status = 'Yet to be approved'";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    // -- Display Approved Orders -- //
    function display_approved_order(){
        global $conn;
        $user_id = $_SESSION['ID'];
        $query = "select * from order_form where status = 'Approved' && customer_id = '$user_id'";
        $result = mysqli_query($conn,$query);
        return $result;
    }

     // -- Display cancelled Orders customer panel-- //
     function display_cancelled_order(){
        global $conn;
        $user_id = $_SESSION['ID'];
        $query = "select * from order_form where customer_id = '$user_id' and status = 'Cancelled by customer' ";
        $result = mysqli_query($conn,$query);
        return $result;
    }
      // -- Display cancelled by admin -- customer panel-- //
     function display_cancelled_by_admin(){
        global $conn;
        $user_id = $_SESSION['ID'];
        $query = "select * from order_form where customer_id = '$user_id' and status = 'Cancelled by admin' ";
        $result = mysqli_query($conn,$query);
        return $result;
    }

     // -- Display  Approved Orders---admin panel -- //
     function display_all_approved_order(){
        global $conn;
        $query = "select * from order_form where status = 'Approved' ";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    // -- Display cancelled by customer orders -- admin panel --//
    function display_cancelled_by_customer(){
        global $conn;
        $query = "select * from order_form where status = 'Cancelled by customer'  ";
        $result = mysqli_query($conn,$query);
        return $result;
    }

      // -- Display cancelled by admin -- admin panel --//
    function display_cancelled_admin(){
        global $conn;
        $query = "select * from order_form where status = 'Cancelled by admin'  ";
        $result = mysqli_query($conn,$query);
        return $result;
    }




?>