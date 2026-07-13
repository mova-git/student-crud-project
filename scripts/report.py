import pandas as pd
import mysql.connector
import os

conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="root",
    database="studentdb"
)

query = "SELECT * FROM students"

df = pd.read_sql(query, conn)

os.makedirs("reports", exist_ok=True)

df.to_excel("reports/Student_Report.xlsx", index=False)

print("Excel Report Generated Successfully!")

conn.close()