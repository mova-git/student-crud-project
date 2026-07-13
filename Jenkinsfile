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
                    %SCANNER_HOME%\\bin\\sonar-scanner.bat ^
                    -Dsonar.projectKey=student-crud ^
                    -Dsonar.projectName=StudentCRUD ^
                    -Dsonar.sources=. ^
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

        stage('Deploy Application') {
            steps {
                bat "docker compose up -d"
            }
        }

        stage('Verify Deployment') {
            steps {
                bat "docker ps"
            }
        }
        stage('Generate Excel Report') {
            steps {
                bat "python scripts\\report.py"
            }
        }
    }

    post {
        success {
                       emailext(

                subject: "SUCCESS : Student CRUD Deployment",

                body: """

                Hello,

                Jenkins Pipeline executed successfully.

                Stages Completed

                ✔ Git Checkout

                ✔ SonarQube Scan

                ✔ Docker Build

                ✔ Trivy Scan

                ✔ Docker Deployment

                ✔ Excel Report Generated

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

                Jenkins Pipeline Failed.

                Please check the Console Output.

                """,

                to: "mauriya1999@gmail.com"

            )
        }

        always {
            echo 'Pipeline execution finished.'
        }
    }
}