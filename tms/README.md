# Advanced Task Management System (ATMS) - Backend API

A robust REST API for a collaborative task management system built with Laravel. ATMS enables individuals and teams to create projects, assign tasks, manage team members, track progress, add comments, and set reminders for efficient project collaboration and task tracking.

## Overview

ATMS is a comprehensive task management backend that provides:

- **User Authentication & Authorization** via JWT tokens
- **Project Management** - Create and manage projects
- **Task Management** - Create, assign, and track tasks with status and priority levels
- **Team Collaboration** - Add team members to projects with role-based permissions
- **Task Comments** - Enable team communication on specific tasks
- **Reminders** - Set task reminders and notifications
- **Categories** - Organize tasks with categories

## Tech Stack

| Component            | Technology           | Version |
| -------------------- | -------------------- | ------- |
| **Framework**        | Laravel              | ^10.10  |
| **Language**         | PHP                  | ^8.1    |
| **Database**         | MySQL                | Latest  |
| **Authentication**   | JWT (tymon/jwt-auth) | ^2.3    |
| **API Security**     | CORS & Sanctum       | ^3.3    |
| **Frontend Tooling** | Vite                 | ^5.0.0  |
| **HTTP Client**      | Axios                | ^1.6.4  |

### Why Laravel?

✅ Clean and organized **MVC architecture**  
✅ Powerful **Eloquent ORM** for database operations  
✅ Built-in **security features** (CORS, CSRF protection)  
✅ RESTful API structure with resource routing  
✅ Excellent documentation and large community support

## System Requirements

- **PHP** >= 8.1
- **Composer** >= 2.0
- **MySQL** >= 8.0
- **Node.js** >= 16.0 (for Vite)
- **npm** or **yarn**

## Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd tms
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Generate JWT secret
php artisan jwt:secret
```

### 4. Configure Database

Edit `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. (Optional) Seed Database

```bash
php artisan db:seed
```

## Development

### Start Development Server

```bash
# Start Laravel development server
php artisan serve

# In another terminal, start Vite dev server
npm run dev
```

The API will be available at `http://localhost:8000`

### Build for Production

```bash
npm run build
```

## API Endpoints

### Authentication Routes

| Method | Endpoint            | Description                    |
| ------ | ------------------- | ------------------------------ |
| POST   | `api/auth/register` | Register new user              |
| POST   | `api/auth/login`    | Login user and get JWT token   |
| GET    | `api/auth/me`       | Get current authenticated user |
| POST   | `api/auth/logout`   | Logout user                    |

### Projects Management

| Method | Endpoint                 | Description            |
| ------ | ------------------------ | ---------------------- |
| GET    | `api/projects`           | List all user projects |
| POST   | `api/projects`           | Create new project     |
| GET    | `api/projects/{project}` | Get project details    |
| PUT    | `api/projects/{project}` | Update project         |
| DELETE | `api/projects/{project}` | Delete project         |

### Project Team Members

| Method | Endpoint                              | Description                   |
| ------ | ------------------------------------- | ----------------------------- |
| GET    | `api/projects/{project}/users`        | List project members          |
| POST   | `api/projects/{project}/users`        | Add member to project         |
| GET    | `api/projects/{project}/users/{user}` | Get member details            |
| PUT    | `api/projects/{project}/users/{user}` | Update member role/permission |
| DELETE | `api/projects/{project}/users/{user}` | Remove member from project    |

### Tasks Management

| Method | Endpoint                              | Description        |
| ------ | ------------------------------------- | ------------------ |
| GET    | `api/projects/{project}/tasks`        | List project tasks |
| POST   | `api/projects/{project}/tasks`        | Create new task    |
| GET    | `api/projects/{project}/tasks/{task}` | Get task details   |
| PUT    | `api/projects/{project}/tasks/{task}` | Update task        |
| DELETE | `api/projects/{project}/tasks/{task}` | Delete task        |

### Task Comments

| Method | Endpoint                              | Description         |
| ------ | ------------------------------------- | ------------------- |
| GET    | `api/tasks/{task}/comments`           | List task comments  |
| POST   | `api/tasks/{task}/comments`           | Add comment to task |
| GET    | `api/tasks/{task}/comments/{comment}` | Get comment details |
| PUT    | `api/tasks/{task}/comments/{comment}` | Update comment      |
| DELETE | `api/tasks/{task}/comments/{comment}` | Delete comment      |

### Task Reminders

| Method | Endpoint                                | Description          |
| ------ | --------------------------------------- | -------------------- |
| GET    | `api/tasks/{task}/reminders`            | List task reminders  |
| POST   | `api/tasks/{task}/reminders`            | Create reminder      |
| GET    | `api/tasks/{task}/reminders/{reminder}` | Get reminder details |
| PUT    | `api/tasks/{task}/reminders/{reminder}` | Update reminder      |
| DELETE | `api/tasks/{task}/reminders/{reminder}` | Delete reminder      |

**Note:** All endpoints (except `/auth/register` and `/auth/login`) require JWT authentication via `Authorization: Bearer {token}` header.

## Database Structure

### Models

- **User** - System users with authentication
- **Project** - User projects with owner and members
- **Task** - Project tasks with status, priority, and due dates
- **ProjectMember** - Team members with roles and permissions
- **Comment** - Task comments for collaboration
- **Category** - Task categorization
- **Reminder** - Task reminders and notifications

### Key Relationships

```
User
├── Projects (owner)
├── Tasks (creator)
└── ProjectMembers

Project
├── Owner (User)
├── Members (ProjectMembers)
└── Tasks

Task
├── Creator (User)
├── Project
├── Comments
├── Reminders
└── Categories

Comment
└── Creator (User)

Reminder
└── Task
```

## Project Structure

```
tms/
├── app/
│   ├── Console/              # CLI commands
│   ├── Exceptions/           # Exception handlers
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Api/         # API Controllers
│   │   ├── Kernel.php       # HTTP middleware
│   │   └── Middleware/      # Custom middleware
│   ├── Models/              # Eloquent models
│   └── Providers/           # Service providers
├── bootstrap/               # Application bootstrapping
├── config/                  # Configuration files
├── database/
│   ├── factories/          # Model factories for testing
│   ├── migrations/         # Database migrations
│   └── seeders/            # Database seeders
├── public/                 # Publicly accessible files
├── resources/              # Frontend resources (views, CSS, JS)
├── routes/                 # API routes definition
├── storage/                # Application storage (logs, cache)
├── tests/                  # Feature and unit tests
├── composer.json           # PHP dependencies
└── package.json            # Node dependencies
```

## Testing

### Run PHPUnit Tests

```bash
php artisan test
```

### Run Specific Test

```bash
php artisan test tests/Feature/ExampleTest.php
```

## API Authentication

ATMS uses **JWT (JSON Web Tokens)** for stateless authentication:

1. **Register/Login** to obtain JWT token
2. **Include token** in request headers:
    ```
    Authorization: Bearer eyJhbGciOiJIUzI1NiIs...
    ```
3. Token persists across requests until expiration

### Sample Login Request

```bash
curl -X POST http://localhost:8000/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "user@example.com",
    "password": "password"
  }'
```

## CORS Configuration

CORS is configured to allow requests from all origins. Adjust in `config/cors.php` for production environments.

## Development Notes

- **MVC Pattern** - Controllers handle requests, Models manage data
- **Eloquent ORM** - Type-safe database queries
- **API Resources** - Consistent JSON response formatting
- **Resource Routing** - Automatic RESTful endpoints
- **Middleware** - JWT authentication on protected routes

## License

This project is open-source software licensed under the MIT license.
