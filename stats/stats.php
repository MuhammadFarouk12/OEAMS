<?php
	include_once("../utilities/auth.php");
	go_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Statistics</title>
    <?php include_once('../utilities/utilities.php'); ?>
    <script src="../js/chart.js"></script>
</head>
<body>
    <?php
    $start_term = isset($_POST['start_term']) ? (int) $_POST ['start_term']: 1;
    $end_term = isset($_POST['end_term']) ? (int) $_POST ['end_term']: 5;
    $sql_enrl = $conn->prepare("SELECT TERM.TERM_ID, COUNT(REGISTRATION.REGISTRATION_ID ) AS std_count FROM TERM
        LEFT JOIN CLASS ON TERM.TERM_ID = CLASS.TERM_ID
        LEFT JOIN REGISTRATION ON CLASS.CLASS_ID = REGISTRATION.CLASS_ID
        WHERE TERM.TERM_ID BETWEEN ? AND ?
        GROUP BY TERM.TERM_ID
        ORDER BY TERM.TERM_ID ASC
    ");
    $sql_enrl->bind_param("ii", $start_term , $end_term);
    $sql_enrl->execute();
    $enrl_res = $sql_enrl->get_result();

    $t_labels = [];
    $enrl_data = [];

    while($row = $enrl_res->fetch_assoc()){
        $t_labels[] = "Term " . $row['TERM_ID'];
        $enrl_data[] = $row['std_count'];
    }
    ?>
    <div style="display: flex; gap: 20px; justify-content: center; align-items: center; min-height: 100vh;">
    <div style="width: 45%; margin: 100px auto;">
         <form method="POST" action="" style="margin-bottom: 15px;">
         <label for="start_term">form the term</label>
         <input class="form-control" type="number" id="start_term" name="start_term" min="1" value="<?php echo htmlspecialchars($start_term);?>"style="width: 60px;">

         <label for="end_term">to the term</label>
         <input class="form-control" type="number" id="end_term" name="end_term" min="1" value="<?php echo htmlspecialchars($end_term);?>"style="width: 60px;">
         <button class="btn btn-primary mt-2" type="submit">Range display</button></form> 
        <h1>Enrollment Growth per Term</h1>
        <canvas id="enrlChart"></canvas>
    </div>

    <script>
    const enrlCtx = document.getElementById('enrlChart').getContext('2d');
    const enrlChart = new Chart(enrlCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($t_labels); ?>,
            datasets: [{
                label: 'Number of Students',
                data: <?php echo json_encode($enrl_data); ?>,
                fill: true,
                backgroundColor: 'rgba(88, 3, 122, 0.1)',
                borderColor: '#58037a',
                borderWidth: 3,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#58037a'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
    </script>

    <?php
     $term_id_filter = isset($_POST["term_id"]) ? (int)$_POST["term_id"]: 1;
     $sql_classes = $conn->prepare("
     SELECT class_id
    FROM `class`
    WHERE term_id = ?");
    $sql_classes->bind_param("i", $term_id_filter);
    $sql_classes->execute();
    $classes_res = $sql_classes->get_result();

     $class_id_filter = isset($_POST['class_id']) ? (array) $_POST ['class_id']: [];
     $ids_string = !empty($class_id_filter) ? implode(',', array_map('intval', $class_id_filter)) : "0";
    $sql_top = $conn->prepare("SELECT student.first_name, (IFNULL(registration.participation_mark, 0) + IFNULL(registration.attendance_mark, 0)
     + IFNULL(registration.mid_exam_mark, 0) + IFNULL(registration.homeworks_mark, 0) + IFNULL(registration.activites_mark, 0) 
     + IFNULL(registration.final_exam_mark, 0)) AS total
        FROM registration 
        JOIN student ON registration.student_id = student.student_id
        JOIN class ON registration.class_id = class.class_id WHERE class.term_id = ? AND class.class_id IN ($ids_string) 
        ORDER BY total DESC 
        LIMIT 5
    ");
    $sql_top->bind_param("i" , $term_id_filter);

    $sql_top->execute();
    $top_res = $sql_top->get_result();

    $std_names = [];
    $std_scores = [];

    while($row = $top_res->fetch_assoc()){
        $std_names[] = $row['FIRST_NAME'];
        $std_scores[] = $row['total'];
    }
    ?>
    <div style="width: 45%; margin: auto;">
         <form method="POST" action="">
    <label>Term</label>
    <input type="number" name="term_id"
        value="<?php echo htmlspecialchars($term_id_filter); ?>">

    <label>Class</label>
    <select name="class_id[]" id="class-select-list" class="form-select" multiple style="heght: 100px;">
    <?php if ($classes_res->num_rows == 0): ?>
        <option value="">No classes for this term</option>
    <?php else: ?>
        <?php while($c = $classes_res->fetch_assoc()): ?>
             <?php $is_selected = (in_array($c['class_id'], $class_id_filter)) ? 'selected' : ''; ?>
            <option value="<?php echo $c['class_id']; ?>" <?php echo $is_selected; ?>>
                Class <?php echo $c['class_id']; ?>
            </option>
        <?php endwhile; ?>
    <?php endif; ?>
</select>

    <button type="submit">Show Top Students</button>
</form>
    
        <h2>Top 5 Students Performing thes term <?php echo htmlspecialchars($term_id_filter);?></h2>
        <canvas id="topStdChart"></canvas>
    </div>
    </div>

    <script>
    const topCtx = document.getElementById('topStdChart').getContext('2d');
    const topChart = new Chart(topCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($std_names); ?>,
            datasets: [{
                label: 'Total Score',
                data: <?php echo json_encode($std_scores); ?>,
                backgroundColor: '#58037a',
                borderColor: '#58037a',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
<script>
document.querySelector('input[name="term_id"]').addEventListener('input', function() {
    var termId = this.value;
    var classSelect = document.getElementById('class-select-list'); 

    if (termId && termId > 0) {
        fetch('get_class.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'term_id=' + termId
        })
        .then(response => response.text())
        .then(data => {
            classSelect.innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
            classSelect.innerHTML = "<option> error in download data </option>";
        });
    } else {
        classSelect.innerHTML = "<option value=''>enter number data correct</option>";
    }
});
</script>




</body>
</html>
