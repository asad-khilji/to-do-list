# Task Management System

A modern, responsive web-based Task Management System built using **HTML, CSS, PHP, and MySQL**. The application enables teams to efficiently create, assign, manage, and track tasks while providing role-based access control, email notifications, reminders, file attachments, and calendar integration.

---

## Overview

The Task Management System is designed to help small teams organize and manage daily work efficiently. Users can create tasks, assign them to team members, monitor progress, upload attachments, receive email notifications, and view tasks in both card and calendar layouts.

The application supports three user roles:

- **Administrator** – Full access to the system
- **Manager** – Can view and manage all tasks
- **Standard User** – Can manage only their assigned tasks

---

# Features

## User Authentication

- Secure login system
- Password hashing
- Session management
- Role-based authorization
- Logout functionality

---

## Dashboard

- Total Tasks
- To Do Tasks
- In Progress Tasks
- Waiting Tasks
- Completed Tasks
- Search bar
- Status navigation
- Responsive task cards

---

## Task Management

Users can:

- Create tasks
- Edit tasks
- Delete tasks
- View task details
- Click anywhere on a task card to open it
- Search tasks
- Filter tasks by status
- Attach multiple files
- Assign tasks
- Set due dates
- Set priorities
- Add descriptions
- Categorize tasks

---

## Task Status

The system supports four task statuses:

- To Do
- In Progress
- Waiting
- Done

---

## Priorities

- Low
- Medium
- High
- Urgent

---

## Email Notifications

Email notifications are automatically sent when:

- A task is created
- A task is updated

The creator can select which users receive notifications.

---

## Calendar

Calendar view allows users to:

- View upcoming tasks
- View overdue tasks
- View daily tasks
- View monthly tasks

---

## File Attachments

Supports uploading multiple files including:

- PDF
- Excel
- Word
- Images

Users can:

- Upload
- Download
- View existing attachments

---

## Reminder System

Task reminders include:

- Upcoming due dates
- Overdue tasks

---

## Search

Users can search tasks by:

- Title
- Description
- Category
- Status

---

## Responsive Design

Fully responsive for:

- Desktop
- Tablet
- Mobile

---

# User Roles

## Administrator

Administrator permissions include:

- Full access
- Manage users
- Create users
- Delete users
- Reset passwords
- View all tasks
- Edit all tasks
- Delete all tasks
- Assign tasks

---

## Manager

Manager permissions include:

- View all tasks
- Create tasks
- Assign tasks
- Edit tasks
- Delete tasks

---

## Standard User

Standard users can:

- View assigned tasks
- Create tasks
- Edit their own tasks
- Upload attachments
- Receive notifications

---

# Technology Stack

Frontend

- HTML5
- CSS3
- JavaScript

Backend

- PHP

Database

- MySQL

Development Tools

- phpMyAdmin
- Bluehost File Manager

---

# Database

## Users Table

| Column | Description |
|----------|-------------|
| id | Primary Key |
| username | Username |
| password | Hashed Password |
| role | Admin, Manager, User |

---

## Tasks Table

| Column | Description |
|----------|-------------|
| id | Primary Key |
| title | Task title |
| description | Task description |
| category | Task category |
| priority | Task priority |
| status | Task status |
| due_date | Due date |
| created_at | Date created |
| attachment | File attachment |
| assign_name | Assigned user |
| assigned_email | Assigned email |
| user_role | Assigned role |

---

# Security

The application follows security best practices:

- Password hashing
- Prepared SQL statements
- Input sanitization using `htmlspecialchars()`
- Environment variables for credentials
- Secure session handling
- `.htaccess` protection

---

# Project Structure

```
project/
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── uploads/
│
├── includes/
│   ├── db.php
│   ├── auth.php
│   ├── functions.php
│
├── pages/
│   ├── dashboard.php
│   ├── add-task.php
│   ├── edit-task.php
│   ├── login.php
│   └── calendar.php
│
├── config/
│   ├── .env
│   └── config.php
│
├── index.php
├── logout.php
└── .htaccess
```

---

# Installation

## Requirements

- PHP 8+
- MySQL
- Apache
- phpMyAdmin

---

## Installation Steps

1. Clone or download the project.

```
git clone https://github.com/username/task-manager.git
```

2. Create a MySQL database.

3. Import the SQL database.

4. Configure the `.env` file.

Example:

```
DB_HOST=localhost
DB_NAME=task_manager
DB_USER=root
DB_PASSWORD=password
```

5. Start Apache and MySQL.

6. Open the project in your browser.

```
http://localhost/task-manager
```

---

# Email Configuration

Configure SMTP inside your PHP mail configuration.

Example:

```
SMTP Host
SMTP Username
SMTP Password
SMTP Port
```

---

# Testing

Before deployment the following should be verified:

- Login works correctly
- CRUD operations work
- Search functions correctly
- Email notifications are sent
- File uploads work
- Calendar displays correctly
- Delete confirmation appears
- Responsive layout works
- Keyboard navigation works
- No console errors
- No PHP warnings

---

# Deployment

The application will be deployed using:

- Bluehost File Manager
- phpMyAdmin
- Shared Hosting

Deployment includes:

- Upload project files
- Import database
- Configure `.env`
- Configure SMTP
- Test production environment

---

# Maintenance

Future maintenance includes:

- Bug fixes
- Security updates
- Regular backups
- User management
- Feature enhancements
- Performance improvements

---

# Future Enhancements

Potential future features include:

- Dark mode
- Drag-and-drop Kanban board
- Task comments
- Activity log
- Push notifications
- Recurring tasks
- Time tracking
- Dashboard analytics
- Mobile application
- Two-factor authentication

---

# Browser Support

- Google Chrome
- Microsoft Edge
- Mozilla Firefox
- Safari

---

# License

This project is developed for internal business use. Redistribution or commercial use requires permission from the project owner.

---

# Developer

Developed using:

- HTML
- CSS
- JavaScript
- PHP
- MySQL

---

## Version

**Version:** 1.0.0

Initial Release