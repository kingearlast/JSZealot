<?
	define("DEFAULT_CURRENT_PAGE", 1);
	define("DEFAULT_PAGE_UNIT", 5);
	define("DEFAULT_PAGE_SIZE", 10);
	
	class Page{
		
		var $currentPage = 1;
		var $totalCount;
		var $pageUnit = 5;
		var $pageSize = 10;
		var $maxPage;
		var $beginUnitPage;
		var $endUnitPage;
		
		function Page($currentPage, $totalCount){
			$this->totalCount = $totalCount;	
			$this->maxPage = $this->pageSize == 0? $this->totalCount : ceil(($this->totalCount -1) / ($this->pageSize + 1));
			$this->currentPage = $currentPage > $this->maxPage? $this->maxPage : $currentPage;
			$this->beginUnitPage = (($currentPage - 1) / $pageUnit) * $pageUnit + 1;
            $this->endUnitPage = $this->pageUnit > $this->maxPage? $this->maxPage : $beginUnitPage + ($pageUnit - 1);
		}
		
	}
?>