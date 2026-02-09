<?php
include('../utilities/utilities.php');
if (!isset($_SESSION['user_id'])) {
    die("Access denied");
}
$teacher_id=$_SESSION['user_id'];
//بروفايل المعلم
$stmt=$conn->prepare('SELECT FIRST_NAME, MIDDLE_NAMES, LAST_NAME, PHONE_NUMBER FROM TEACHER WHERE TEACHER_ID=?');
$stmt->bind_param("i",$teacher_id);
$stmt->execute();

$result=$stmt->get_result();
$teacher=$result->fetch_assoc();

//كلاسات التي يدرسها المعلم 
$stmt2=$conn->prepare('SELECT 
    CLASS.CLASS_ID,
    COURSE.COURSE_NAME,
    TERM.TERM_START,
    TERM.TERM_END
FROM CLASS
JOIN COURSE 
    ON CLASS.COURSE_ID = COURSE.COURSE_ID
JOIN TERM
    ON CLASS.TERM_ID = TERM.TERM_ID
WHERE CLASS.TEACHER_ID = ?;
');
$stmt2->bind_param("i", $teacher_id);
$stmt2->execute();
$classes = $stmt2->get_result();
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard</title>
</head>
<body>

<h1>Teacher Dashboard</h1>

<!-- بروفايل المعلم -->
<section>
    <h2>Teacher Profile</h2>

    <p>
        <strong>Name:</strong>
        <?= $teacher['FIRST_NAME'] . " " . $teacher['MIDDLE_NAMES'] . " " . $teacher['LAST_NAME']; ?>
    </p>

    <p>
        <strong>Phone:</strong>
        <?= $teacher['PHONE_NUMBER']; ?>
    </p>
</section>

<hr>

<!-- الكلاسات -->
<section>
    <h2>My Classes</h2>

    <?php if ($classes->num_rows > 0): ?>
        <ul>
            <?php while ($row = $classes->fetch_assoc()): ?>
                <li>
                    <strong><?= $row['COURSE_NAME']; ?></strong>
                    <br>
                    Term:
                    <?= $row['TERM_START']; ?> →
                    <?= $row['TERM_END']; ?>
                    <br>
                    <a href="class_students.php?class_id=<?= $row['CLASS_ID']; ?>">
                        View Students
                    </a>
                </li>
                <hr>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No classes assigned.</p>
    <?php endif; ?>

</section>
  <!--الاعدادات-->
<button class="btn btn-primary" id="openSettingsMenu">Settings Menu</button>
<div id="settingsMenu" style="display:none;">
    <button class="btn btn-primary mt-3" id="btnAccount">Account Info</button><br>
    <button class="btn btn-primary mt-3" id="btnPassword">Change Password</button><br>
</div>
<div id="accountSection" style="display:none;">
    <form id="accountForm"> <label>First Name:</label><br>
        <input class="form-control" type="text" name="first_name" value="<?= $teacher['FIRST_NAME']; ?>"><br>

        <label>Middle Names:</label><br>
        <input class="form-control"  type="text" name="middle_names" value="<?= $teacher['MIDDLE_NAMES']; ?>"><br>

        <label>Last Name:</label><br>
        <input class="form-control"  type="text" name="last_name" value="<?= $teacher['LAST_NAME']; ?>"><br>

        <label>Phone Number:</label><br>
        <input class="form-control"  type="text" name="phone_number" value="<?= $teacher['PHONE_NUMBER']; ?>"><br>

        <button class="btn btn-primary"  type="button" id="saveAccount">Save Account Info</button>
    </form>
</div>
<div id="passwordSection" style="display:none;">
    <form id="passwordForm"> <label>Current Password:</label><br>
        <input class="form-control"  type="password" name="current_password"><br>

        <label>New Password:</label><br>
        <input class="form-control"  type="password" name="new_password"><br>

        <label>Confirm New Password:</label><br>
        <input class="form-control"  type="password" name="confirm_password"><br>

        <button class="btn btn-primary"  type="button" id="changePassword">Change Password</button>
    </form>
</div>
<script>
    document.getElementById('openSettingsMenu').onclick = function() {
    var menu = document.getElementById('settingsMenu');
    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
}
document.getElementById('btnAccount').onclick = function() {
    document.getElementById('accountSection').style.display = 'block';
    document.getElementById('passwordSection').style.display = 'none'; // إخفاء قسم الباسوورد
}
document.getElementById('btnPassword').onclick = function() {
    document.getElementById('passwordSection').style.display = 'block';
    document.getElementById('accountSection').style.display = 'none'; // إخفاء قسم الحساب
}
document.getElementById('saveAccount').onclick = function() {
    var form = document.getElementById('accountForm');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_account.php", true);
    xhr.onload = function() {
        alert(xhr.responseText);
    };
    xhr.send(formData);
}
document.getElementById('changePassword').onclick = function() {
    var form = document.getElementById('passwordForm');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "change_password.php", true);
    xhr.onload = function() {
        alert(xhr.responseText);
    };
    xhr.send(formData);
}
</script>




</body>
</html>