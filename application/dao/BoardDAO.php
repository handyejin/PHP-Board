<?php

require_once('../util/PdoConn.php');
require_once('../dto/BoardDTO.php');

/**
 * 게시판 DAO
 */
class BoardDAO {
    private $pdo;

    public function __construct() {
        $conn = PdoConn::getInstance();
        $this->pdo = $conn->getConnection();
    }

    /**
     * 게시판 리스트 조회
     * @param $page 게시판 현재 페이지
     * @param $type  분류 타입
     * @param $keyword  제목 검색 키워드
     */
    function selectBoardList($boardDTO) {
        try {
            $result = array();
            $keyword = $boardDTO->getKeyword();
            $type = $boardDTO->getType();
            $limit = $boardDTO->getLimit();
            $offset = $boardDTO->getOffset();

            $sql = '
            SELECT 
                tbl.nBoardId, 
                tbt.sTypeName, 
                tbl.sTitle, 
                tbl.sWriter, 
                tbl.dtDate, 
                tbl.nHit
            FROM 
                tBoardList AS tbl
                INNER JOIN tBoardType AS tbt ON  (tbl.nTypeId = tbt.nTypeId)
            WHERE 
                1=1 ';

            if (!empty($keyword)) {
                $sql .= ' AND tbl.sTitle LIKE concat(\'%\',:keyword,\'%\')';
            }

            if (0!=(int)$type) {
                $sql .= ' AND tbl.nTypeId = :type';
            }
            $sql_limit = ' 
            ORDER BY nBoardId DESC
            LIMIT :limit , :offset';
            $sql .= $sql_limit;

            $stmt = $this->pdo->prepare($sql);

            if(!empty($keyword)) {
                $stmt->bindParam('keyword',$keyword);
            }

            if(0!=(int)$type) {
                $stmt->bindParam('type', $type);
            }
            $stmt -> bindParam('limit',$limit,PDO::PARAM_INT);
            $stmt -> bindParam('offset',$offset,PDO::PARAM_INT);
            $check = $stmt->execute();
            $result['result'] = $check;
            $result['data']['boardList'] = $stmt->fetchall(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            $result['result'] = false;
            $result['desc'] = $e->getMessage();
        }
        return $result;
    }

    /**
     * 총 게시글 수 조회
     * @param $boardDTO 게시판 DTO
     */
    function selectBoardCnt($boardDTO) {
        try {
            $result = array();
            $keyword = $boardDTO->getKeyword();
            $type = $boardDTO->getType();

            $sql = '
            SELECT 
                COUNT(nBoardId)  AS cnt
            FROM 
                tBoardList AS tbl
                INNER JOIN tBoardType AS tbt ON  (tbl.nTypeId = tbt.nTypeId)
            WHERE 
                1=1';

            if(!empty($keyword)) {
                $sql .= ' AND tbl.sTitle LIKE concat(\'%\',:keyword,\'%\')';
            }

            if(0 != (int)$type) {
                $sql .= ' AND tbl.nTypeId = :type';
            }

            $stmt = $this->pdo->prepare($sql);

            if(!empty($keyword)) {
                $stmt->bindParam('keyword',$keyword);
            }

            if(0 != (int)$type) {
                $stmt->bindParam('type', $type);
            }
            $check = $stmt->execute();
            $result['result'] = $check;
            $result['data'] = $stmt-> fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $result['result'] = false;
            $result['desc'] = $e->getMessage();
        }

        return $result;
    }

    /**
     * 게시판 상세 조회
     * @param $boardDTO 게시판DTO
     */
    function selectBoardDetail($boardDTO) {
        try {
            $result = array();
            $nBoardId = $boardDTO->getNBoardId();
            $sql = '
            SELECT 
                tbl.nBoardId, 
                tbt.sTypeName, 
                tbl.sTitle, 
                tbl.sWriter,
                tbl.sContent,
                tbl.dtDate, 
                tbl.nHit
                
             FROM 
                 tBoardList AS tbl
                 INNER JOIN tBoardType AS tbt ON (tbl.nTypeId = tbt.nTypeId)
            WHERE 
                tbl.nBoardId = :nBoardId ';

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam('nBoardId',$nBoardId,PDO::PARAM_INT);
            $check = $stmt->execute();

            $result['result'] = $check;
            $result['data'] = $stmt-> fetch(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            $result['result'] = false;
            $result['desc'] = $e->getMessage();
        }
        return $result;
    }

    /**
     * 조회수 증가
     * @param $boardDTO 게시판 DTO
     */
    function updateHit($boardDTO) {
        try {
            $result = array();
            $nBoardId = $boardDTO->getNBoardId();
            $sql = '
            UPDATE tBoardList as tbl
            SET tbl.nHit = tbl.nHit + 1
            WHERE tbl.nBoardId = :nBoardId ';

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam('nBoardId',$nBoardId,PDO::PARAM_INT);
            $check = $stmt->execute();

            $result['result'] = $check;

        } catch (PDOException $e) {
            $result['result']=false;
            $result['desc']= $e->getMessage();
        }
        return $result;
    }

    /**
     * 게시글 입력
     * @param $boardDTO 게시판 DTO
     */
    function insertBoard($boardDTO) {
        try {
            $result = array();

            $type = $boardDTO->getType();
            $sWriter = $boardDTO->getSWriter();
            $sTitle = $boardDTO->getSTitle();
            $sContent = $boardDTO->getSContent();

            $sql = '
            INSERT INTO tBoardList(nTypeId, sTitle, sContent, sWriter) 
            VALUES(:type, :sTitle, :sContent, :sWriter);';

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam('type',$type,PDO::PARAM_INT);
            $stmt->bindParam('sWriter',$sWriter);
            $stmt->bindParam('sTitle',$sTitle);
            $stmt->bindParam('sContent',$sContent);

            $check = $stmt->execute();
            $result['data'] = '';
            $result['result'] = $check;

        } catch (PDOException $e) {
            $result['result']=false;
            $result['desc']= $e->getMessage();
        }
        return $result;
    }
}


