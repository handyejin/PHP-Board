<!DOCTYPE html>
<html>
<head>
    <title>게시글 글쓰기</title>
    <link rel="stylesheet" href="../../public/static/css/bootstrap.min.css">
    <script src = "../../public/static/js/exterior/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../public/static/js/interior/boardWrite.js"></script>
</head>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>글쓰기</title>
</head>
<body>
<div style="display: flex">
    <div style="width:30%; margin: 250px auto;">
        <form id="writeForm" name="writeForm"  >
            <table class="table-bordered" width="700">
                <tr>
                    <th colspan="3">
                        게시판 글쓰기
                    </th>
                </tr>
                <tr>
                    <td>
                        <select class="custom-select custom-select-sm" name="type" id="type" class="custom-select custom-select-sm">
                            <option value="1">문의</option>
                            <option value="2">일반</option>
                            <option value="3">정보</option>
                        </select>
                    </td>
                    <td>
                        <input class="form-control"  class="form-control" type="text" placeholder="작성자" name="sWriter" id = "sWriter">
                    </td>
                    <td>
                        <input class="form-control"  class="form-control" type="text" placeholder="제목을 입력하세요." name="sTitle" id="sTitle">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" height=400>
                        <textarea class="form-control" placeholder="내용을 입력하세요." style="width: 100%; height: 100%"
                                  name="sContent" id="sContent"></textarea>
                    </td>
                </tr>
                <tr>
                    <input type="hidden" id="mode"       name="mode"    value="boardWrite"/> <!-- 게시글 번호 -->
                    <td colspan="2" align=right>
                        <input type="button" onclick="javascript:insertBoard()" value="글쓰기" class="btn btn-outline-secondary">
                        <input class="btn btn-outline-secondary" onclick="javascript:goBoardList(1);" type="button" value="목록으로">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
