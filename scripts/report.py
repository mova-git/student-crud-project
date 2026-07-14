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

output_dir = r"D:\login-db-project\reports"
os.makedirs("output_dir", exist_ok=True)

output_file = os.path.join(output_dir, "Student_Report.xlsx")
df.to_excel("reports/Student_Report.xlsx", index=False)

print("Excel Report Generated Successfully!")
print(f"Location: {output_file}")

conn.close()