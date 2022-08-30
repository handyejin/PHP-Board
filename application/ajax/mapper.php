<?php

require_once('../controller/BoardController.php');
require_once('../dto/BoardDTO.php');

$mode = $_REQUEST['mode'];

$controller = new BoardController();
$boardDTO = new BoardDTO();
$result ='';
$status = 200;
$desc = 'success';

switch ($mode) {
    case 'boardList':
        $page = $_GET['page'];
        $type = $_GET['type'];
        $keyword = $_GET['keyword'];

        if(empty($page) || (empty($type) && 0 != $type) || strlen($keyword)>50 ) {
            $status = 400;
            $desc = '잘못된 요청입니다.';
        } else {
            $boardDTO->setPage($page);
            $boardDTO->setType($type);
            $boardDTO->setKeyword($keyword);

            $result = $controller->selectBoardList($boardDTO);
        }
        break;

    case 'boardDetail':
        $nBoardId = $_GET['nBoardId'];
        if(empty($nBoardId) || !is_numeric($nBoardId)) {
            $status = 400;
            $desc = '잘못된 요청입니다.';
        } else {
            $boardDTO->setNBoardId($nBoardId);
            $result = $controller->selectBoardDetail($boardDTO);
        }
        break;

    case 'boardWrite' :
        $type = $_POST['type'];
        $sWriter = $_POST['sWriter'];
        $sTitle = $_POST['sTitle'];
        $sContent = $_POST['sContent'];

        if(empty($type) || (empty($sWriter) && (strlen($sWriter)) >20) || (empty($sTitle) && (strlen($sTitle) >50)) || (empty($sContent) && strlen($sContent) >500)) {
            $status = 400;
            $desc = '잘못된 요청입니다.';
        } else {
            $boardDTO->setType($type);
            $boardDTO->setSWriter($sWriter);
            $boardDTO->setSTitle($sTitle);
            $boardDTO->setSContent($sContent);

            $result = $controller->insertBoard($boardDTO);
        }
        break;

    default :
        $status = 400;
        $desc = ' 잘못된 요청입니다.';
        break;
}

if (!$result['result']) {
    $status = 500;
    $desc = $result['desc'];
}

$re = array(
    'status' => $status,
    'desc' => $desc,
    'result' => $result['data']
);

echo json_encode($re);

