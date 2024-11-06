<?php 

if ($_FILES['file']['name'] != '') {

    $filename = $_FILES['file']['name']; // name => refers to original name of a file

    $extension = pathinfo($filename, PATHINFO_EXTENSION); //pathinfo function bring the details about the uploaded file

    $valid_extensions = array("jpg","jpeg","png","gif");

    if (in_array($extension, $valid_extensions)) {
       
        $new_name = rand() . "." . $extension;
        $path = "images/" .$new_name;

        if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){ // file with the temporary name
        
            echo '<img src="'.$path.'" alt="my-image" /><br><br>
            <button data-path="'.$path.'" id="delete-btn" class="btn btn-danger mb-2 ms-2">Delete</button>';  
        
        } else {
            echo '<script>alert("Invalid File Format")';
        }
    } else {
        echo '<script>alert("Please upload the file")';
    }
}

?>