# Student CRUD Application using Docker, Jenkins, SonarQube and Trivy

## Project Overview

This project is a simple **Student Management System** developed using **PHP**, **MySQL**, **HTML**, and **CSS**. It demonstrates CRUD (Create, Read, Update, Delete) operations and is integrated with a DevOps CI/CD pipeline using **GitHub**, **Jenkins**, **SonarQube**, **Docker**, **Docker Compose**, and **Trivy**.

---

## Technologies Used

* HTML5
* CSS3
* PHP 8.2
* MySQL 8.0
* Docker
* Docker Compose
* Git & GitHub
* Jenkins
* SonarQube
* Trivy

---

## Project Structure

```
student-crud-project/
│
├── app/
│   ├── index.php
│   ├── db.php
│   ├── insert.php
│   ├── update.php
│   ├── delete.php
│   ├── edit.php
│   ├── view.php
│   └── style.css
│
├── database/
│   └── student.sql
│
├── Dockerfile
├── docker-compose.yml
├── Jenkinsfile
├── sonar-project.properties
├── README.md
└── .gitignore
```

---

## Features

* Add Student
* Search Student
* View Student Details
* Update Student Information
* Delete Student Record
* MySQL Database Integration
* Dockerized Application
* Jenkins CI/CD Pipeline
* SonarQube Code Analysis
* Trivy Docker Image Security Scan

---

## Database Table

| Column     | Type         |
| ---------- | ------------ |
| ID         | INT          |
| Name       | VARCHAR(100) |
| Department | VARCHAR(100) |
| Age        | INT          |
| Email      | VARCHAR(100) |

---

## Running the Application

### Clone the Repository

```bash
git clone https://github.com/<YOUR_GITHUB_USERNAME>/student-crud-project.git
```

```
cd student-crud-project
```

---

### Build Docker Image

```bash
docker compose build
```

---

### Run the Containers

```bash
docker compose up -d
```

---

### Verify Running Containers

```bash
docker ps
```

---

### Open the Application

```
http://localhost:8080
```

---

## Jenkins Pipeline

The Jenkins pipeline performs the following steps:

1. Checkout source code from GitHub.
2. Run SonarQube analysis.
3. Verify the SonarQube Quality Gate.
4. Build the Docker image.
5. Scan the Docker image using Trivy.
6. Deploy the application using Docker Compose.
7. Verify the running containers.

---

## SonarQube

The project uses SonarQube to analyze:

* Code Smells
* Bugs
* Vulnerabilities
* Security Hotspots
* Maintainability
* Reliability

---

## Trivy

Trivy scans the Docker image for:

* Operating System vulnerabilities
* Library vulnerabilities
* High severity issues
* Critical severity issues

Example command:

```bash
trivy image student-crud
```

---

## Docker Commands

Build the image:

```bash
docker build -t student-crud .
```

Run Docker Compose:

```bash
docker compose up -d
```

Stop the containers:

```bash
docker compose down
```

View running containers:

```bash
docker ps
```

---

## Jenkins Pipeline Flow

```
GitHub
   │
   ▼
Jenkins
   │
   ├── Checkout Code
   ├── SonarQube Analysis
   ├── Quality Gate
   ├── Docker Build
   ├── Trivy Scan
   ├── Docker Compose Deploy
   └── Verify Deployment
```

---

## Future Improvements

* User Authentication
* Bootstrap UI
* Search by Name
* Pagination
* REST API
* Docker Hub Image Push
* Amazon ECR Integration
* Kubernetes Deployment
* AWS EC2 Deployment

---

## Author

**Mauriya S S**

---

## License

This project is intended for learning and educational purposes.
