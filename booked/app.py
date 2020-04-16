from flask import Flask
from flask import render_template , request,redirect,url_for
import sqlite3 as sql
import random
app = Flask(__name__)
ROW_ID=0
USER="User"
#MSG="Welcome Admin"
MOVIE=""
VENUE=""
SHOW_NO=""
NO_OF_TICKETS=0
DATE=""
EMAIL_ID=""
TID=0
AMOUNT=0
@app.route('/')
def showmovies():
   with sql.connect("movie_database.db") as con:
      cur = con.cursor()
      cur.execute("select m_name,m_rating,m_language,m_synopsis from movie order by m_release desc")
      rows=cur.fetchall()
      return render_template("movies.html",USER=USER,rows=rows)

@app.route('/showBookTickets/')
def showBookTickets():
   with sql.connect("movie_database.db") as con:
      cur = con.cursor()
      cur.execute("select m_name from movie")
      mnames=cur.fetchall()
      cur.execute("select v_name from venue")
      vnames=cur.fetchall()
      return render_template("tickets.html",USER=USER,mnames=mnames,vnames=vnames)


@app.route('/checkAvail',methods = ['POST', 'GET'])
def availability():
   flag=False
   print('INSIDE')
   if request.method == 'POST':
      movie = request.form['movie']
      venue = request.form['venue']
      show_no = request.form['show_no']
      no_of_tickets = int(request.form['no_of_tickets'])
      date = request.form['date']
      movie=movie[2:-3].strip()
      venue=venue[2:-3].strip()
      global MOVIE,VENUE,SHOW_NO,NO_OF_TICKETS,DATE
      MOVIE=movie
      VENUE=venue
      SHOW_NO=show_no
      NO_OF_TICKETS=no_of_tickets
      DATE=date
      no=0
      with sql.connect("movie_database.db") as con:
            cur = con.cursor()
            cur.execute("select v_capacity from venue where v_name=?",(venue,))
            v_capacity=str(cur.fetchall())
            no=v_capacity[2:-3]
            print(no)
            try:
               cur.execute("select no_of_tickets from book_ticket where m_name = ? and v_name = ? and show_no = ? and date = ?",(movie,venue,show_no,date))
               seatsAvailable=cur.fetchone()
            finally:
               seatsAvailable=0
            
   
            print(seatsAvailable)
            if(no>seatsAvailable):
               return redirect("/payment/")
            else:
               return render_template("tickets.html")
   con.commit()
   if(flag==True):
######SHOWMOVIES IS THE PAGE WHERE ALL THE TRAILERS AND STUFF ARE PRESENT#################
      return redirect("/showmovies/") 
   else:
      return redirect("/")

@app.route('/payment/')
def pay():
   global NO_OF_TICKETS,USER,MOVIE,VENUE,SHOW_NO,NO_OF_TICKETS,DATE,EMAIL_ID,AMOUNT,TID
   cost=int(NO_OF_TICKETS)*100
   AMOUNT=cost
   tid=random.randint(1,1000)
   TID=tid
   return render_template('payment.html',cost=cost,user=USER,movie=MOVIE,venue=VENUE,show_no=SHOW_NO,tickets=NO_OF_TICKETS,date=DATE,email=EMAIL_ID,tid=tid)

@app.route('/book',methods = ['POST', 'GET'])
def book():
   flag=False
   print('INSIDE')
   if request.method == 'POST':
      global MOVIE,VENUE,SHOW_NO,NO_OF_TICKETS,DATE,EMAIL_ID,TID,AMOUNT
      print(MOVIE)
      print(VENUE)
      print(SHOW_NO)
      print(NO_OF_TICKETS)
      print(DATE)
      print(EMAIL_ID)
      print(TID)
      print(AMOUNT)
      with sql.connect("movie_database.db") as con:
            cur = con.cursor()
            cur.execute("INSERT INTO BOOK_TICKET(NO_OF_TICKETS,M_NAME,SHOW_NO,DATE,V_NAME,V_EMAIL_ID) VALUES (?,?,?,?,?,?)",(NO_OF_TICKETS,MOVIE,SHOW_NO,DATE,VENUE,EMAIL_ID))
            print("insert into book_ticket success")
            cur.execute("INSERT INTO PAYMENT(V_EMAIL_ID,AMOUNT,TRANSACTION_ID) VALUES (?,?,?)",(EMAIL_ID,AMOUNT,TID))
            print("insert into PAYMENT success")
            flag=True
            
      con.commit()
   if(flag==True):
      return redirect(url_for('showmovies'))
   else:
      return redirect(url_for('showmovies'))


if __name__ == "__main__":
    app.run(debug=True)

