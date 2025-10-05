<?php
include 'db.php';

// Handle delete operations
if (isset($_GET['delete_student'])) {
    $id = $_GET['delete_student'];
    mysqli_query($conn, "DELETE FROM students WHERE studentId=$id");
    header('Location: index.php');
    exit;
}

if (isset($_GET['delete_course'])) {
    $id = $_GET['delete_course'];
    mysqli_query($conn, "DELETE FROM courses WHERE courseId=$id");
    header('Location: index.php');
    exit;
}

// Get students and courses
$students = mysqli_query($conn, "SELECT * FROM students");
$courses = mysqli_query($conn, "SELECT * FROM courses");
?>
<!DOCTYPE html>
<html>
<head>
    <title>University Course-Student CMS</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 32px 24px; }
        h1 { color: #1976d2; margin-bottom: 10px; }
        h2 { color: #2d3e50; margin-top: 32px; margin-bottom: 16px; }
        p { color: #666; margin-bottom: 24px; }
        .create-btn { background: #4caf50; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; margin-bottom: 16px; display: inline-block; }
        .create-btn:hover { background: #45a049; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 32px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #1976d2; color: #fff; }
        tr:nth-child(even) { background: #f4f6f8; }
        .actions a { margin-right: 8px; color: #1976d2; text-decoration: none; padding: 4px 8px; border-radius: 3px; }
        .actions a:hover { background: #e3f2fd; }
        .delete { color: #d32f2f !important; }
        .delete:hover { background: #ffebee !important; }
    </style>
</head>
<body>
<div class="container">
    <h1>University Course-Student Management System</h1>
    <p>This Content Management System allows you to efficiently manage students and courses with full CRUD operations.</p>

    <h2>Students Management</h2>
    <p>Manage student records including their personal information, enrollment details, and academic progress.</p>
    <a href="form.php?type=student" class="create-btn">+ Create Student</a>
    <table>
        <tr><th>Name</th><th>Roll No</th><th>Session</th><th>Semester</th><th>Program</th><th>Actions</th></tr>
        <?php while ($row = mysqli_fetch_assoc($students)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['rollNo']) ?></td>
                <td><?= htmlspecialchars($row['session']) ?></td>
                <td><?= htmlspecialchars($row['semester']) ?></td>
                <td><?= htmlspecialchars($row['program']) ?></td>
                <td class="actions">
                    <a href="form.php?type=student&id=<?= $row['studentId'] ?>">Update</a>
                    <a href="?delete_student=<?= $row['studentId'] ?>" class="delete" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Courses Management</h2>
    <p>Manage course information including course details, instructors, and academic schedules.</p>
    <a href="form.php?type=course" class="create-btn">+ Create Course</a>
    <table>
        <tr><th>Name</th><th>Code</th><th>Instructor</th><th>Actions</th></tr>
        <?php 
        mysqli_data_seek($courses, 0); // Reset pointer
        while ($row = mysqli_fetch_assoc($courses)): 
        ?>
            <tr>
                <td><?= htmlspecialchars($row['courseName']) ?></td>
                <td><?= htmlspecialchars($row['courseCode']) ?></td>
                <td><?= htmlspecialchars($row['courseInstructor']) ?></td>
                <td class="actions">
                    <a href="form.php?type=course&id=<?= $row['courseId'] ?>">Update</a>
                    <a href="?delete_course=<?= $row['courseId'] ?>" class="delete" onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>

    </style>
</head>
<body>
</html>