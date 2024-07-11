<?php
// Include your connection.php file
include "connection.php";

if (isset($_GET['Id'])) {
    $tid = intval($_GET['Id']);

    // Update the status to "Approved" in the tempbill table
    $updateQuery = "UPDATE tempbill SET status = 'Approved' WHERE tid = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $tid);
        $updateResult = mysqli_stmt_execute($stmt);

        if ($updateResult) {
            $status = 'Approved';

            // Retrieve $pid and $uid from the tempbill table
            $selectQuery = "SELECT pid, uid FROM tempbill WHERE tid = ?";
            $selectStmt = mysqli_prepare($conn, $selectQuery);

            if ($selectStmt) {
                mysqli_stmt_bind_param($selectStmt, "i", $tid);
                mysqli_stmt_execute($selectStmt);
                $selectResult = mysqli_stmt_get_result($selectStmt);
                $selectRow = mysqli_fetch_assoc($selectResult);

                if ($selectRow) {
                    $pid = $selectRow['pid'];
                    $uid = $selectRow['uid'];
                    $actiondate = date("Y-m-d");

                    // Insert data into the bill table
                    $query = "INSERT INTO bill (tid, pid, uid, status, actiondate) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $query);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "iiiss", $tid, $pid, $uid, $status, $actiondate);

                        $run = mysqli_stmt_execute($stmt);

                        if ($run) {
                            // Successfully inserted into the bill table, you can perform any additional actions here
                            // Redirect to a success page or back to the previous page
                          //  header('Location: http://localhost/gymproject/request.php');
                          header('Location: http://localhost/gymproject/sapp.php');
                            exit();
                        } else {
                            // Handle the case where the insertion into the bill table failed
                            error_log("Error inserting data into bill: " . mysqli_error($conn));
                            echo "An error occurred while inserting data into the bill table.";
                        }
                    } else {
                        error_log("Error preparing insert statement: " . mysqli_error($conn));
                        echo "An error occurred while preparing the insert statement for the bill table.";
                    }
                } else {
                    echo "Data not found in tempbill table.";
                }
            } else {
                error_log("Error preparing select statement: " . mysqli_error($conn));
                echo "An error occurred while preparing the select statement.";
            }
        } else {
            // Handle the case where the update failed
            error_log("Error updating status in tempbill table: " . mysqli_error($conn));
            echo "An error occurred while updating the status.";
        }
    } else {
        error_log("Error preparing update statement: " . mysqli_error($conn));
        echo "An error occurred while preparing the update statement.";
    }
} else {
    echo "Invalid input data.";
}
?>
