<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service = $_POST['service'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $details = "";
    if ($service == "Marriage Registration") {
        $spouseName = $_POST['spouseName'];
        $dateOfMarriage = $_POST['dateOfMarriage'];
        $details = "Spouse: $spouseName\\nDate of Marriage: $dateOfMarriage";
    } elseif ($service == "Death Registration") {
        $deceasedName = $_POST['deceasedName'];
        $dateOfDeath = $_POST['dateOfDeath'];
        $details = "Deceased: $deceasedName\\nDate of Death: $dateOfDeath";
    } elseif ($service == "Migration Registration") {
        $fromAddress = $_POST['fromAddress'];
        $toAddress = $_POST['toAddress'];
        $details = "From: $fromAddress\\nTo: $toAddress";
    } elseif ($service == "Senior Citizen ID") {
        $dob = $_POST['dob'];
        $details = "Date of Birth: $dob";
    }

    // Generate random appointment date
    $date = date('Y-m-d', strtotime('+3 days'));
    $subject = "Application Confirmation - Ward No.2 Lalitpur";
    $message = "Dear $fullName,\\n\\nThank you for applying for $service.\\nDetails:\\n$details\\n\\nPlease visit Ward No.2 office on $date between 10 AM - 2 PM.\\n\\nRegards,\\nWard No.2 Lalitpur Municipality";

    $headers = "From: ward2@lalitpurmun.gov.np";

    if (mail($email, $subject, $message, $headers)) {
        echo \"<h2>Application Submitted Successfully!</h2><p>A confirmation email has been sent to $email.</p>\";
    } else {
        echo \"<h2>Something went wrong.</h2><p>Could not send email. Please check your server mail configuration.</p>\";
    }
}
?>
