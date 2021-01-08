<?php
$mysqli=mysqli_connect("localhost","team25","team25","team25");
if(mysqli_connect_errno()){
  printf("Connect failed: %s\n", mysqli_connect_errno());
  exit();
}
else{
  if (isset($_POST['submit'])) {
         if (is_uploaded_file($_FILES['지역별_일별_확진자수']['지역']['15일']['16일']['17일'])) {
             echo "<h1>" . "File " . $_FILES['지역별_일별_확진자수']['지역']['15일']['16일']['17일'] . " uploaded successfully." . "</h1>";
             echo "<h2>Displaying contents:</h2>";
             readfile($_FILES['지역별_일별_확진자수']['지역']['15일']['16일']['17일']);
         }

         //Import uploaded file to Database
         $handle = fopen($_FILES['지역별_일별_확진자수']['지역']['15일']['16일']['17일'], "r");

         while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
             $import = "INSERT into test(1,2,3,4) values('$data[0]','$data[1]','$data[2]','$data[3]')";

             mysql_query($import) or die(mysql_error());
         }

         fclose($handle);

         print "Import done";
  }
}

?>
