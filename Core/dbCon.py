import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="10460998",
    database="movierec"
)
db = mydb.cursor()