<?php
include 'db.php';

$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';
$editData = null;
$isEdit = !empty($id);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($type === 'student') {
        $name = $_POST['name'];
        $rollNo = $_POST['rollNo'];
        $session = $_POST['session'];
        $semester = $_POST['semester'];
        $program = $_POST['program'];
        
        if ($isEdit) {
            $sql = "UPDATE students SET name='$name', rollNo='$rollNo', session='$session', semester='$semester', program='$program' WHERE studentId=$id";
        } else {
            $sql = "INSERT INTO students (name, rollNo, session, semester, program) VALUES ('$name', '$rollNo', '$session', '$semester', '$program')";
        }
        mysqli_query($conn, $sql);
    } elseif ($type === 'course') {
        $courseName = $_POST['courseName'];
        $courseCode = $_POST['courseCode'];
        $courseInstructor = $_POST['courseInstructor'];
        
        if ($isEdit) {
            $sql = "UPDATE courses SET courseName='$courseName', courseCode='$courseCode', courseInstructor='$courseInstructor' WHERE courseId=$id";
        } else {
            $sql = "INSERT INTO courses (courseName, courseCode, courseInstructor) VALUES ('$courseName', '$courseCode', '$courseInstructor')";
        }
        mysqli_query($conn, $sql);
    }
    header('Location: index.php');
    exit;
}

// Get existing data for edit
if ($isEdit) {
    if ($type === 'student') {
        $result = mysqli_query($conn, "SELECT * FROM students WHERE studentId=$id");
        $editData = mysqli_fetch_assoc($result);
    } elseif ($type === 'course') {
        $result = mysqli_query($conn, "SELECT * FROM courses WHERE courseId=$id");
        $editData = mysqli_fetch_assoc($result);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $isEdit ? 'Edit' : 'Create' ?> <?= ucfirst($type) ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; }
        .container { max-width: 500px; margin: 60px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 32px 24px; }
        h1 { color: #1976d2; margin-bottom: 24px; }
        .back-btn { background: #666; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; margin-bottom: 16px; display: inline-block; }
        .back-btn:hover { background: #555; }
        label { display: block; margin-bottom: 6px; color: #2d3e50; font-weight: bold; }
        input[type="text"] { width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { background: #1976d2; color: #fff; border: none; padding: 12px 24px; border-radius: 6px; cursor: pointer; font-size: 1em; }
        input[type="submit"]:hover { background: #1565c0; }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php" class="back-btn">← Back to Dashboard</a>
    <h1><?= $isEdit ? 'Edit' : 'Create' ?> <?= ucfirst($type) ?></h1>
    
    <?php if ($type === 'student'): ?>
        <form method="post">
            <label>Name:</label>
            <input type="text" name="name" value="<?= $editData ? htmlspecialchars($editData['name']) : '' ?>" required>
            
            <label>Roll No:</label>
            <input type="text" name="rollNo" value="<?= $editData ? htmlspecialchars($editData['rollNo']) : '' ?>" required>
            
            <label>Session:</label>
            <input type="text" name="session" value="<?= $editData ? htmlspecialchars($editData['session']) : '' ?>" required>
            
            <label>Semester:</label>
            <input type="text" name="semester" value="<?= $editData ? htmlspecialchars($editData['semester']) : '' ?>" required>
            
            <label>Program:</label>
            <input type="text" name="program" value="<?= $editData ? htmlspecialchars($editData['program']) : '' ?>" required>
            
            <input type="submit" value="<?= $isEdit ? 'Update Student' : 'Create Student' ?>">
        </form>
    <?php elseif ($type === 'course'): ?>
        <form method="post">
            <label>Course Name:</label>
            <input type="text" name="courseName" value="<?= $editData ? htmlspecialchars($editData['courseName']) : '' ?>" required>
            
            <label>Course Code:</label>
            <input type="text" name="courseCode" value="<?= $editData ? htmlspecialchars($editData['courseCode']) : '' ?>" required>
            
            <label>Course Instructor:</label>
            <input type="text" name="courseInstructor" value="<?= $editData ? htmlspecialchars($editData['courseInstructor']) : '' ?>" required>
            
            <input type="submit" value="<?= $isEdit ? 'Update Course' : 'Create Course' ?>">
        </form>
    <?php endif; ?>
</div>
</body>
</html>