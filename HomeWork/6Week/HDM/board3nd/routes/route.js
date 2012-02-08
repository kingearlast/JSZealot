
var clog = require('clog');

exports.dateTime = function(req, res, next){
	
	var date = new Date().toLocaleDateString();
	var time = new Date().toLocaleTimeString();
	// clog.info( 'Date :' + date );
	// clog.info( 'Time :' + time );
	var dateTime = date + time;
	req.dateTime = dateTime;
	if ( next ){
		next();
	}
	
}

