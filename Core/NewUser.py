import pandas as pd
import csv
import dbCon as con
import sys

#input number you want to search
sql = "SELECT loggedUID FROM loggeduser"
con.db.execute(sql)
result = con.db.fetchall()
loggedUID = result[0][0]

sql = "SELECT * FROM users WHERE id = %s"%(loggedUID)
con.db.execute(sql)
result = con.db.fetchall()
birthYear = result[0][2]
gender = result[0][3]

#read csvs
friendsList = csv.reader(open('friends.csv', "rb"), delimiter=";")
users = csv.reader(open('users.csv', "rb"), delimiter=";")
uData = csv.reader(open('u.data', "rb"), delimiter="\t")
print(users)


#loop through csv list
#for row in friendsList:
 #   #if current rows 2nd value is equal to input, print that row
  #  if loggedUID[0][0] == row[1]:
   #      print(row)

