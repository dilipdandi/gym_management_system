<?php
include "connection.php";
session_start();

// Validate and sanitize input data
if (isset($_GET['Id']) && isset($_SESSION['userid'])) {
    $planid = intval($_GET['Id']);
    $userid = intval($_SESSION['userid']);
    $dates = date("Y-m-d");

    // Retrieve plan details

    $query1 = "SELECT * FROM plan WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query1);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $planid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && $ret = mysqli_fetch_array($result)) {
            $month = $ret['month'];

            // Calculate the expiration date
            $expDate = new DateTime();
            $expDate->modify("+$month months");
            $exp = $expDate->format('Y-m-d');

            // Check the status from tempbill
            $checkStatusQuery = "SELECT status, exp FROM tempbill WHERE uid = ? ORDER BY tid DESC LIMIT 1";
            $checkStatusStmt = mysqli_prepare($conn, $checkStatusQuery);

            if ($checkStatusStmt) {
                mysqli_stmt_bind_param($checkStatusStmt, "i", $userid);
                mysqli_stmt_execute($checkStatusStmt);
                $statusResult = mysqli_stmt_get_result($checkStatusStmt);
                $statusRow = mysqli_fetch_array($statusResult);

                if ($statusRow) {
                    $lastStatus = $statusRow['status'];
                    $lastExpDate = $statusRow['exp'];

                    if (($lastStatus !== 'In Progress' && $lastStatus !== 'Approved') && $exp > $dates) {
                        // Only insert if the last status is not 'In Progress' or 'Approved' and exp date is valid
                        $insertQuery = "INSERT INTO `tempbill`(`pid`, `uid`, `dates`, `exp`, `status`) VALUES (?, ?, ?, ?, ?)";
                        $insertStmt = mysqli_prepare($conn, $insertQuery);

                        if ($insertStmt) {
                            $status = 'In Progress'; // Assuming this is the default status
                            mysqli_stmt_bind_param($insertStmt, "iisss", $planid, $userid, $dates, $exp, $status);
                            $run = mysqli_stmt_execute($insertStmt);

                            if ($run) {
                                $billId = mysqli_insert_id($conn); // Retrieve the last inserted ID (tid)
                                header("Location: http://localhost/gymproject/bill.php?tid=$billId");
                                exit();
                            } else {
                                error_log("Error inserting data into tempbill: " . mysqli_error($conn));
                                echo "An error occurred while inserting data.";
                            }
                        } else {
                            error_log("Error preparing insert statement: " . mysqli_error($conn));
                            echo "An error occurred while preparing the insert statement.";
                        }
                    } else {
                   
                       echo "Application is already in progress or membership is active.";

                    }
                } else {
                    // No previous records, so we can insert the data
                    $insertQuery = "INSERT INTO `tempbill`(`pid`, `uid`, `dates`, `exp`, `status`) VALUES (?, ?, ?, ?, ?)";
                    $insertStmt = mysqli_prepare($conn, $insertQuery);

                    if ($insertStmt) {
                        $status = 'In Progress'; // Assuming this is the default status
                        mysqli_stmt_bind_param($insertStmt, "iisss", $planid, $userid, $dates, $exp, $status);
                        $run = mysqli_stmt_execute($insertStmt);

                        if ($run) {
                            $billId = mysqli_insert_id($conn);
                            header("Location: http://localhost/gymproject/bill.php?tid=$billId");
                            exit();
                        } else {
                            error_log("Error inserting data into tempbill: " . mysqli_error($conn));
                            echo "An error occurred while inserting data.";
                        }
                    } else {
                        error_log("Error preparing insert statement: " . mysqli_error($conn));
                        echo "An error occurred while preparing the insert statement.";
                    }
                }
            } else {
                error_log("Error preparing status check statement: " . mysqli_error($conn));
                echo "An error occurred while preparing the status check statement.";
            }
        } else {
            header('Location: http://localhost/gymproject/viewplan.php');
        }
    } else {
        error_log("Error preparing SELECT statement: " . mysqli_error($conn));
        echo "An error occurred while preparing the SELECT statement.";
    }
} else {
   // echo "Invalid input data.";
   header('Location: http://localhost/gymproject/viewplan.php');
}
?>
