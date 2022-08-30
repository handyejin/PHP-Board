const URL = "../../application/ajax/mapper.php"
$(function () {
    getBoardList(1);
});

/**
 * 게시판 리스트 ajax 호출
 * @param currentPageNo 현재 페이지 번호
 */
function getBoardList(currentPageNo) {

    let type = $('#type').val();
    let keyword = $('#keyword').val();

    if(undefined == currentPageNo) {
        currentPageNo = 1;
    }

    $.ajax({
        url: URL,
        data: {
          page: currentPageNo,
          type: type,
          keyword: keyword,
          mode: "boardList"
        },
        type: "GET",
        dataType: "json",
        success: function (obj) {
            console.log(obj);
            if (200 == obj['status']) {
                getBoardListCallback(obj.result);
            } else {
                alert("ajax 통신 실패" + obj.desc);
                getBoardList(1);
            }
        },
        error: function (request,status,error) {
            alert("error code" + request.status + "\n" + request.responseText + "\n" + "error:" + error);
        }
    });
}

/**
 * 게시판 리스트
 * @param data 게시판 리스트 html 구현
 */
function getBoardListCallback(data) {
    console.log(data);
    let content ="";
    let paginationHtml ="";
    let boardList = data.boardList;
    let pagination = data.pagination;
    let listLen = boardList.length;
    let nBoardId;
    let sWriter;
    let sTypeName;
    let sTitle;
    let dtDate;
    let nHit;
    if (listLen > 0) {
        for (let i = 0; i < listLen; i++) {
            nBoardId = boardList[i].nBoardId;
            sWriter = boardList[i].sWriter;
            sTypeName = boardList[i].sTypeName;
            sTitle = boardList[i].sTitle;
            dtDate = boardList[i].dtDate;
            nHit = boardList[i].nHit;

            content += "<tr>";
            content += "<td>" + nBoardId + "</td>";
            content += "<td onclick='javascript:goBoardDetail(" + nBoardId + ");' style='text-decoration-line: underline; cursor: Pointer'> " + sTitle + "</td>";
            content += "<td>" + sWriter + "</td>";
            content += "<td>" + sTypeName + "</td>";
            content += "<td>" + dtDate + "</td>";
            content += "<td>" + nHit + "</td>";
            content += "</tr>";
        }

        if(pagination.prev){
            paginationHtml += "<a href='javascript:getBoardList(" + (Number(pagination.startPage)-1)+ ");' >[<<]</a>";;
        }
        for (let i=pagination.startPage; i<=pagination.endPage; i++){
            paginationHtml += "<a href='javascript:getBoardList(" + i + ");' >[" + i + "]</a>";
        }
        if(pagination.next){
            paginationHtml += "<a href='javascript:getBoardList(" + (Number(pagination.endPage)+1) + ");' >[>>]</a>";
        }
    } else {
        content += "<tr>";
        content += "<td colspan='5'>등록된 글이 존재하지 않습니다.</td>";
        content += "<tr>";
    }
    $("#tbody").html(content);
    $("#pagination").html(paginationHtml);
}

function goBoardDetail(nBoardId) {
    location.href = "../view/boardDetail.php?nBoardId="+nBoardId;
}

function goBoardWrite() {
    location.href = "../view/boardWrite.php";
}


