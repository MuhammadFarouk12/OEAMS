<?php
include('../utilities/utilities.php');
if (isset($_POST['term_id'])) {
    $term_id = (int)$_POST['term_id'];
    
    $sql = $conn->prepare("SELECT class_id FROM class WHERE term_id = ?");
    $sql->bind_param("i", $term_id);
    $sql->execute();
    $result = $sql->get_result();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['class_id']."'>Class ".$row['class_id']."</option>";
        }
    } else {
        echo "<option value=''>No classes for this term</option>";
    }
}
?>
