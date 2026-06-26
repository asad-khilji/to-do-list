# To-Do List Application

## Overview
This project is a PHP/MySQL task management application that allows users to create, edit, track, and delete tasks through a web interface. The application includes task filtering, priorities, due dates, file attachments, and optional email notifications when task status changes.

---

# 1. Requirements

## Software
- PHP 8.0+
- MySQL / MariaDB
- Apache Web Server (Bluehost compatible)
- Web Browser
- Bluehost Shared Hosting or VPS

## Database
Import the provided SQL file:

`zjdlpcmy_life_admin.sql`

## Project Files
- index.php
- add.php
- edit.php
- delete.php
- db.php
- style.css
- uploads/ (created automatically)

---

# 2. Functional Specifications

The application provides:

- View all tasks
- Filter tasks by status
- Add new tasks
- Edit existing tasks
- Delete tasks
- Assign category
- Assign priority
- Set due dates
- Upload multiple attachments
- Email notifications when task status changes
- Dashboard statistics:
  - Total Tasks
  - Urgent Tasks
  - Waiting Tasks
  - Completed Tasks

---

# 3. Design

## Architecture

Presentation Layer
- HTML
- CSS

Business Logic
- PHP

Data Layer
- MySQL using PDO

## Database

Primary table:

tasks

Typical fields include:
- id
- title
- description
- category
- priority
- status
- due_date
- attachment
- created_at

---

# 4. Implementation

## Main Files

### index.php
Displays dashboard, statistics, filtering, and task list.

### add.php
Creates new tasks.

### edit.php
Updates tasks, uploads attachments, and sends email notifications.

### delete.php
Deletes selected tasks.

### db.php
Creates PDO database connection.

### style.css
Provides application styling.

## Security Recommendations

Current project works but should be improved by:

- Move database credentials outside web root.
- Store credentials in environment variables.
- Validate uploaded file types.
- Limit upload size.
- Add login/authentication.
- Add CSRF protection.
- Improve email sender configuration.
- Sanitize uploaded filenames and scan uploads if possible.

---

# 5. Testing

## Functional Tests

✓ Create task

✓ Edit task

✓ Delete task

✓ Filter by status

✓ Upload attachments

✓ Send notification emails

✓ Dashboard statistics update

## Database Tests

- Verify records are inserted
- Verify updates persist
- Verify deletes remove records

## Browser Testing

Test on:
- Chrome
- Edge
- Firefox
- Safari

---

# 6. Deployment on Bluehost File Manager

## Step 1

Login to Bluehost.

## Step 2

Open:

Hosting → File Manager

## Step 3

Navigate to:

public_html/

(or desired subfolder)

## Step 4

Upload the project files.

## Step 5

Create a MySQL database from Bluehost cPanel.

## Step 6

Import:

zjdlpcmy_life_admin.sql

using phpMyAdmin.

## Step 7

Update db.php:

- Host
- Database name
- Username
- Password

using your Bluehost database credentials.

## Step 8

Ensure PHP has:
- PDO
- PDO MySQL
- File Uploads enabled

## Step 9

Give the uploads folder write permission (755 or 775).

## Step 10

Visit:

https://yourdomain.com/to-do/

---

# 7. Maintenance

Routine maintenance should include:

- Database backups
- Application backups
- PHP updates
- MySQL updates
- Security patches
- Monitor upload directory
- Remove unused files
- Review error logs
- Test email delivery
- Optimize database periodically

---

# Future Enhancements

- User authentication
- Multiple users
- Role-based permissions
- Search
- Calendar view
- Dark mode
- Task reminders
- Email templates
- Activity logs
- REST API
- Mobile responsive improvements

---

# Notes

The current project already includes:

- PHP PDO database access
- CRUD operations
- File attachments
- Email notifications
- Status filtering
- Priority management
- Dashboard statistics

Recommended improvements mainly focus on production security, authentication, and scalability.
