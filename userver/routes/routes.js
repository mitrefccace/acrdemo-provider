// Define the different REST service routes in this file.

var appRouter = function(app,connection) {

  //VRSVERIFY
  //GET request; e.g. http://localhost:8082/vrsverify/?vrsnum=1000
  app.get('/vrsverify', function(req, res) {
    if (!req.query.vrsnum) {
      return res.status(400).send({'message': 'missing vrsnum'});
    } else {
      //Query DB for vrs number
      connection.query('SELECT * FROM user_data WHERE vrs = ?',req.query.vrsnum , function(err, rows, fields) {
        if (err) {
          console.log(err);
          return res.status(500).send({'message': 'mysql error'});
        } else if (rows.length === 1) {
          //success
          json = JSON.stringify(rows);
          res.status(200).send({'message': 'success', 'data':rows});
        } else if (rows.length === 0) {
          return res.status(404).send({'message': 'vrs number not found'});
        } else {
          console.log('error - records returned is ' + rows.length);
          return res.status(501).send({'message': 'records returned is not 1'});
        }
      });
    }
  });

  //GETALLVRSRECS
  //GET request; e.g. http://localhost:8082/getallvrsrecs
  app.get('/getallvrsrecs', function(req, res) {
    //Query DB for vrs number
    connection.query('SELECT * FROM user_data ORDER BY vrs', function(err, rows, fields) {
      if (err) {
        console.log(err);
        return res.status(500).send({'message': 'mysql error'});
      } else if (rows.length > 0) {
        //success
        json = JSON.stringify(rows);
        res.status(200).send({'message': 'success', 'data':rows});
      } else if (rows.length === 0) {
        return res.status(204).send({'message': 'no vrs records'});
      }
    });
  });

  // This is just for testing
  // GET request; e.g. http://localhost:8082/
  app.get('/', function(req, res) {
    return res.status(200).send({'message': 'Welcome to the VRS verification portal.'});
  });

  //VRSUPDATE
  //PUT request; e.g. http://localhost:8082/vrsupdate
  app.put('/vrsupdate', function(req, res) {
    if (!req.body.vrsnum || !req.body.fieldname || !req.body.fieldvalue) {
      return res.status(400).send({'message': 'missing vrsnum, fieldname, or fieldvalue field(s)'});
    } else if (req.body.fieldname === 'vrs' || req.body.fieldname === 'username' || req.body.fieldname === 'password' || req.body.fieldname === 'isAdmin') {
      //do not allow update of vrs key field
      return res.status(409).send({'message': 'you may not modify this field'});
    } else {
      //Query DB for vrs number
      connection.query('SELECT * FROM user_data WHERE vrs = ?',req.body.vrsnum , function(err, rows, fields) {
        if (err) {
          console.log(err);
          return res.status(500).send({'message': 'mysql error'});
        } else if (rows.length === 1) {
          //success - found the record
          connection.query('UPDATE user_data SET ' + req.body.fieldname + ' = ? WHERE vrs = ? ',[req.body.fieldvalue,req.body.vrsnum], function(err, rows, fields) {
            if (err) {
              console.log(err);
              return res.status(500).send({'message': 'mysql error'});
            } else {
              //successful update
              res.status(200).send({'message': 'success'});
            }
          });
        } else if (rows.length === 0) {
          return res.status(404).send({'message': 'record not found'});
        } else {
          // shouldn't reach here
          console.log('error - records returned is ' + rows.length);
          return res.status(501).send({'message': 'records returned is not 1'});
        }
      });
    }
  });

};

module.exports = appRouter;
