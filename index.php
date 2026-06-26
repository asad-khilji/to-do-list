<?php
require 'db.php';

$statusFilter = $_GET['status'] ?? 'All';

if ($statusFilter !== 'All') {
    $stmt = $pdo->prepare('SELECT * FROM tasks WHERE status = ? ORDER BY due_date IS NULL, due_date ASC, created_at DESC');
    $stmt->execute([$statusFilter]);
} else {
    $stmt = $pdo->query('SELECT * FROM tasks ORDER BY due_date IS NULL, due_date ASC, created_at DESC');
}
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = $pdo->query('SELECT COUNT(*) FROM tasks')->fetchColumn();
$urgent = $pdo->query("SELECT COUNT(*) FROM tasks WHERE priority='High' AND status!='Done'")->fetchColumn();
$waiting = $pdo->query("SELECT COUNT(*) FROM tasks WHERE status='Waiting'")->fetchColumn();
$done = $pdo->query("SELECT COUNT(*) FROM tasks WHERE status='Done'")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <h1>To Do List</h1>
        <p>Your simple personal task resolver.</p>
        <a class="button" href="add.php">+ Add Task</a>

        <nav>
            <?php foreach (['All','To Do','In Progress','Waiting','Done'] as $status): ?>
                <a class="<?= $statusFilter === $status ? 'active' : '' ?>"
                   href="?status=<?= urlencode($status) ?>">
                    <?= htmlspecialchars($status) ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </aside>

    <main>
        <section class="hero">
            <div>
                <h2>Today’s Tasks</h2>
                <p>Track your daily tasks in one calm place.</p>
            </div>
        </section>

        <section class="stats">
            <div><strong><?= $total ?></strong><span>Total</span></div>
            <div><strong><?= $urgent ?></strong><span>Urgent</span></div>
            <div><strong><?= $waiting ?></strong><span>Waiting</span></div>
            <div><strong><?= $done ?></strong><span>Done</span></div>
        </section>

        <section class="task-list">
            <?php if (!$tasks): ?>
                <div class="empty">No tasks yet. Add your first task.</div>
            <?php endif; ?>

            <?php foreach ($tasks as $task): ?>
                <article
                    class="task-card priority-<?= strtolower($task['priority']) ?>"
                    onclick="window.location='edit.php?id=<?= $task['id'] ?>'"
                    style="cursor:pointer;"
                >
                    <div class="task-top">
                        <span class="badge"><?= htmlspecialchars($task['category']) ?></span>
                        <span class="status"><?= htmlspecialchars($task['status']) ?></span>
                    </div>

                    <h3><?= htmlspecialchars($task['title']) ?></h3>

                    <p><?= nl2br(htmlspecialchars($task['description'])) ?></p>

                    <div class="task-meta">
                        <span>Priority: <?= htmlspecialchars($task['priority']) ?></span>
                        <span>Due:
                            <?= $task['due_date']
                                ? htmlspecialchars($task['due_date'])
                                : 'No date' ?>
                        </span>
                    </div>

                    <div class="actions">
                        <a href="edit.php?id=<?= $task['id'] ?>"
                           onclick="event.stopPropagation();">
                            Edit
                        </a>

                        <a href="delete.php?id=<?= $task['id'] ?>"
                           onclick="event.stopPropagation(); return confirm('Delete this task?')">
                            Delete
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
</div>
</body>
</html>