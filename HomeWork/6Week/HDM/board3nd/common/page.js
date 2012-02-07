var DEFAULT_PAGE_SIZE = exports.DEFAULT_PAGE_SIZE = 10;
var DEFAULT_PAGE_UNIT = exports.DEFAULT_PAGE_UNIT = 5;
var DEFAULT_PAGE_INDEX = exports.DEFAULT_PAGE_INDEX = 1;

exports.makePagedList = function(dataList, totalCnt, pageIndex, pageSize, pageUnit){
	var PAGE_SIZE = pageSize || DEFAULT_PAGE_SIZE;
	var PAGE_UNIT = pageUnit || DEFAULT_PAGE_UNIT;
	var PAGE_INDEX = pageIndex || DEFAULT_PAGE_INDEX;
	var totalCount = totalCnt;
	
	var totalPage = Math.floor(totalCount / PAGE_SIZE);
	totalPage = (totalCount % PAGE_SIZE == 0)? totalPage : totalPage + 1;
	var num = Math.floor((PAGE_INDEX-1) / PAGE_UNIT);
	var startPage = (totalPage <= 1)? 1 : PAGE_UNIT * num + 1;
	var endPage = (startPage + (PAGE_UNIT - 1) > totalPage)? totalPage : startPage + (PAGE_UNIT - 1);
	
	var prevPage = startPage - 1;
	var nextPage = endPage + 1;
	var hasPrev = true;
	var hasNext = true;
	if ( startPage <= 1 ){
		hasPrev = false;
	}
	if ( endPage >= totalPage ){
		hasNext = false;
	}	
	dataList.totalCount = totalCount;
	dataList.totalPage = totalPage;
	dataList.startPage = startPage;
	dataList.endPage = endPage;
	dataList.hasPrev = hasPrev;
	dataList.hasNext = hasNext;
	dataList.prevPage = prevPage;
	dataList.nextPage = nextPage;
	return dataList;
		 	
}

exports.getSkipResult = function(pageIndex, pageSize){
	var PAGE_INDEX = pageIndex || DEFAULT_PAGE_INDEX;
	var PAGE_SIZE = pageSize || DEFAULT_PAGE_SIZE;
	return (PAGE_INDEX - 1) * PAGE_SIZE;
}