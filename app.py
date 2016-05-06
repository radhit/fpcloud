import json
import os
from flask import Flask, request, redirect, jsonify

import MySQLdb
import MySQLdb.cursors
import bcrypt
import datetime
import time

from flask.ext.bcrypt import Bcrypt

app = Flask(__name__)
bcrypt = Bcrypt(app)


@app.route("/getUser", methods=['GET'])
def gettuser():
	db = MySQLdb.connect("localhost", "root", "root","docoline",cursorclass=MySQLdb.cursors.DictCursor)
	cur = db.cursor()
	query = "SELECT nama_user,email,username,paidstatus,buktipembayaran,id from user"
	cur.execute(query)
	return jsonify(data=cur.fetchall())

@app.route("/Register",methods=['POST'])
def register():
           db = MySQLdb.connect("localhost", "root", "root","docoline")
           cur = db.cursor()
           nama=request.form['nama']
           email=request.form['email']
           username=request.form['username']
           password=request.form['password']
           passbc=bcrypt.generate_password_hash(password,10)
           passok=passbc.replace("$2b$","$2y$")
           xx=time.time()
           st = datetime.datetime.fromtimestamp(xx).strftime('%Y-%m-%d')
         
       
           cur.execute("""INSERT INTO user (nama_user,password,email,username,dateregispaid) VALUES(%s,%s,%s,%s,%s)""", (nama,passok,email,username,st))
           db.commit()
           return redirect("http://10.151.36.100:8080/login",code=302)

        
@app.route("/getdatauser/<int:id>",methods=["get"])
def getData(id):
         db = MySQLdb.connect("localhost", "root", "root","docoline",cursorclass=MySQLdb.cursors.DictCursor)
         cur = db.cursor()
         query = "SELECT * from user where id=%d" %id
         cur.execute(query)
         return jsonify(data=cur.fetchall())

@app.route("/updateuser/<int:id>",methods=['POST'])
def update(id):
        db = MySQLdb.connect("localhost", "root", "root","docoline")
        cur = db.cursor()
        nama=request.form['nama']
        email=request.form['email']
        username=request.form['username']
        password=request.form['password']
        passbc=bcrypt.generate_password_hash(password,10)
        passok=passbc.replace("$2b$","$2y$")
        status=request.form['status']
         
       
        cur.execute("""UPDATE user SET nama_user=%s, password=%s, email=%s, username=%s,paidstatus=%s where id=%d) """, (nama,passok,email,username,status))%id
        db.commit()
        return redirect("http://10.151.36.100:8080/profil",code=302)
        
@app.route("/tambahdokumen",methods=["POST"])
def tambahdokumen():
        db = MySQLdb.connect("localhost", "root", "root","docoline")
        cur = db.cursor()
        judul=request.form['judul']
        password=request.form['password']
        author=request.form['author']
        xx=time.time()
        st = datetime.datetime.fromtimestamp(xx).strftime('%Y-%m-%d %H:%M:%S')
        cur.execute("""INSERT INTO file (author,password,judul,timestamp) VALUES(%s,%s,%s,%s)""", (author,password,judul,st))
        db.commit()
        return redirect("http://10.151.36.100:8080/dashboard",code=302)


        
@app.route("/getdatafileuser/<int:id>",methods=["get"])
def getDatafile(id):
         db = MySQLdb.connect("localhost", "root", "root","docoline",cursorclass=MySQLdb.cursors.DictCursor)
         cur = db.cursor()
         query = "SELECT * from file where author=%d" %id
         cur.execute(query)
         return jsonify(data=cur.fetchall())
        
@app.route("/getdatasharedfileuser/<int:id>",methods=["get"])
def getDatasharedfile(id):
         db = MySQLdb.connect("localhost", "root", "root","docoline",cursorclass=MySQLdb.cursors.DictCursor)
         cur = db.cursor()
         query = "SELECT * from file,kontributor where file.id=kontributor.id_file and kontributor.id_user=%d" %id
         cur.execute(query)
         return jsonify(data=cur.fetchall())

        

        
        
        

           

if __name__ == "__main__":
	port = int(os.environ.get('PORT', 5000))
	app.debug = True
	app.run(host='0.0.0.0', port=port)
	
