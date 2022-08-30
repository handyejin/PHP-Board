<?php

class Pagination
{
    private $page;      //현재 페이지 번호
    private $startPage;     //시작 페이지 번호
    private $endPage;       //종료 페이지 번호
    private $lastPage;      //제일 마지막 페이지
    private $recordCountPerPage;       //페이지당 게시글 수
    private $totalCnt;      //총 게시물수
    private $pageSize;      //페이지 크기
    private $start;     //sql limit
    private $end;       //sql offset
    private $prev;      //이전 버튼
    private $next;      //이후 버튼

    public function __construct($page, $totalCnt) {
        $this->setPage($page);
        $this->setRecordCountPerPage(10);
        $this->setPageSize(10);
        $this->setTotalCnt($totalCnt);

        $this->calLastPage($this->getTotalCnt(),$this->getRecordCountPerPage());
        $this->calStartEndPage($this->getPage(),$this->getPageSize());
        $this->calcStartEnd($this->getPage(),$this->getRecordCountPerPage());

        $this->prev = $this->getStartPage()>1;
        $this->next = $this->getEndPage()<$this->getLastPage();

    }

    /**
     * 제일 마지막 페이지 계산
     * @param $totalCnt 총 게시물 수
     * @param $recordCountPerPage 페이지당 게시글 수
     */
    public function calLastPage($totalCnt, $recordCountPerPage) {
        $this->setLastPage( ceil((double)$totalCnt / (double)$recordCountPerPage));
    }

    /**
     * 시작,끝 페이지 계산
     * @param $page 현재 페이지 번호
     * @param $pageSize 페이지 크기
     */
    public function calStartEndPage($page,$pageSize) {
        $this->setEndPage(((int)ceil((double)$page / (double)$pageSize)) * $pageSize);
        if($this->getLastPage() <$this->getEndPage()){
            $this->setEndPage($this->getLastPage());
        }
        $this->setStartPage($this->getEndPage() - $pageSize +1);
        if($this->getStartPage()<1){
            $this->setStartPage(1);
        }
    }
    /**
     * SQL 에서 사용할 start, end값 계산
     * @param $page 현재 페이지 번호
     * @param $recordCountPerPage 페이지당 게시글 수
     */
    public function calcStartEnd($page, $recordCountPerPage) {
        $this->setEnd($page * $recordCountPerPage);
        $this->setStart($this->getEnd() - $recordCountPerPage);
    }
    public function getPaginationArr() {
        return array('page'=>$this->page, 'totalCnt'=>$this->totalCnt, 'startPage'=>$this->startPage, 'endPage'=>$this->endPage, 'start'=>$this->start, 'lastPage'=>$this->lastPage, 'prev'=>$this->prev, 'next'=>$this->next);
    }


    public function getPage()
    {
        return $this->page;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function getStartPage()
    {
        return $this->startPage;
    }

    public function setStartPage($startPage)
    {
        $this->startPage = $startPage;
    }

    public function getEndPage()
    {
        return $this->endPage;
    }

    public function setEndPage($endPage)
    {
        $this->endPage = $endPage;
    }

    public function getLastPage()
    {
        return $this->lastPage;
    }

    public function setLastPage($lastPage)
    {
        $this->lastPage = $lastPage;
    }

    public function getRecordCountPerPage()
    {
        return $this->recordCountPerPage;
    }

    public function setRecordCountPerPage($recordCountPerPage)
    {
        $this->recordCountPerPage = $recordCountPerPage;
    }

    public function getTotalCnt()
    {
        return $this->totalCnt;
    }

    public function setTotalCnt($totalCnt)
    {
        $this->totalCnt = $totalCnt;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end)
    {
        $this->end = $end;
    }
}