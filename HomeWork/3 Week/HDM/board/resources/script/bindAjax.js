
function createSearchParam(){
	var category = $('.search select[name="category"]').val();
	var filter = $('.search select[name="filter"]').val();
	var keyword = $('.search input[name="keyword"]').val();
	
	return {
		'category' : category,
		'filter' : filter,
		'keyword' : keyword
	};
}

function bindRequestAjax(element, createParam, callBack){
	
	$(element).delegate('', 'click', function(event){
		var url = $(this).attr('href');
		var param = null;
		if ( !url ){
			url = $(this.form).attr('action');
		}
		if ( createParam ){
			param = createParam();
		}
		
		$.get(url, param, function(page){
			$('#content').html(page);
			if ( callBack ){
				callBack();
			}
		});
		event.preventDefault();
	});
}

// function bindForm(element, param, callBack){
// 	
	// $(element).delegate('', 'click', function(event){
		// //console.dir( this.form );
		// var url = $(this.form).attr('action');
		// //alert(url);
		// $.post(url, param(), function(page){
			// $('#content').html(page);
			// if ( callBack ){
				// callBack();
			// }
		// });
		// event.preventDefault();
	// });
// }
function pageLink(){
	$('.pageLink').one('click', function(event){
		event.preventDefault();
		var url = $(this).attr('href');
		$.get(url, function(page){
			$('#content').html(page);
		});
	});
}


function submitBoard(){
	$('#content form').submit(function(event){
		event.preventDefault();
		writeBBS(this);
	});
}

function submitJoin(){
	$('#content form').submit(function(event){
		event.preventDefault();
		joinMember(this);
	});
}

function updateBoardCallback(){
	//bindRequestAjax('#updateBoardFormLink', null, submitBoard );
	$('#updateBoardFormLink').one('click', function(event){
		event.preventDefault();
		var url = $(this).attr('href');
		$.get(url, function(page){
			$('#content').html(page);
			submitBoard();
		});
	});
	
	$('#deleteBoardLink').one('click', function(event){
		event.preventDefault();
		if ( confirm("삭제하시겠습니까?") ){
			var url = $(this).attr('href');
			location.href = url;	
		}
	});
}


function idCheckCallback(){
	
	$('#id').attr('readonly','readonly');
	$('#idInputBtn').click(function(event){
		window.showModalDialog('/member/idDuplicateCheckForm.php', $('#id'),'dialogWidth:400px; dialogHeight:50px; dialogLeft:100px; dialogTop:100px; resizable:no; status:no; scroll:no; help:no; unadorned:no; edge:sunken');
		event.preventDefault();
	});
	
	submitJoin();
}

