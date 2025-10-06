<?php
include 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$isEdit = $id > 0;
$editData = null;

// Handle POST (create or update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $rollNo = trim($_POST['rollNo'] ?? '');
    $session = trim($_POST['session'] ?? '');
    $semester = trim($_POST['semester'] ?? '');
    $program = trim($_POST['program'] ?? '');

    if ($isEdit) {
        $stmt = mysqli_prepare($conn, "UPDATE students SET name=?, rollNo=?, session=?, semester=?, program=? WHERE studentId=?");
        mysqli_stmt_bind_param($stmt, 'sssssi', $name, $rollNo, $session, $semester, $program, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO students (name, rollNo, session, semester, program) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sssss', $name, $rollNo, $session, $semester, $program);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    header('Location: index.php');
    exit;
}

// Load data for edit
if ($isEdit) {
    $stmt = mysqli_prepare($conn, "SELECT studentId, name, rollNo, session, semester, program FROM students WHERE studentId = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $editData = mysqli_fetch_assoc($res);
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $isEdit ? 'Edit' : 'Create' ?> Student</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; }
        .container { max-width: 600px; margin: 60px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 28px; }
        h1 { color: #1976d2; margin-bottom: 18px; }
        .back { display: inline-block; margin-bottom: 12px; text-decoration: none; color: #555; }
        label { display: block; margin: 10px 0 6px; color: #333; font-weight: 600; }
        input[type="text"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        .submit { margin-top: 18px; background: #1976d2; color: #fff; padding: 10px 16px; border: none; border-radius: 6px; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <a class="back" href="index.php">← Back to Students</a>
    <h1><?= $isEdit ? 'Edit' : 'Create' ?> Student</h1>
    <form method="post">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="<?= $editData ? htmlspecialchars($editData['name']) : '' ?>" required>

        <label for="rollNo">Roll No</label>
        <input id="rollNo" name="rollNo" type="text" value="<?= $editData ? htmlspecialchars($editData['rollNo']) : '' ?>" required>

        <label for="session">Session</label>
        <input id="session" name="session" type="text" value="<?= $editData ? htmlspecialchars($editData['session']) : '' ?>" required>

        <label for="semester">Semester</label>
        <input id="semester" name="semester" type="text" value="<?= $editData ? htmlspecialchars($editData['semester']) : '' ?>" required>

        <label for="program">Program</label>
        <input id="program" name="program" type="text" value="<?= $editData ? htmlspecialchars($editData['program']) : '' ?>" required>

        <button class="submit" type="submit"><?= $isEdit ? 'Update Student' : 'Create Student' ?></button>
    </form>
</div>
</body>
</html>