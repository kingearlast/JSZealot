
/**
 * Module dependencies.
 */
var sys = require('sys');
var clog = require('clog');
var express = require('express');
var mongoose = require('mongoose');
var routes = require('./routes/route.js');
var models = require('./models.js');
var app = module.exports = express.createServer();
var db;
var Member;
var Board;
var page = require('./common/page.js');
var validator = require('./routes/validator.js');

// Configuration

app.configure(function(){
  app.set('views', __dirname + '/views');
  //app.set('view engine', 'jade');
  app.set('view engine', 'ejs');
  //app.set('view options', {layout : false}); 
  app.register('.html', require('ejs'));
  //app.use(express.favicon());
  app.use(express.bodyParser());
  app.use(express.cookieParser());
  app.use(express.session({ secret: "string", cookie:{expires:false} })); 
  // 쿠키 객체의 expires 속성을 false로하면 브라우저 종료시 세션 삭제, maxAge 속성도존재함 
  app.use(express.methodOverride());
  app.use(app.router);
  app.use(express.static(__dirname + '/public'));
  app.dynamicHelpers({
  	session : function(req, res){
  		return req.session;
  	}
  });
});

app.configure('development', function(){
  app.set('db-uri', 'mongodb://localhost/devapp');
  app.use(express.errorHandler({ dumpExceptions: true, showStack: true })); 
});

app.configure('production', function(){
  app.set('db-uri', 'mongodb://localhost/prdapp');
  app.use(express.errorHandler()); 
});

// ORM 
models.defineModel(mongoose, function(){
	db = mongoose.connect(app.set('db-uri'));
	Member = mongoose.model('Member');
	Board = mongoose.model('Board');
});


// Routes
app.get('/', function(req, res){
	var pageIndex = req.query.pageIndex || 1;
	var skipResult = page.getSkipResult(pageIndex, page.DEFAULT_PAGE_SIZE);
	clog.info('pageIndex :' + pageIndex + '  skipResult :' + skipResult);
	Board.count(function(err, totalCnt){
		Board.find().skip(skipResult).limit(page.DEFAULT_PAGE_SIZE).run(function(err, boardList){
			res.local('title', '홈');
			boardList = page.makePagedList(boardList, totalCnt, pageIndex);
			res.local('boardList', boardList);
			res.render('board/list.html');
		});
	});
});

app.post('/member/login', function(req, res){
	var postData = req.body;
	Member.findOne({id:postData.id, password:postData.password}, function(err, member){
		if( err ){
			clog.error( err );
		}else if ( member ){
			req.session.member = member;
		}
		clog.info('memberInfo :' + member);
		clog.info( 'req.xhr:' +  req.xhr );
		if ( req.xhr ){
			res.partial('menu/aside.html');	
		}else{
			res.redirect('/');	
		}
		
	});
});

app.get('/member/logout', function(req, res){
	req.session.destroy();
	res.redirect('/');
});

app.get('/member/findId', function(req, res){
	res.local('title', 'ID찾기');
	if ( req.xhr ){
		res.partial('member/findId.html');	
	}else {
		res.render('member/findId.html');	
	}
});

app.get('/member/findPassword', function(req, res){
	res.local('title', 'PASSWORD 찾기');
	if ( req.xhr ){
		res.partial('member/findPassword.html');	
	}else {
		res.render('member/findPassword.html');	
	}
});

app.post('/member/findId', function(req, res){
	clog.info('/member/findId');
	var postData = req.body;
	Member.findOne({socialNumber:postData.socialNumber}, function(err, member){
		var reuslt = '';
		if ( member ){
			result = member.id;
		}else {
			result = '해당 주민번호로 가입된 ID가 없습니다.';
		}
		res.local('title', 'ID 찾기결과');
		res.local('result', result);
		if ( req.xhr ){
			res.partial('member/findIdResult.html');
		}else {
			res.render('member/findIdResult.html');	
		}
		
	});
	
});

app.post('/member/findPassword', function(req, res){
	var postData = req.body;
	Member.findOne({id:postData.id, socialNumber:postData.socialNumber}, function(err, member){
		var reuslt = '';
		if ( member ){
			result = member.password;
		}else {
			result = 'Password 를 찾을 수 없습니다.';
		}
		res.local('title', 'Password 찾기결과');
		res.local('result', result);
		
		if ( req.xhr ){
			res.partial('member/findPasswordResult.html');
		}else {
			res.render('member/findPasswordResult.html');	
		}
	});
});

app.get('/member/idDuplicateCheckForm', function(req, res){
	res.partial('member/idDuplicateCheckForm.html');
});

app.get('/member/idDuplicateCheck', function(req, res){
	var id = req.query.id;
	Member.findOne({id:id}, function(err, member){
		if ( member ){ // 중복아이디가 있을경우
			res.send(false);
		}else{ // 중복되는 아이디가 없을경우
			res.send(true);
		}
	});
});

app.get('/member/join', function(req, res){
	var emptyMember = createMemberDoc({});
	var errors = validator.createErrorsForMember();
	res.local('member', emptyMember);
	res.local('errors', errors);
	res.local('title', '회원가입');
	
	if ( req.xhr ){
		res.partial('member/join.html');
	}else {
		res.render('member/join.html');	
	}
});

// 회원가입 서브밋 
app.post('/member/join', validator.joinValidate, function(req, res){
	//clog.info(req.body);
	var postData = req.body;
	if ( req.errors.count > 0 ){
		res.local('errors', req.errors);
		res.local('member', postData);
		res.local('title', '회원가입');
		if ( req.xhr ){
			res.partial('member/join.html');
		}else {
			res.render('member/join.html');	
		}
	} 
	var memberDoc = createMemberDoc(postData);
	memberDoc.save(function(err){
		res.local('member', postData);
		if ( err ){
			clog.error( err );
			req.errors.socialNumber = '주민번호가 중복됩니다.';	
			clog.error('req.errors.socialNumber' + req.errors.socialNumber);
			res.local('errors', req.errors);
			clog.error(req.errors);
			res.local('title', '회원가입');
			if ( req.xhr ){
				res.partial('member/join.html');
			}else {
				res.render('member/join.html');	
			}
		}else {
			req.session.member = postData;
			res.local('title', '회원정보');
			if ( req.xhr ){
				res.partial('member/get.html');
			}else {
				res.render('member/get.html');	
			}
		}
	});
	
});


//회원정보수정 폼
app.get('/member/update', function(req, res){
	//var id = req.params.id;  
	// /member/update/:id 와 같이 path 변수로 들어오는 경우 사용
	var id = req.query.id;   
	Member.findOne({id:id}, function(err, member){
		if ( err ){
			res.redirect('/');
		}else {
			var errors = validator.createErrorsForMember();
			res.local('errors', errors);
			res.local('title', '회원정보수정');
			res.local('member', member);
			if ( req.xhr ){
				res.partial('member/update.html');
			}else {
				res.render('member/update.html');	
			}
			
		}
	});	
	
});

app.post('/member/update', validator.joinValidate, function(req, res){
	var postData = req.body;
	if ( req.errors.count > 0 ){
		res.local('errors', req.errors);
		res.local('member', postData);
		res.local('title', '회원정보수정');
		if ( req.xhr ){
			res.partial('member/update.html');
		}else {
			res.render('member/update.html');	
		}
	}
	var condition = {id:postData.id, password:postData.beforePassword};
	clog.info(postData);
	Member.findOne(condition, function(err, member){
		res.local('member', postData);
		if ( member ){
			var setValue = { $set : {	password : postData.password, 
										socialNumber : postData.socialNumber,
										name : postData.name,
										telNumber : postData.telNumber,
										emailId : postData.emailId,
										emailDomain : postData.emailDomain,
										emailDomainSelect : postData.emailDomainSelect	}};
							
			Member.update(condition, setValue, null, function(err){
				res.local('title', '회원정보');
				if ( req.xhr ){
					res.partial('member/get.html');
				}else {
					res.render('member/get.html');	
				}
			});
		}else{
			res.local('errors', req.errors);
			res.local('title', '회원정보수정');
			if ( req.xhr ){
				res.partial('member/update.html');
			}else {
				res.render('member/update.html');	
			}
		}
	});
	
});

// 회원탈퇴 링크
app.get('/member/delete', function(req, res){
	var id = req.query.id;
	Member.remove({id:id}, function(err){
		if( err ){
			clog.error( err );
		}else {
			res.redirect('/');		
		}
	});
});

//////////////////////
// Board
//////////////////////
app.get('/board/search', function(req, res){
	var pageIndex = req.query.pageIndex || 1;
	var skipResult = page.getSkipResult(pageIndex, page.DEFAULT_PAGE_SIZE);
	var searchCategory = req.query.searchCategory;
	var searchKeyword = req.query.searchKeyword;
	
	var countQuery = Board.count();//
	var conditionList = [{}];
	
	if ( searchKeyword ){ 
		var likeKeyword = new RegExp(searchKeyword, 'g');
		
		if ( searchCategory == 'all'){
			conditionList = [];
			conditionList.push({'title': likeKeyword});
			conditionList.push({'content': likeKeyword});
			conditionList.push({'writerId': likeKeyword});
		}else { // title or content or writerId
			var condition = {};
			condition[searchCategory] = likeKeyword;
			conditionList = [];
			conditionList.push(condition);
		}
		clog.info('conditionList:' + conditionList);	
	}
	countQuery = countQuery.$or(conditionList);
	
	countQuery.run(function(err, totalCnt){
		if ( err ){
			clog.error( err );
		}
		clog.info('totalCnt :' + totalCnt);
		Board.find().or(conditionList).skip(skipResult).limit(page.DEFAULT_PAGE_SIZE).run(function(err, boardList){
			if ( err ){
				clog.error( err );
			}
			res.local('title', '게시판 리스트');
			boardList = page.makePagedList(boardList, totalCnt, pageIndex);
			res.local('boardList', boardList);
			res.local('searchCategory', searchCategory);
			res.local('searchKeyword', searchKeyword);
			res.render('board/search.html');
		});
	});
});

app.get('/board/list', function(req, res){
	var pageIndex = req.query.pageIndex || 1;
	var skipResult = page.getSkipResult(pageIndex, page.DEFAULT_PAGE_SIZE);
	clog.info('pageIndex :' + pageIndex + '  skipResult :' + skipResult);
	Board.count(function(err, totalCnt){
		Board.find().skip(skipResult).limit(page.DEFAULT_PAGE_SIZE).run(function(err, boardList){
			res.local('title', '게시판 리스트');
			boardList = page.makePagedList(boardList, totalCnt, pageIndex);
			res.local('boardList', boardList);
			res.render('board/list.html');
		});
	});
});


app.get('/board/save', function(req, res){
	var emptyBoard = createBoardDoc({});
	res.local('board', emptyBoard);
	res.local('title', '글쓰기');
	res.render('board/save.html');	
});

app.post('/board/save', function(req, res){
	
	Board.find({}, ['seq']).desc('seq').limit(1).run(function(err, result){
		var seq = 1;
		if ( result.length > 0 ){
			// DB row가 없을경우( 이때에도 result 는 객체자체이므로 참이다. ) 최초의 seq는 1이 되지만 result의.length 가 있을경우 마지막 seq에 1을 더한값을 넣어준다.
			seq = result[0].seq + 1;
		}
		var postData = req.body;
		var boardDoc = createBoardDoc(postData, seq);
		boardDoc.save(function(err){
			if ( err ){
				res.local('board', postData);
				res.local('title', '글쓰기');
				res.render('board/save.html');
			}else {
				Board.findOne({seq:seq}, function(err, board){
					res.local('board', board);
					res.local('title', '글 상세보기');
					res.render('board/get.html');	
				});
			}
		});
	});
	
});

app.get('/board/update', function(req, res){
	var seq = req.query.seq;
	Board.findOne({seq:seq}, function(err, board){
		res.local('board', board);
		res.local('title', '글 수정');
		res.render('board/update.html');	
	});
});

app.post('/board/update', function(req, res){
	var postData = req.body;
	var condition = {seq : postData.seq};
	var setValue = { $set : {
		title : postData.title,
		content : postData.content,
		regDate : getDateTime()
	}}; 
	Board.update(condition, setValue, null, function(err){
		if ( err ){
			res.local('board', postData);
			res.local('title', '글 수정');
			res.render('board/update.html');
		}else {
			Board.findOne({seq : postData.seq}, function(err, board){
				res.local('board', board);
				res.local('title', '글 상세보기');
				res.render('board/get.html');	
			});
		}
	});
});

app.get('/board/get', function(req, res){
	var seq = req.query.seq;
	Board.update({seq:seq}, {$inc:{visitCount:1}}, function(){
		
	});
	
	Board.findOne({seq : seq}, function(err, board){
		res.local('board', board);
		res.local('title', '글 상세보기');
		res.render('board/get.html');	
	});
});

app.get('/board/delete', function(req, res){
	var seq = req.query.seq;
	Board.remove({seq : seq}, function(err){
		res.redirect('/board/list');
	});
});


function createMemberDoc(params){
	var memberDoc = new Member();
	
	memberDoc.id = params.id? params.id : '';
	memberDoc.password = params.password? params.password : '';
	memberDoc.socialNumber = params.socialNumber? params.socialNumber : '';
	memberDoc.name = params.name? params.name : '';
	memberDoc.telNumber = params.telNumber? params.telNumber : '';
	memberDoc.emailId = params.emailId? params.emailId : '';
	memberDoc.emailDomain = params.emailDomain? params.emailDomain : '';
	memberDoc.emailDomainSelect = params.emailDomainSelect? params.emailDomainSelect : '';

	return memberDoc;
} 


function createBoardDoc(params, seq){
	
	var boardDoc = new Board();

	boardDoc.seq = seq? seq : '';
	boardDoc.title = params.title? params.title : '';
	boardDoc.content = params.content? params.content : '';
	boardDoc.category = params.category? params.category : '';
	boardDoc.writerId = params.writerId? params.writerId : '';
	boardDoc.regDate = createDateTime();
	
	return boardDoc;
	
}

function createDateTime(){
	var now = new Date();
	
	var year = now.getFullYear();
	var month = now.getMonth() + 1;
	var date = now.getDate();
	
	var hours = now.getHours();
	var minute = now.getMinutes();
	
	return year + '/' + month + '/' + date + ' ' + hours + ':' + minute;

}

app.listen(3000);
console.log("Express server listening on port %d in %s mode db-uri: %s", app.address().port, app.settings.env, app.set('db-uri') );
