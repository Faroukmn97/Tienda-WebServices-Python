import json
from flask import Flask,jsonify, request
from flask.json import jsonify
from flask_cors import CORS, cross_origin

app = Flask(__name__)
cors = CORS(app)
app.config['CORS_HEADERS'] = 'Content-Type'


class validcardstore:
    def __init__(N, code):
        N.code = code
    def validcard(N):
        T=""; par=0;impar=0;X=""
        if not N.code.isdigit():
            data = jsonify({'band': 1, 'type': '', 'state': False})
            return data 
        if len(N.code) <14 or len(N.code)> 19: 
            data = jsonify({'band': 2, 'type': '', 'state': False})
            return data 
        for c in range(0,len(N.code),2):       
            X=str(int(N.code[c])*2)       
            if len(X)==2:   
                par+=( int(X[0]) + int(X[1]) )
            else:par+=int(X)
        for c in range(1,len(N.code),2):
            impar+=int(N.code[c])
        if (par+impar)%10!=0:
            data = jsonify({'band': 3, 'type': '', 'state': False})
            return data 
        if int(N.code[0:2])>49 and int(N.code[0:2])<56:
            T="*MasterCard*"
        if N.code[0:2]=="34" or N.code[0:2]==37:
            T="*America Express*"
        if N.code[0]=="4":
            T="*VISA*"
        if N.code[0:2] in ["60","62","64","65"]:
            T="*Discover*"  
        data = jsonify({'band': 4, 'type': T, 'state': True})
        return data  

@cross_origin()

@app.errorhandler(404)
def not_found(error):
    return "Not Found."

@app.route('/',methods=['GET'])
def Index():
    return jsonify({'Mensaje':'Bienvenido'})

@app.route('/validcardstore', methods=['POST'])
def validcard():
    datajson = request.get_json(force=True)
    cardnumer = datajson['cardnumer']
    cardname = datajson['cardname']
    cardmonth = datajson['cardmonth']
    cardyear = datajson['cardyear']
    cardccv = datajson['cardccv']
    obj =validcardstore(cardnumer)
    data = obj.validcard()
    print(data)
    return obj.validcard()
    

if __name__ == '__main__':
    app.run(port = 5000, debug = False)   

