<?php

echo "<form method='post' action='' enctype='multipart/form-data'>";
echo "<input type='file' name='fufu'>";
echo "<input type='file' name='f[]' multiple>";
echo "<input type='submit' name='submit'>";
echo "</form>";

if (isset($_POST['submit'])){
if (isset($_FILES['fufu']) && $_FILES['fufu']['error']==0){

    if(file_exists("/uploads/".$_FILES['fufu']['name']))
        die("file already uploaded");

    $n=pathinfo($_FILES['fufu']['name'], PATHINFO_ALL);
    echo "basename: ".$n['basename'].". filename: ".$n['filename'];
    echo "<br>size: ".$_FILES['fufu']['size'];
    echo "<br>type: ".$_FILES['fufu']['type'].". exxt: ".$n['extension'];
    echo "<br>tmp: ".$_FILES['fufu']['tmp_name']."<br>";

    if(move_uploaded_file($_FILES['fufu']['tmp_name'],"C:/MAMP/htdocs/uploads/a.jpg"))
        echo "<br> move done"; 
    else
        echo "<br> move failed";
}

if (isset($_FILES['f'])){
 $count=count($_FILES['f']['name']);
 print_r($_FILES['f']);
 echo "<br><br>";
 
 for($i=0; $i<$count; $i++){
    if($_FILES['f']['error'][$i]!=0) die("error");
    echo $_FILES['f']['name'][$i];
    echo "<br>";
}
}
}
?>