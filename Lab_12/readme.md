  # Lab 12 – Student Management (CRUD) – Web Development

  This folder contains **Lab 12**, a small student management CRUD application built with plain PHP and MySQL. The app demonstrates basic database operations: creating, reading, updating, and deleting student records.

  ---

  ## 📝 Task Overview

  The lab implements a minimal student management interface with server-side PHP and a MySQL database. The UI is a simple, accessible set of pages that allow adding new students, editing existing ones, listing all students, and deleting records.

  ### Key Concepts Covered:

  - Connecting to MySQL from PHP (`db.php`)
  - Prepared statements for INSERT, UPDATE and DELETE to avoid SQL injection
  - Simple routing between `index.php` (list) and `form.php` (create/edit)
  - Rendering server-side data into HTML safely with `htmlspecialchars`

  ---

  ## 🔗 Live Preview / How to run locally

  1. Ensure you have PHP and MySQL installed.
  2. Import the provided `SMS.sql` into your MySQL server to create the `SMS` database and `students` table.
  3. Start a PHP server from this folder or use your web server (Apache / Nginx + PHP).

     Example using PHP built-in server (PowerShell):

  ```powershell
  cd "e:\Semester 6\Web Design and Development\Lab\lab_11"
  php -S localhost:8000
  ```

  Then open http://localhost:8000/index.php in a browser.

  The default DB connection in `db.php` points to:
  - host: `localhost`
  - user: `root`
  - password: (empty string)
  - database: `SMS`

  Adjust `db.php` if your MySQL credentials differ.

  ---

  ## 🛠️ Technologies Used

  - **PHP** — Server-side logic for CRUD operations
  - **MySQL** — Database (schema in `SMS.sql`)
  - **HTML/CSS** — Simple styling baked into the PHP pages

  ---

  ## 📁 Folder Structure

  ```
  lab_12/
  ├── index.php        # Lists students and provides delete link
  ├── form.php         # Create / Edit student form and POST handler
  ├── db.php           # MySQL connection (update credentials if needed)
  ├── SMS.sql          # SQL dump: database + students table
  └── readme.md        # This file
  ```

  ---

  ## ✅ Task Requirements

  - Implement create, read, update, delete functionality for student records
  - Use prepared statements for database writes (INSERT/UPDATE/DELETE)
  - Display records in a simple table with actions to edit or delete
  - Provide a single form (`form.php`) that handles both create and update based on the presence of an `id` query parameter

  ---

  ## ✨ Outcome

  This lab produces a working, minimal student management application suitable for learning server-side CRUD patterns in PHP and working with a relational database. It's intentionally small and focused so you can extend it (validation, pagination, authentication) in future exercises.
