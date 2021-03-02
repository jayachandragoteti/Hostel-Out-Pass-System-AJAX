<?PHP
// Create connection
$connect = mysqli_connect('localhost','root','','hostel-out-pass-system');
//$connect = mysqli_connect('localhost','root','','sac');
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
    
}
