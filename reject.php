<?php
include "connection.php";

if (isset($_GET['Id']) && isset($_GET['pid']) && isset($_GET['uid'])) {
    $tid = intval($_GET['Id']);
    $pid = intval($_GET['pid']);
    $uid = intval($_GET['uid']);
    $actiondate = date("Y-m-d");
    $status = "Rejected"; // Set the status to "rejected"

    // Update the status column in the tempbill table to "rejected"
    $updateQuery = "UPDATE tempbill SET status = ? WHERE tid = ? AND pid = ? AND uid = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);

    if ($updateStmt) {
        mysqli_stmt_bind_param($updateStmt, "siii", $status, $tid, $pid, $uid);
        $updateResult = mysqli_stmt_execute($updateStmt);

        if ($updateResult) {
            // Successfully updated the status in the tempbill table
            // Now, insert the data into the bill table
            $query = "INSERT INTO bill (tid, pid, uid, status, actiondate) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "iiiss", $tid, $pid, $uid, $status, $actiondate);

                $run = mysqli_stmt_execute($stmt);

                if ($run) {
                    // Successfully inserted into the bill table, you can perform any additional actions here
                    // Redirect to a success page or back to the previous page
                    header('Location: http://localhost/gymproject/rapp.php');
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
            // Handle the case where the update in the tempbill table failed
            error_log("Error updating status in tempbill table: " . mysqli_error($conn));
            echo "An error occurred while updating status in the tempbill table.";
        }
    } else {
        error_log("Error preparing update statement: " . mysqli_error($conn));
        echo "An error occurred while preparing the update statement for the tempbill table.";
    }
} else {
    echo "Invalid input data.";
}
?>
