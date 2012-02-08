
exports.defineModel = function(mongoose, fn){
	
	var Schema = mongoose.Schema;
	var ObjectId = Schema.ObjectId;

	var Member = new Schema({
		id : { type : String, unique : true },
		password : String,
		socialNumber : { type : String, unique : true },
		name : String,
		telNumber : String,
		emailId : String,
		emailDomain : String,
		emailDomainSelect : String
	});
	
	
	var Board = new Schema({
		seq : { type : Number, unique : true},
		title : String,
		content : String,
		category : String,
		writerId : String,
		regDate : String,
		visitCount : { type : Number, default : 0 }
	});
	
	mongoose.model('Member', Member);
	mongoose.model('Board', Board);
	
	fn();
}

