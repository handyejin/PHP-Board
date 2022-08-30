const URL = "../../application/ajax/mapper.php"

$(function () {
    let query = window.location.search;
    let param = new URLSearchParams(query);
    let nBoardId = Number(param.get("nBoardId"));

    getBoardDetail(nBoardId);
});

/**
 * 게시판 상세 ajax 호출
 * @param nBoardId 게시판 아이디
 */
function getBoardDetail(nBoardId) {
    $.ajax({
        url: URL,
        data: {
            nBoardId:nBoardId,
            mode: "boardDetail"
        },
        type: "GET",
        dataType: "json",
        success: function (obj) {
            console.log(obj);
            if (200 == obj["status"]) {
                getBoardDetailCallback(obj.result);
            } else {
                alert("ajax 통신 실패" + obj.desc);
            }
        },
        error: function (request,status,error) {
            alert("error code" + request.status + "\n" + request.responseText + "\n" + "error:" + error);
        }
    });
}

/**
 * 게시판 상세 ajax 호출 성공
 * @param data 게시판 상세보기 html 구현
 */
function getBoardDetailCallback(data){
    let detailContent='';
    if( "" != data){
        detailContent+= '<tr><th>제목</th><td colspan="3">'+data.sTitle+'</td>';
        detailContent+='<th>구분</th> <td colspan="1">'+data.sTypeName+'</td>';
        detailContent+='<tr><th>작성자</th><td>'+data.sWriter+'</td>';
        detailContent+='<th>작성일시</th><td>'+data.dtDate+'</td>';
        detailContent+='<th>조회수</th><td>'+data.nHit+'</td></tr>';
        detailContent+='<tr><th>내용</th><td colspan="5">'+data.sContent+'</td></tr>'
    }
    $("#detail_tbody").html(detailContent);
}

function goBoardList(){
    location.href = "../view/boardList.php";
}


