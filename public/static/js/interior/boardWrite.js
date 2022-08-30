const URL = "../../application/ajax/mapper.php"

/**
 * 게시판 글쓰기 ajax 호출
 */
function insertBoard(){
    let type = $('#type').val();
    let sWriter = $('#sWriter').val().trim();
    let sTitle = $('#sTitle').val().trim();
    let sContent = $('#sContent').val().trim();

    if("" == type || "" == sWriter || "" == sTitle || "" == sContent) {
        alert("모든 값을 입력해주세요!");
        if(sWriter.length > 20) {
            alert("작성자는 20글자 이하로 입력해주세요.");
        }else if(sTitle.length > 30) {
            alert("제목은 30글자 이하로 입력해주세요.");
        }else if(sContent.length > 1000) {
            alert("내용은 1000자 이하로 작성해주세요.");
        }
    }else{
        $.ajax({
            url: URL,
            data: {
                type: type,
                sWriter: sWriter,
                sTitle: sTitle,
                sContent: sContent,
                mode: "boardWrite"
            },
            type: "POST",
            dataType: "json",
            success: function (obj) {
                console.log(obj);
                if (200 == obj["status"]) {
                    insertBoardCallBack();
                } else {
                    alert("ajax 통신 실패" + obj.desc);
                }
            },
            error: function () {
                alert("error code" + request.status + "\n" + request.responseText + "\n" + "error:" + error);
            }
        });
    }
}

/**
 * 게시판 글 작성 후 페이지 이동
 */
function insertBoardCallBack(){
    alert("글이 작성되었습니다.");
    goBoardList(1);
}

function goBoardList(){
    location.href = "../view/boardList.php";
}
