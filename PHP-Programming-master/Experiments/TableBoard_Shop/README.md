# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    
create table tableboard_shop(

num int not null auto_increment,

date date,

orderid int,

name char(20),

price int,

quantity int,

primary key(num)

);
    
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]

목록들을 가져오기 위해 select를 이용했습니다.

$sql = "select * from tableboard_shop";

유동적인 값들을 가져오기 위해 반복문과 변수 $row[date]등을 이용해서 받아오게 했습니다.
그리고 total은 곱하기를 출력하지 못해 따로 변수 sum을 만들어 곱을 한 뒤 저장한 후 출력했습니다.

## board_form.php 수정
[여기에 board_form.php 를 어떻게 수정했는지, 설명을 작성하세요.]

num이 auto_increment이므로 하나하나 데이터베이스에 넣어주기 위해

$sql = "select * from tableboard_shop where num = '$_GET[num]'";
를 썼습니다.

업데이트 할 때 데이터를 출력하기 위해

\<td class="column1"\> \<input name="date" type="text" value="<? echo($row[date])#TODO: 정보 표시 ?>" /\> \</td\>

와 같이 echo($row[date])등을 추가해주었습니다.


## function
### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]

insert를 하기 위해서 POST를 사용해 유동적인 값들의 입력을 받았습니다.

$sql = "insert into tableboard_shop(date, orderid, name, price, quantity) values('$_POST[date]', $_POST[order_id], '$_POST[name]', '$_POST[price]', '$_POST[quantity]')";

### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]

update를 하기위해서 아래와 같이 POST와 GET을 써서 불러옵니다.

$sql = "update tableboard_shop set date='$_POST[date]', orderid=$_POST[order_id], name='$_POST[name]', price='$_POST[price]', quantity='$_POST[quantity]' where num = '$_GET[num]'";

### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]

delete를 사용하기 위해서 GET[num]을 사용해 프라이머리 넘버가 몇인지 확인해 데이터 베이스 테이블에서 지워줍니다.

$sql = "delete from tableboard_shop where num = '$_GET[num]'";