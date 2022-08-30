<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>글쓰기</title>
    <link rel="stylesheet" href="../../public/static/css/bootstrap.min.css">
    <script src = "../../public/static/js/exterior/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../public/static/js/interior/boardDetail.js"></script>
</head>
<body>
<div>
    <div style="width:60%;margin:200px auto;">
        <form id="boardDetailForm" name="boardDetailForm">
            <table  class = "table-bordered" width="1000">
                <colgroup>
                    <col width="15%">
                    <col width="30%">
                    <col width="10%">
                    <col width="*">
                </colgroup>
                <tbody id ='detail_tbody'>
                </tbody>
            </table>
            <input type="hidden" id="boardId"       name="boardId"    value="${nBoardId}"/>
        </form>
        <div style = "margin-top:10px;">
            <button type="button" onclick="javascript:goBoardList(); ">목록으로</button>
        </div>
        <div style = "margin-top:50px;width:600px">
            <table class="table table-striped"width="500">
                <colgroup>
                    <col width="15%">
                    <col width="15%">
                    <col width="50%">
                    <col width="20%">

                </colgroup>
                <tbody id="tReply">
                </tbody>
            </table >
        </div>
    </div>
</div>
</body>
</html>
