<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $service = $_POST['service'];
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $extraDetails = "";
  if ($service == "Marriage Registration") {
    $extraDetails = "Spouse: " . $_POST['spouseName'] . "\\nDate of Marriage: " . $_POST['dateOfMarriage'];
  } elseif ($service == "Death Registration") {
    $extraDetails = "Deceased: " . $_POST['deceasedName'] . "\\nDate of Death: " . $_POST['dateOfDeath'];
  } elseif ($service == "Migration Registration") {
    $extraDetails = "From: " . $_POST['fromAddress'] . "\\nTo: " . $_POST['toAddress'];
  } elseif ($service == "Senior Citizen ID") {
    $extraDetails = "Date of Birth: " . $_POST['dob'];
  }

  $appointmentDate = date('Y-m-d', strtotime('+3 days'));
  $subject = "Application Confirmation - Ward No.2 Lalitpur Municipality";
  $message = "Dear $fullName,\\n\\nThank you for applying for $service.\\n$extraDetails\\n\\nPlease visit Ward No.2 office on $appointmentDate between 10 AM - 2 PM.\\n\\nRegards,\\nWard No.2 Lalitpur Municipality";
  $headers = "From: ward2@lalitpurmun.gov.np";

  if (mail($email, $subject, $message, $headers)) {
    echo \"<h2>Application Submitted Successfully!</h2><p>Confirmation email sent to $email.</p>\";
  } else {
    echo \"<h2>Submission Failed.</h2><p>Please check server mail settings.</p>\";
  }
}
?>
