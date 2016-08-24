# rd3
踩地雷
##題目1 踩地雷地圖產生程式
試著製作一個10X10的地圖產生程式，並**`隨機`**產生40個地雷。

地雷的周圍會有數字，數字代表數字周圍八格有幾顆地雷。

###輸出格式
請以字串格式輸出，M代表地雷，0代表空格，1~8代表地雷數量，N代表換行。

###範例
地圖示意圖

| 1 | 1 | 1 |   |   |   |   |
|---|---|---|---|---|---|---|
| 1 | M | 2 | 1 | 1 |   |   |
| 1 | 1 | 2 | M | 1 |   |   |
|   |   | 1 | 2 | 3 | 2 | 1 |
| 1 | 1 |   | 1 | M | M | 1 |
| M | 1 |   | 1 | 2 | 2 | 1 |

輸出範例

`1110000N1M21100N112M100N0012321N1101MM1NM101221`

###作答網址

https://docs.google.com/forms/d/e/1FAIpQLSc-kIjda8MWgGEmH6XLVKXUOdksMNx4JPrrTuCyASlnfwPcNg/viewform

###已通過名單

https://docs.google.com/document/d/1jQ2cwjREPU_INb0Dz1m2l37gep-Curq8C7dXLTAuyIo/edit

###進階題

試著製作一個60X50的地圖產生程式，並**`隨機`**產生1200個地雷，並且每次產生可以在一秒內產生完。

###作答網址

https://docs.google.com/forms/d/1-MNJ9Y7WmW5oW0_NFXTXbgsJx52n9maYfqdAWc_j2Q8/edit

###已通過名單

https://docs.google.com/document/d/1jQ2cwjREPU_INb0Dz1m2l37gep-Curq8C7dXLTAuyIo/edit

##題目2 踩地雷地圖反驗證程式
沿用第一題定義的參數和格式，解析帶入的字串，是否符合踩地雷的規則，若不符則要詳細說明原因。

###範例
輸入範例

`https://xxx.xxx.xxx/xxx.php?map=1110000N1M21100N112M100N0012321N1101MM1NM101221`

輸出格式

符合。

不符合，因為XXOO。

###作答網址

https://docs.google.com/forms/d/1Hi4nHTfkwz77U05L7UOWiVvzwX8B_jXcQKW0N-8Fd_0/edit



##題目3.轉帳流程圖
繪製轉帳流程圖，試想你可能在轉帳過程中會面臨的各種狀況；繳交兩張流程圖。

###情境
A平台(你)，使用B平台(其他人)出入款API，讓會員可以將他在B平台的錢轉入A平台的電子荷包，當然也可以從A平台轉入到B平台。

註.角色定位以A平台為角度去思考

###狀況
網路延遲，timeout

###繳交
繳交網址 - http://192.168.152.134/upload.php

檔名格式 - 暱稱.jpg (jpeg,jpg) (ex. phili.jpg)

