pipeline {
    agent any

    tools {
        jdk 'jdk25'
    }

    environment {
        SCANNER_HOME = tool 'SonarScanner'
        IMAGE_NAME = "student-crud"
    }

    stages {

        stage('Checkout Code') {
            steps {
                git branch: 'master',
                    url: 'https://github.com/mova-git/student-crud-project.git'
            }
        }

        stage('SonarQube Analysis') {
            steps {
                withSonarQubeEnv('sonarqube') {
                    bat """
                    "%SCANNER_HOME%\\bin\\sonar-scanner.bat" ^
                    -Dsonar.projectKey=student-crud ^
                    -Dsonar.projectName=StudentCRUD ^
                    -Dsonar.sources=app ^
                    -Dsonar.sourceEncoding=UTF-8
                    """
                }
            }
        }

        stage('Quality Gate') {
            steps {
                timeout(time: 5, unit: 'MINUTES') {
                    waitForQualityGate abortPipeline: false
                }
            }
        }

        stage('Build Docker Image') {
            steps {
                bat "docker build -t %IMAGE_NAME% ."
            }
        }

        stage('Trivy Scan') {
            steps {
                bat '"C:/Users/Dell/AppData/Local/Microsoft/WinGet/Packages/AquaSecurity.Trivy_Microsoft.Winget.Source_8wekyb3d8bbwe/trivy.exe" image %IMAGE_NAME%'
            }
        }

        stage('Deploy Application') {
            steps {
                bat "docker compose down"
                bat "docker compose up -d --build"
            }
        }

        stage('Verify Containers') {
            steps {
                bat "docker ps"
            }
        }
        stage('Check Python') {
            steps {
                  bat '''
                "C:\\Users\\Dell\\AppData\\Local\\Programs\\Python\\Python312\\python.exe" --version
                "C:\\Users\\Dell\\AppData\\Local\\Programs\\Python\\Python312\\python.exe" -m pip list
                '''
            }
        }
        stage('Generate Excel Report') {
            steps {
                bat '''
                    "C:\\Users\\Dell\\AppData\\Local\\Programs\\Python\\Python312\\python.exe" -m pip list
                    "C:\\Users\\Dell\\AppData\\Local\\Programs\\Python\\Python312\\python.exe" -m pip install pandas
                    "C:\\Users\\Dell\\AppData\\Local\\Programs\\Python\\Python312\\python.exe" -m pip install mysql-connector-python
                    "C:\\Users\\Dell\\AppData\\Local\\Programs\\Python\\Python312\\python.exe" -m pip install openpyxl
                    "C:\\Users\\Dell\\AppData\\Local\\Programs\\Python\\Python312\\python.exe" scripts\\report.py
                '''
            }
        }
        stage('Send Email') {
    steps {
        emailext(
            subject: "Student CRUD Pipeline - Build #${BUILD_NUMBER}",
            body: """
Hello,

The Jenkins pipeline completed successfully.

Please find the attached Student Report.

Job Name: ${JOB_NAME}
Build Number: ${BUILD_NUMBER}
Build URL: ${BUILD_URL}

Regards,
Jenkins
""",
            to: "mauriya1999@gmail.com",
            attachmentsPattern: "reports/*.xlsx"
        )
    }
}

    }

    post {

        success {
            archiveArtifacts artifacts: 'reports/*.xlsx', fingerprint: true
            emailext(
                subject: "SUCCESS : Student CRUD Deployment",
                body: """
Hello,

Jenkins Pipeline executed successfully.

Completed Stages:
✔ Checkout
✔ SonarQube Scan
✔ Quality Gate
✔ Docker Build
✔ Trivy Scan
✔ Deployment
✔ Excel Report Generation

Regards,
Jenkins
""",
                to: "mauriya1999@gmail.com",
                attachmentsPattern: "reports/Student_Report.xlsx"
            )
        }

        failure {
            emailext(
                subject: "FAILED : Student CRUD Deployment",
                body: """
Hello,

Jenkins Pipeline failed.

Please check the Jenkins Console Output.

Regards,
Jenkins
""",
                to: "mauriya1999@gmail.com"
            )
        }

        always {
            echo "Pipeline execution completed."
        }
    }
}