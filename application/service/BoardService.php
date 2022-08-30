<?php

require_once("../dao/BoardDAO.php");
require_once('../dto/BoardDTO.php');
require_once('../util/Pagination.php');

class BoardService {

    private $dao;
    function __construct() {
        $this->dao = new BoardDAO();
    }

    /**
     *게시판 조회 서비스
     */
    public function selectBoardList($boardDTO) {
        $result = array();
        try {
            $totalCntResult = $this->dao->selectBoardCnt($boardDTO);
            $totalCnt = $totalCntResult['data']['cnt'];

            $pagination = new Pagination($boardDTO->getPage(), $totalCnt);
            $boardDTO->setLimit($pagination->getStart());
            $boardDTO->setOffset($pagination->getRecordCountPerPage());
            $result = $this->dao->selectBoardList($boardDTO);
            $result['data']['pagination'] = $pagination->getPaginationArr();

        } catch (Exception $e) {
            $result['desc'] = $e -> getMessage();
            $result['result'] = false;
        }
        return $result;
    }

    /**
     * 게시판 상세조회 서비스
     * @param $boardDTO 게시판 DTO
     */
    public function selectBoardDetail($boardDTO) {
        $result = array();
        try {
            /**
             * 게시판 조회수 증가
             */
            $result = $this->dao->updateHit($boardDTO);
            if($result['result']) {
                $result = $this->dao->selectBoardDetail($boardDTO);
            }

        } catch (Exception $e) {
            $result['desc'] = $e -> getMessage();
            $result['result'] = false;
        }

        return $result;
    }

    /**
     * 게시판 글쓰기
     * @param $boardDTO 게시판 DTO
     */
    public function insertBoard($boardDTO) {
        $result = array();
        try {
            $result = $this->dao->insertBoard($boardDTO);
        } catch (Exception $e) {
            $result['desc'] = $e -> getMessage();
            $result['result'] = false;
        }

        return $result;
    }
}