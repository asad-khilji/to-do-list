<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) die('Missing task ID');

$stmt = $pdo->prepare('SELECT * FROM tasks WHERE id = ?');
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$task) die('Task not found');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $oldStatus = $task['status'];
    $newStatus = $_POST['status'];

    // Keep existing attachments and add new ones
    $existingAttachments = $task['attachment'] ?? '';
    $attachments = $existingAttachments ? explode(',', $existingAttachments) : [];

    // Upload multiple attachments
    if (!empty($_FILES['attachments']['name'][0])) {

        $uploadDir = __DIR__ . '/uploads/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        foreach ($_FILES['attachments']['name'] as $index => $name) {

            if ($_FILES['attachments']['error'][$index] !== UPLOAD_ERR_OK) {
                continue;
            }

            $originalName = basename($name);
            $safeName = preg_replace('/[^A-Za-z0-9._-]/', '_', $originalName);
            $fileName = time() . '_' . uniqid() . '_' . $safeName;
            $targetPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['attachments']['tmp_name'][$index], $targetPath)) {
                $attachments[] = $fileName;
            }
        }
    }

    $attachment = implode(',', array_filter($attachments));

    // Send email only if status changed
    if ($oldStatus !== $newStatus) {

        $allowedRecipients = [
            'ahmed@unikinternational.com',
            'asad@unikinternational.com',
            'awais@unikinternational.com',
            'zahra@unikinternational.com',
            'zarnoosh@unikinternational.com',
            'jorge@unikinternational.com',
            'fawad@unikinternational.com',
            'production@unikinternational.com',
            'shipping@unikinternational.com'
        ];

        $selectedRecipients = $_POST['notify_to'] ?? [];

        // Only allow known email addresses
        $selectedRecipients = array_values(
            array_intersect($selectedRecipients, $allowedRecipients)
        );

        if (!empty($selectedRecipients)) {

            $to = implode(', ', $selectedRecipients);

            $subject = 'Task Status Updated';

            $message = "
Task: {$_POST['title']}

Status changed from:
{$oldStatus}

To:
{$newStatus}

Description:
{$_POST['description']}

View or update this task:
https://zjd.lpc.mybluehost.me/to-do/
";

            $headers = "From: noreply@yourdomain.com\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            @mail($to, $subject, $message, $headers);
        }
    }

    // Update task
    $stmt = $pdo->prepare("
        UPDATE tasks
        SET
            title=?,
            description=?,
            category=?,
            priority=?,
            status=?,
            due_date=?,
            attachment=?
        WHERE id=?
    ");

    $stmt->execute([
        $_POST['title'],
        $_POST['description'],
        $_POST['category'],
        $_POST['priority'],
        $_POST['status'],
        $_POST['due_date'] ?: null,
        $attachment,
        $id
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
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-page">

<form method="POST" class="form-card" enctype="multipart/form-data">

<h1>Edit Task</h1>

<label>Title</label>
<input
    name="title"
    required
    value="<?= htmlspecialchars($task['title']) ?>"
>

<label>Description</label>
<textarea name="description"><?= htmlspecialchars($task['description']) ?></textarea>

<label>Category</label>
<input
    name="category"
    value="<?= htmlspecialchars($task['category']) ?>"
>

<div class="grid">

<div>
<label>Priority</label>

<select name="priority">
<?php foreach (['Low','Medium','High'] as $p): ?>
<option <?= $task['priority'] === $p ? 'selected' : '' ?>>
<?= $p ?>
</option>
<?php endforeach; ?>
</select>

</div>

<div>

<label>Status</label>

<select name="status">
<?php foreach (['To Do','In Progress','Waiting','Done'] as $s): ?>
<option <?= $task['status'] === $s ? 'selected' : '' ?>>
<?= $s ?>
</option>
<?php endforeach; ?>
</select>

</div>

</div>

<label>Due Date</label>

<input
    type="date"
    name="due_date"
    value="<?= htmlspecialchars($task['due_date']) ?>"
>

<label>Attachments</label>

<input type="file" name="attachments[]" multiple>

<?php if (!empty($task['attachment'])): ?>

<p>Current attachments:</p>

<?php foreach (explode(',', $task['attachment']) as $file): ?>
    <?php $file = trim($file); ?>
    <?php if ($file): ?>
        <p>
            <a
                href="uploads/<?= htmlspecialchars($file) ?>"
                target="_blank"
            >
                <?= htmlspecialchars($file) ?>
            </a>
        </p>
    <?php endif; ?>
<?php endforeach; ?>

<?php endif; ?>

<hr>

<h3>Email Notification</h3>

<p>Select who should receive the notification if the status changes.</p>

<label>
    <input type="checkbox" name="notify_to[]" value="ahmed@unikinternational.com">
    Ahmed
</label><br>

<label>
    <input type="checkbox" name="notify_to[]" value="asad@unikinternational.com">
    Asad
</label><br>

<label>
    <input type="checkbox" name="notify_to[]" value="awais@unikinternational.com">
    Awais
</label><br>

<label>
    <input type="checkbox" name="notify_to[]" value="zahra@unikinternational.com">
    Zahra
</label><br>

<label>
    <input type="checkbox" name="notify_to[]" value="zarnoosh@unikinternational.com">
    Zarnoosh
</label><br>

<label>
    <input type="checkbox" name="notify_to[]" value="jorge@unikinternational.com">
    Jorge
</label><br>

<label>
    <input type="checkbox" name="notify_to[]" value="fawad@unikinternational.com">
    Fawad
</label><br>

<label>
    <input type="checkbox" name="notify_to[]" value="production@unikinternational.com">
    Anjum
</label><br>

<label>
    <input type="checkbox" name="notify_to[]" value="shipping@unikinternational.com">
    Tammy
</label>

<br><br>

<button type="submit">Update Task</button>

<a href="index.php" class="back">Back</a>

</form>

</div>

</body>
</html>
