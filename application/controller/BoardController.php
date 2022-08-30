<?php

require_once("../service/BoardService.php");
require_once('../dto/BoardDTO.php');

class BoardController {
    private $service;

    function __construct() {
        $this->service = new BoardService();
    }
    function selectBoardList($boardDTO) {
        $result = array();
        try {
            $result = $this->service->selectBoardList($boardDTO);
        } catch (Exception $e) {
            $result['desc'] = $e -> getMessage();
            $result['result'] = fasle;
        }

        return $result;
    }

    function selectBoardDetail($boardDTO) {
        $result = array();
        try {
            $result = $this->service->selectBoardDetail($boardDTO);
        } catch (Exception $e) {
            $result['desc'] = $e -> getMessage();
            $result['result'] = fasle;
        }

        return $result;
    }

   function insertBoard($boardDTO) {
        $result = array();
        try {
            $result = $this->service->insertBoard($boardDTO);
        } catch (Exception $e) {
            $result['desc'] = $e -> getMessage();
            $result['result'] = fasle;
        }

        return $result;
    }
}