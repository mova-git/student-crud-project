import smtplib
from email.message import EmailMessage

msg = EmailMessage()

msg['Subject'] = 'Student Report'
msg['From'] = 'prawinsankar.d@gmail.com'
msg['To'] = 'mauriya1999@gmail.com'

msg.set_content("Please find the attached report.")

with open("Student_Report.xlsx","rb") as f:
    msg.add_attachment(
        f.read(),
        maintype="application",
        subtype="vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        filename="Student_Report.xlsx"
    )

server = smtplib.SMTP('smtp.gmail.com',587)
server.starttls()
server.login("prawinsankar.d@gmail.com","AppPassword")
server.send_message(msg)
server.quit()