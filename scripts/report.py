import pandas as pd
import mysql.connector
import os

try:
    conn = mysql.connector.connect(
        host="localhost",
        user="root",
        password="root",
        database="studentdb"
    )

    print("Connected to MySQL")

    query = "SELECT * FROM students"
    df = pd.read_sql(query, conn)

    print(df)

    output_dir = r"D:\login-db-project\reports"
    os.makedirs(output_dir, exist_ok=True)

    output_file = os.path.join(output_dir, "Student_Report.xlsx")

    df.to_excel(output_file, index=False)

    print("Excel Report Generated Successfully!")
    print("Saved at:", output_file)

    conn.close()

except Exception as e:
    print("ERROR:")
    print(e)