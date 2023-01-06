# application-form
Web申込フォームの新規作成

main 納品用

## 申込フォーム内容
![image](https://user-images.githubusercontent.com/114212655/210969991-5dbee8d9-1f68-40f7-8f7f-32d1f4c29d5e.png)

## api
### 「福祉moverリンク先」で、「外部で管理しているIDを APIで検索」をするときに使用するAPIの情報を貼っていただけますでしょうか。

https://ota.mws-hidaka.com/mover/public/test/user/passenger?userId={userId}

ID : user01

PW : QX8dRntuKabS

https://user01:QX8dRntuKabS@ota.mws-hidaka.com/mover/public/test/user/passenger?userId=10

レスポンスJSONの例
```sh
{
"passengerId": "10",
"password": "12345",
"事業所CD": "0001",
"利用者番号": "9999",
"利用者名": "日高　太郎",
"note": "体験です",
"登録日": "2023-01-01",
"permit": "0"
}
```
開発環境のDBなので、データが入っていません。
データを入れましたらご連絡します。

### 「弊社リンク先」URLについて

https://mover.sao-jp.com/test/web/user/demanduser/demandkm01a.php?userId={passengerId}

https://DT10:12345@mover.sao-jp.com/test/web/user/demanduser/demandkm01b.php?userId=10

※頭文字が「JR」以外なら「DT」をpassengerIdに付け足す


頭文字が「JR」ならば、以下のようになる想定

https://user01:QX8dRntuKabS@ota.mws-hidaka.com/mover/public/test/user/passenger?userId=JR12345
```sh
{
"passengerId": "JR12345",
"password": "12345",
"事業所CD": "0001",
"利用者番号": "9999",
"利用者名": "日高　太郎",
"note": "体験です",
"登録日": "2023-01-01",
"permit": "0"
}
```
https://JR12345:12345@mover.sao-jp.com/test/web/user/demanduser/demandkm01b.php?userId=JR12345
