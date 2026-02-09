<?php
include('../utilities/utilities.php');

if (!isset($_SESSION['TEACHER_ID'])) {
    die("Access denied");
}
$teacher_id=$_SESSION['TEACHER_ID'];
$class_id=$_GET['class_id']??0;

$check=$conn->prepare("SELECT CLASS_ID FROM CLASS WHERE CLASS_ID=? AND TEACHER_ID=?");
$check->bind_param("ii",$class_id,$teacher_id);
$check->execute();

if($check->get_result()->num_rows==0) die("Access denied");
$stmt=$conn->prepare("SELECT STUDENT.STUDENT_ID,STUDENT.FIRST_NAME,STUDENT.LAST_NAME,
REGISTRATION.PARTICIPATION_MARK,REGISTRATION.ATTENDANCE_MARK,
REGISTRATION.MID_EXAM_MARK,REGISTRATION.FINAL_EXAM_MARK
FROM REGISTRATION
JOIN STUDENT ON REGISTRATION.STUDENT_ID=STUDENT.STUDENT_ID
WHERE REGISTRATION.CLASS_ID=?");
$stmt->bind_param("i",$class_id);
$stmt->execute();
$students=$stmt->get_result();
?>

<h2>Students</h2>

<table border="1">
<tr>
<th>Name</th>
<th>Participation</th>
<th>Attendance</th>
<th>Mid</th>
<th>Final</th>
</tr>

<?php while($row=$students->fetch_assoc()): ?>
<tr>

<td><?= $row['FIRST_NAME']." ".$row['LAST_NAME']; ?></td>

<td>
<input type="number" id="p_<?= $row['STUDENT_ID']; ?>"
value="<?= $row['PARTICIPATION_MARK']; ?>"
onchange="updateMarks(<?= $row['STUDENT_ID']; ?>)">
</td>

<td>
<input type="number" id="a_<?= $row['STUDENT_ID']; ?>"
value="<?= $row['ATTENDANCE_MARK']; ?>"
onchange="updateMarks(<?= $row['STUDENT_ID']; ?>)">
</td>

<td>
<input type="number" id="m_<?= $row['STUDENT_ID']; ?>"
value="<?= $row['MID_EXAM_MARK']; ?>"
onchange="updateMarks(<?= $row['STUDENT_ID']; ?>)">
</td>

<td>
<input type="number" id="f_<?= $row['STUDENT_ID']; ?>"
value="<?= $row['FINAL_EXAM_MARK']; ?>"
onchange="updateMarks(<?= $row['STUDENT_ID']; ?>)">
</td>

</tr>
<?php endwhile; ?>
</table>


<script>
let timer;
function updateMarks(student_id){
clearTimeout(timer);
timer=setTimeout(()=>{
let fd=new FormData();

fd.append("student_id",student_id);
fd.append("class_id",<?= $class_id ?>);
fd.append("participation",document.getElementById("p_"+student_id).value);
fd.append("attendance",document.getElementById("a_"+student_id).value);
fd.append("mid",document.getElementById("m_"+student_id).value);
fd.append("final",document.getElementById("f_"+student_id).value);

let xhr=new XMLHttpRequest();
xhr.open("POST","update_marks.php",true);

xhr.onload=function(){
document.getElementById("p_"+student_id).style.background="#d4edda";
document.getElementById("a_"+student_id).style.background="#d4edda";
document.getElementById("m_"+student_id).style.background="#d4edda";
document.getElementById("f_"+student_id).style.background="#d4edda";

setTimeout(()=>{
document.getElementById("p_"+student_id).style.background="";
document.getElementById("a_"+student_id).style.background="";
document.getElementById("m_"+student_id).style.background="";
document.getElementById("f_"+student_id).style.background="";
},400);
}
xhr.send(fd);
},500);
}
</script>
