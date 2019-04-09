# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)
[만약 추가한 파일이 있으면, 내용 추가! 없으면 이 문구 삭제!]
```

## board.php (수정)
[내용 추가!!]

        <div class="boardz centered-block beautiful">

            <?php
                $connect = mysql_connect('localhost','jis','1231');     //mysql 데이터베이스 연결
                mysql_select_db('jis_db', $connect);    //db선택
                $sql = "select * from boardz where title like '%$_POST[search]%'";      //검색한 search값을 가진 title을 테이블 boardz에서 찾는다.
                $result = mysql_query($sql, $connect);  //레이블행을 가져온다

                $cnt = 1;   //카운터1
                $cnt2 = 1;  //카운터2
                echo("<ul>");   

                while($row = mysql_fetch_array($result)){
                    $cnt++;
                    echo("<li>
                            <h1>$row[title]</h1>    //제목 출력
                          ");
                    if($row[contents]!=NULL){   //내용이 있으면
                        echo("
                        $row[contents]      //내용 출력
                        <br>    //줄바꿈
                        ");
                    }
                    echo("
                            <img src=$row[image_url] alt=\"demo image\"/>   //이미지를 출력
                          </li>
                    ");

                    if($_POST[search]==NULL&&($cnt==3||$cnt==5)) {  //검색창에 아무것도 안적었을 때 
                        echo("</ul><ul>");  
                    }
                    if($_POST[search]!=NULL){   //검색창에 무언가 적었을 때
                        $cnt2++;
                        if($_POST[search]!="sumo"&&$_POST[search]!='su'&&$_POST[search]!="Sumo"){
                            break;  //만약 sumo, su, sumo가 아니면 break
                        }
                        if($cnt2<4) {   //쓸때없이 웹페이지 공간을 하나 차지하는 공백을 없애기위해
                            echo("</ul><ul>");
                        }
                    }

                }
                    echo("</ul>");
            ?>
            </div>
            
            