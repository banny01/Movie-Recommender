import pandas as pd
import dbCon as con
import RecommenderSystem as rec


users = pd.read_csv('users.csv', sep=';')
friends = pd.read_csv('friends.csv', sep=';')
#print(friends.head)
#print(users.head)
sql = "SELECT loggedUID FROM loggeduser"
con.db.execute(sql)
result = con.db.fetchall()
#print(result[0][0])
loggedUID = result[0][0]

sql2 = "SELECT COUNT(*) FROM recmovies WHERE uid = %s"%(loggedUID)
con.db.execute(sql2)
res = con.db.fetchall()
#res = con.db.rowcount
#print(res[0][0])
#for x in result:
#  print(x)

if(res[0][0]==0): #New User
    sql3 = "SELECT movie FROM selectone WHERE id = 1"
    con.db.execute(sql3)
    movie = con.db.fetchall()

    if (movie[0][0] != ''):
        sql7 = "SELECT COUNT(*) FROM selecthistory WHERE uid = %s AND movie = '%s';" % (loggedUID, movie[0][0])
        # print(sql7)
        con.db.execute(sql7)
        res = con.db.fetchall()
        # print(res)
        if (res[0][0] == 0):
            recMovies = rec.recommender(movie[0][0].replace(">", "'"))
            print(recMovies)
            movies = []
            movies = recMovies.index
            len = len(movies)
            if (len > 16):
                len = 16

            else:
                len = len
            # print(len)
            x = 1
            for i in range(len - 1):
                sql5 = "INSERT INTO recmovies (uid,movieName) VALUES (%s,'%s')" % (
                    loggedUID, movies[x].replace("'", ""))
                print(sql5)
                con.db.execute(sql5)
                # time.sleep(1)
                x = x + 1
            # print(index[0])

            sql6 = "INSERT INTO selecthistory (uid,movie) VALUES (%s,'%s')" % (loggedUID, movie[0][0].replace("'", ""))
            con.db.execute(sql6)
            sql4 = "UPDATE selectone SET movie = '' WHERE id = 1"
            con.db.execute(sql4)


else: #Old User
    sql3 = "SELECT movie FROM selectone WHERE id = 1"
    con.db.execute(sql3)
    movie = con.db.fetchall()

    if (movie[0][0] != ''):
        sql7 = "SELECT COUNT(*) FROM selecthistory WHERE uid = %s AND movie = '%s';"%(loggedUID,movie[0][0])
        #print(sql7)
        con.db.execute(sql7)
        res = con.db.fetchall()
        #print(res)
        if(res[0][0]==0):
            recMovies = rec.recommender(movie[0][0].replace(">", "'"))
            print(recMovies)
            movies = []
            movies = recMovies.index
            len = len(movies)
            if (len > 16):
                len = 16

            else:
                len = len
            # print(len)
            x = 1
            for i in range(len - 1):
                sql5 = "INSERT INTO recmovies (uid,movieName) VALUES (%s,'%s')" % (
                loggedUID, movies[x].replace("'", ""))
                print(sql5)
                con.db.execute(sql5)
                # time.sleep(1)
                x = x + 1
            # print(index[0])

            sql6 = "INSERT INTO selecthistory (uid,movie) VALUES (%s,'%s')" % (loggedUID, movie[0][0].replace("'", ""))
            con.db.execute(sql6)
            sql4 = "UPDATE selectone SET movie = '' WHERE id = 1"
            con.db.execute(sql4)



