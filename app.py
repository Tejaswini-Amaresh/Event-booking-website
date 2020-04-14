#from flask import Flask, render_template
from flask import Flask, url_for, render_template, request, redirect, session
#from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
'''app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///users.db'
db = SQLAlchemy(app)'''

@app.route('/')
def enter():
	return render_template('enter.html')

@app.route('/movie')
def first():
   return render_template('movies/index.html')

@app.route('/avengers')
def avengers():
   return render_template('movies/avengers.html')

@app.route('/frozen')
def frozen():
   return render_template('movies/frozen.html')

@app.route('/bloodshot')
def bloodshot():
   return render_template('movies/bloodshot.html')


@app.route('/dolittle')
def dolittle():
	return render_template('movies/dolittle.html')

@app.route('/john')
def john():
	return render_template('movies/john.html')

@app.route('/spider')
def spider():
	return render_template('movies/spider.html')

@app.route('/bb')
def bb():
	return render_template('movies/bb.html')

@app.route('/pirates')
def pirates():
	return render_template('movies/pirates.html')

@app.route('/fifty')
def fifty():
	return render_template('movies/fifty.html')

@app.route('/trans')
def trans():
	return render_template('movies/trans.html')

@app.route('/xxx')
def xxx():
	return render_template('movies/xxx.html')

@app.route('/space')
def space():
	return render_template('movies/space.html')

@app.route('/book')
def book_now():
	return render_template('index.html')

#app = Flask(__name__)

'''

class User(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(100), unique=True)
    password = db.Column(db.String(100))

    def __init__(self, username, password):
        self.username = username
        self.password = password


@app.route('/loginfirst', methods=['GET'])
def index():
    if session.get('logged_in'):
        return render_template('login/home.html')
    else:
        return render_template('login/index.html', message="Click here to Log-In/Register")


@app.route('/register/', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        try:
            db.session.add(User(username=request.form['username'], password=request.form['password']))
            db.session.commit()
            return redirect(url_for('login'))
        except:
            return render_template('login/index.html', message="User Already Exists")
    else:
        return render_template('login/register.html')


@app.route('/login/', methods=['GET', 'POST'])
def login():
    if request.method == 'GET':
        return render_template('login/login.html')
    else:
        u = request.form['username']
        p = request.form['password']
        data = User.query.filter_by(username=u, password=p).first()
        if data is not None:
            session['logged_in'] = True
            return redirect(url_for('index'))
        return render_template('login/index.html', message="Incorrect Details")


@app.route('/logout', methods=['GET', 'POST'])
def logout():
    session['logged_in'] = False
    return redirect(url_for('movie/index'))'''


if __name__ == '__main__':
    #app.secret_key = "ThisIsNotASecret:p"
    #db.create_all()
    app.run(debug=True)
