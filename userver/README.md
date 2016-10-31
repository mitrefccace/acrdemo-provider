# USERVER
#### This is the README file for the FCC Task 3 RESTful Server for accessing the portal database.

## Installation Instructions
### Configure corporate proxy server
1. npm config set proxy _HTTP-PROXY-URL_
1. npm config set https-proxy _HTTPS-PROXY-URL_

#### Installing Node.js
1. On Windows... https://nodejs.org/en/
1. on Linux...
    1. sudo apt-get update
	1. sudo apt-get install nodejs
  1. sudo ln -s /usr/bin/nodejs /usr/bin/node
	1. sudo apt-get install npm
1. Clone this repo
1. From the command line...
    1. cd userver
    1. npm init
    1. npm install express --save
    1. npm install body-parser --save
    1. npm install mysql --save
    1. npm install clear --save
    1. npm install --save
    1. node app.js

#### Running the Server in AWS
Usage:  
nodejs app.js [ port ]

#### Testing the Server in AWS
* curl --request GET http://localhost:8082
* curl --request GET http://localhost:8082/vrsverify/?vrsnum=1000
* curl --request GET http://localhost:8082/getallvrsrecs
* curl -H "Content-Type: application/json" -X PUT -d '{"vrsnum":"1000","fieldname":"last_name","fieldvalue":"Spacey"}'  http://localhost:8082/vrsupdate

# SERVICE API

----

#vrsverify

  _Verify a VRS number._

* **URL**

  _/vrsverify/:vrsnum_

* **Method:**

   `GET`

*  **URL Params**

   **Required:**

   `vrsnum=[integer]`

   **Optional:**

   _None._

* **Data Params**

  _None._

* **Success Response:**

  * **Code:** 200, **Content:** `{
	"message": "success",
	"data": [{
		"vrs": 1000,
		"username": "user1",
		"password": "password1",
		"first_name": "Rick",
		"last_name": "Grimes",
		"address": "1 Walking Way",
		"city": "Eatontown",
		"state": "NJ",
		"zip_code": "07724",
		"email": "root@comp.org"
	}]
}`

* **Error Response:**
  * **Code:** 400 BAD REQUEST, **Content:** `{'message': 'missing vrsnum'}`
  * **Code:** 500 INTERNAL SERVER ERROR, **Content:** `{'message': 'mysql error'}`
  * **Code:** 404 NOT FOUND, **Content:** `{'message': 'vrs number not found'}`
  * **Code:** 501 NOT IMPLEMENTED, **Content:** `{'message': 'records returned is not 1'}`

* **Sample Call:**

  http://localhost:8082/vrsverify/?vrsnum=1000

* **Notes:**

  _None._

----
#getallvrsrecs

  _Get all the VRS records in the user database._

* **URL**

  _/getallvrsrecs_

* **Method:**

   `GET`

*  **URL Params**

   **Required:**

   _None._

   **Optional:**

   _None._

* **Data Params**

  _None._

* **Success Response:**

  * **Code:** 200, **Content:** `{"message":"success","data":[{"vrs":1000,"username":"user1","password":"password1","first_name":"Rick","last_name":"Grimes","address":"1 Walking Way","city":"Eatontown","state":"NJ","zip_code":"07724","email":"root@comp.org"},{"vrs":1001,"username":"user2","password":"password2","first_name":"John","last_name":"Smith","address":"10 Industrial Way","city":"Eatontown","state":"NJ","zip_code":"07724","email":"jsmith@gmail.com"}, ... ,{"vrs":1006,"username":"user3","password":"password3","first_name":"Root","last_name":"Beer","address":"1 Supermarket Way","city":"Freehold","state":"NJ","zip_code":"07728","email":"root@root.com"}]}`

* **Error Response:**
  * **Code:** 500 INTERNAL SERVER ERROR, **Content:** `{'message': 'mysql error'}`
  * **Code:** 204 NO CONTENT, **Content:** `{'message': 'vrs number not found'}`

* **Sample Call:**

  http://localhost:8082/getallvrsrecs

* **Notes:**

  _None._

----

##Test Service

_This is just a test service to quickly check the connection._

* **URL**

  _/_

* **Method:**

  `GET`

*  **URL Params**

   _None._

   **Required:**

   _None._

   **Optional:**

   _None._

* **Data Params**

  _None._

* **Success Response:**
  * **Code:** 200
  * **Content:** `{ id : 12 }`

* **Error Response:**

  _None._

* **Sample Call:**

  http://localhost:8082/

* **Notes:**

  _None._

----

##vrsupdate

_Update a VRS record in the user database._

  * **URL**

    _/vrsupdate_

  * **Method:**

     `PUT`

  *  **URL Params**

     **Required:**

     _None._

     **Optional:**

     _None._

  * **Data Params**
  _The fieldname must much a field name in the user_data table. Valid fields: first_name, last_name, address, city, state, zip_code, email_
  `{
      "vrsnum":"1000",
      "fieldname":"last_name",
      "fieldvalue":"Spacey"
  }`

  * **Success Response:**

    * **Code:** 200, **Content:** `{'message':'success'}`

  * **Error Response:**
    * **Code:** 400 BAD REQUEST, **Content:** `{'message':'missing vrsnum, fieldname, or fieldvalue field(s)'}`
    * **Code:** 404 NOT FOUND, **Content:** `{'message':'record not found'}`
    * **Code:** 409 CONFLICT, **Content:** `{'message':'you may not modify the vrs number'}`
    * **Code:** 500 INTERNAL SERVER ERROR, **Content:** `{'message': 'mysql error'}`
    * **Code:** 501 NOT IMPLEMENTED, **Content:** `{'message': 'records returned is not 1'}`

  * **Sample Call:**

    http://localhost:8082/vrsupdate/

  * **Notes:**

    _None._
