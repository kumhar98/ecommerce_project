<?php
function isStatusApproved($status, $rangStatus){
    switch ($rangStatus) {
        case "pending":
            if ( "pending" == $status ||  "Acceptted" == $status || "out of delivery" == $status || "delivered" == $status ) {
                return true;
            }
            return false;
        case "Acceptted":
            if ("Acceptted" == $status || "out of delivery" == $status || "delivered" == $status) {
                return true;
            }
            return false;
        case "out of delivery":
            if ("out of delivery" == $status || "delivered" == $status) {
                return true;
            }
            return false;
        case "delivered":
            if ("delivered" == $status) {
                return true;
            }
            return false;
        
        default:
            return false;
    }
}