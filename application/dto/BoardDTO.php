<?php

/**
 * 게시판 DTO
 */
class BoardDTO
{
    private $nBoardId;
    private $nTypeName;
    private $sTitle;
    private $sWriter;
    private $sContent;
    private $dtDate;
    private $nHit;

    private $keyword;
    private $type;
    private $page;

    private $limit;



    /**
     *  게시판 아이디 getter
     */
    public function getNBoardId()
    {
        return $this->nBoardId;
    }

    /**
     * 게시판 아이디 setter
     * @param mixed $nBoardId 게시판 아이디
     */
    public function setNBoardId($nBoardId)
    {
        $this->nBoardId = $nBoardId;
    }

    /**
     * 게시판 분류 타입 getter
     */
    public function getNTypeName()
    {
        return $this->nTypeName;
    }

    /**
     * 게시판 분류 타입 setter
     * @param mixed $nTypeName 게시판 분류 타입
     */
    public function setNTypeName($nTypeName)
    {
        $this->nTypeName = $nTypeName;
    }

    /**
     * 게시판 제목 getter
     */
    public function getSTitle()
    {
        return $this->sTitle;
    }

    /**
     * 게시판 제목 setter
     * @param mixed $sTitle 게시판 제목
     */
    public function setSTitle($sTitle)
    {
        $this->sTitle = $sTitle;
    }

    /**
     * 게시판 작성자
     */
    public function getSWriter()
    {
        return $this->sWriter;
    }

    /**
     * 게시판 작성자
     * @param mixed $sWriter 게시판 작성자
     */
    public function setSWriter($sWriter)
    {
        $this->sWriter = $sWriter;
    }

    /**
     * 게시판 내용 getter
     */
    public function getSContent()
    {
        return $this->sContent;
    }

    /**
     * 게시판 내용 setter
     * @param mixed $sContent 게시판 내용
     */
    public function setSContent($sContent)
    {
        $this->sContent = $sContent;
    }

    /**
     * 게시판 작성 날짜 getter
     */
    public function getDtDate()
    {
        return $this->dtDate;
    }

    /**
     * 게시판 작성 날짜 setter
     * @param mixed $dtDate
     */
    public function setDtDate($dtDate)
    {
        $this->dtDate = $dtDate;
    }

    /**
     * 게시판 조회수 getter
     */
    public function getNHit()
    {
        return $this->nHit;
    }

    /**
     * 게시판 조회수 setter
     * @param mixed $nHit 게시판 조회수
     */
    public function setNHit($nHit)
    {
        $this->nHit = $nHit;
    }

    /**
     * 게시판 제목 키워드 getter
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * 게시판 제목 키워드 setter
     * @param mixed $keyword 제목 키워드
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * 게시판 분류 타입 getter
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * 게시판 분류 타입 setter
     * @param mixed $type 분류 타입
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * 게시판 현재 페이지 getter
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * 게시판 현재 페이지 setter
     * @param mixed $page 게시판 현재 페이지
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param mixed $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }
    private $offset;




}