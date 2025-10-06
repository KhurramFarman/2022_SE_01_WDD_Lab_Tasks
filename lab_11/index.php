<?php
include 'db.php';

// Delete student (prepared)
if (isset($_GET['delete_student'])) {
    $id = (int)$_GET['delete_student'];
    $stmt = mysqli_prepare($conn, "DELETE FROM students WHERE studentId = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location: index.php');
    exit;
}

// Fetch students
$students = [];
$res = mysqli_query($conn, "SELECT studentId, name, rollNo, session, semester, program FROM students ORDER BY studentId DESC");
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) {
        $students[] = $r;
    }
    mysqli_free_result($res);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Student Management</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 32px 24px; }
        h1 { color: #1976d2; margin-bottom: 8px; }
        p.lead { color: #666; margin-top: 0; }
        .create-btn { background: #4caf50; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; margin-bottom: 16px; display: inline-block; }
        .create-btn:hover { background: #45a049; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 32px; }
        th, td { border: 1px solid #e0e0e0; padding: 10px; text-align: left; }
        th { background: #1976d2; color: #fff; }
        tr:nth-child(even) { background: #fafafa; }
        .actions a { margin-right: 8px; color: #1976d2; text-decoration: none; padding: 6px 10px; border-radius: 4px; }
        .actions a.delete { color: #d32f2f; }
    </style>
</head>
<body>
<div class="container">
    <h1>Student Management</h1>
    <p class="lead">Manage student records — add, edit or delete students.</p>

    <a href="form.php" class="create-btn">+ Create Student</a>

    <table>
        <thead>
            <tr><th>Name</th><th>Roll No</th><th>Session</th><th>Semester</th><th>Program</th><th>Actions</th></tr>
        </thead>
        <tbody>
        <?php if (count($students) === 0): ?>
            <tr><td colspan="6">No students found.</td></tr>
        <?php else: ?>
            <?php foreach ($students as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['rollNo']) ?></td>
                <td><?= htmlspecialchars($row['session']) ?></td>
                <td><?= htmlspecialchars($row['semester']) ?></td>
                <td><?= htmlspecialchars($row['program']) ?></td>
                <td class="actions">
                    <a href="form.php?id=<?= $row['studentId'] ?>">Update</a>
                    <a href="?delete_student=<?= $row['studentId'] ?>" class="delete" onclick="return confirm('Delete this student?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>