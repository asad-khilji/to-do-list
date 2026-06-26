<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('INSERT INTO tasks (title, description, category, priority, status, due_date) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([
        $_POST['title'],
        $_POST['description'],
        $_POST['category'],
        $_POST['priority'],
        $_POST['status'],
        $_POST['due_date'] ?: null
    ]);
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-page">
    <form method="POST" class="form-card">
        <h1>Add Task</h1>
        <label>Title</label>
        <input name="title" required placeholder="Cancel gym membership">

        <label>Description</label>
        <textarea name="description" placeholder="Add details, links, phone numbers, or notes"></textarea>

        <label>Category</label>
        <input name="category" value="General" placeholder="Bills, Health, Renewal, Subscription">

        <div class="grid">
            <div>
                <label>Priority</label>
                <select name="priority">
                    <option>Low</option>
                    <option selected>Medium</option>
                    <option>High</option>
                </select>
            </div>
            <div>
                <label>Status</label>
                <select name="status">
                    <option>To Do</option>
                    <option>In Progress</option>
                    <option>Waiting</option>
                    <option>Done</option>
                </select>
            </div>
        </div>

        <label>Due Date</label>
        <input type="date" name="due_date">

        <button type="submit">Save Task</button>
        <a href="index.php" class="back">Back</a>
    </form>
</div>
</body>
</html>
