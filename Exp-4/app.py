from flask import Flask, request, render_template, session, redirect, url_for
from flask_session import Session
import mysql.connector

app = Flask(__name__)
app.secret_key = "12345678"
app.config['SESSION_TYPE'] = 'filesystem'
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'cart'

Session(app)

def initialize_database():
    connection = mysql.connector.connect(
        host=app.config['MYSQL_HOST'],
        user=app.config['MYSQL_USER'],
        password=app.config['MYSQL_PASSWORD'],
        database=app.config['MYSQL_DB']
    )
    return connection

@app.route('/', methods=["GET"])
def index():
    return render_template('index.html')

@app.route('/login', methods=["GET", "POST"])
def login():
    if request.method == 'POST':
        uemail = request.form.get("uemail")
        upassword = request.form.get("upassword")

        connection = initialize_database()
        cursor = connection.cursor()
        cursor.execute("SELECT * FROM users WHERE email = %s AND password = %s", (uemail, upassword))
        user = cursor.fetchone()
        cursor.close()
        connection.close()

        if user:
            session['email'] = user[0]
            print(session)
            return redirect(url_for('cart'))
        else:
            return "INVALID CREDENTIALS"

    return render_template('login.html')

@app.route('/reset', methods=["GET", "POST"])
def reset():
    if request.method == 'POST':
        uemail = request.form.get("uemail")
        upassword = request.form.get("upassword")
        uname = request.form.get("name")
        udob = request.form.get("dob")
        
        if not upassword:  # Check if password is empty
            return "Password cannot be empty"
        
        connection = initialize_database()
        cursor = connection.cursor()
        cursor.execute("INSERT INTO users (email, password, name, dob) VALUES (%s, %s, %s, %s)",
                       (uemail, upassword, uname, udob))
        connection.commit()
        cursor.close()
        connection.close()
        return redirect(url_for('login'))  # Redirect to login page after registration

    return render_template('reset.html')
@app.route('/logout', methods=["POST"])
def logout():
    session.pop("username", None)  # Remove the username from the session
    return redirect(url_for("index"))
@app.route('/cart', methods=["GET", "POST"])
def cart():
    if 'email' in session:
        return render_template('cart.html')
    else:
        return redirect(url_for('login'))

@app.route('/bill', methods=["GET", "POST"])
def bill():
    return render_template('bill.html')

if __name__ == '__main__':
    app.run(host='0.0.0.0', debug=True)
