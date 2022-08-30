<!DOCTYPE html>
<html>
<head>
    <title>게시글 리스트</title>
    <link rel="stylesheet" href="../../public/static/css/bootstrap.min.css">
    <script src = "../../public/static/js/exterior/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../public/static/js/interior/index.js"></script>
</head>
<body>
<div>
    <div style="width:70%;margin:100px auto;">
        <form id="boardForm" name="boardForm">
            <div style="display: flex">
                <div style="width:200px;float:right;margin-right: 10px;">
                    <select name="type" id="type" class="form-select" onchange="javascript:getBoardList(1)">

                        <option value="0">전체</option>
                        <option value="1">문의</option>
                        <option value="2">일반</option>
                        <option value="3">정보</option>
                    </select>
                </div>
                <div class="input-group mb-3" style="width:250px;float:right">
                    <input class="form-control" type="text" name="keyword" id="keyword" placeholder="제목 검색" value=""/>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" aria-label="검색" onclick="javascript:getBoardList(1)"
                        >Button
                        </button>
                    </div>
                </div>
                <div style="height:50px; margin-left: auto">
                    <button type="button" class="btn btn-outline-dark" onclick="javascript:goBoardWrite()">글쓰기</button>
                </div>
            </div>
            <input type="hidden" id="page" name="page" value="1"/>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">번호</th>
                    <th scope="col">제목</th>
                    <th scope="col">작성자</th>
                    <th scope="col">분류</th>
                    <th scope="col">작성일</th>
                    <th scope="col">조회수</th>
                </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination" id = "pagination">

                </ul>
            </nav>
        </form>
    </div>
</div>
</body>
</html>

