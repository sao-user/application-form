# application-form
Web申込フォームの新規作成

## 申込フォーム内容
![image](https://user-images.githubusercontent.com/114212655/210974630-3da70f35-9312-48d9-8011-aaf5b9505e11.png)

### 確認事項
1. 申込者名、フリガナ、連絡先 未入力チェック確認(同上チェックがなければ、利用者名、フリガナ、連絡先) 
1. 利用規約について、9か所チェック確認
1. 個人情報の取り扱いについてチェック確認

- 3項目のチェック済みなら、メールで送信する
- 未入力項目があれば、送信ボタンが押せないようにする

### メール
- 送信アドレス　sao.mover@socialaction.net
- 受信アドレス　sao.mover@socialaction.net
- Cc           任意アドレス
- Bcc          k.ohe@socialaction.net , t.horikoshi@socialaction.net

- メール送信後、3ページ目表示(申込フォーム内容.docx)

## api

#### ドメイン

- 「弊社リンク先」のドメインが「mover.sao-jp.com」です。

   ユーザー毎にbasic認識のユーザー名、パスワードが変わります。

- 「api」のドメインが「ota.mws-hidaka.com」です。

   basic認識のユーザー名、パスワードは１つのものを使用します。

#### 「福祉moverリンク先」で、「外部で管理しているIDを APIで検索」をするときに使用するAPIの情報を貼っていただけますでしょうか。

api情報

```sh
実行api url 例 (basic認識、パラメータ込み)
https://user01:QX8dRntuKabS@ota.mws-hidaka.com/mover/public/test/user/passenger?userId=10

basic認識
ID : user01
PW : QX8dRntuKabS
```
レスポンスJSONの例
```sh
status code
200 : 該当あり
JSONデータ
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

204 : 該当なし
```
開発環境のDBなので、データが入っていません。
データを入れましたらご連絡します。

#### 「弊社リンク先」URLについて

- 頭文字が「JR」以外なら「DT」をレスポンスの"passengerId"に付け足す
- basic認証は、DT{passengerId}:{password} をurlに付け足す
```sh
実行 url 例 (basic認識、パラメータ込み)
https://DT10:12345@mover.sao-jp.com/test/web/user/demanduser/demandkm01b.php?userId=10
```

- 質問
上の例では「10」になっています。なぜ「DT10」ではないのですか？
- 回答
basic認識のユーザー名を「DT10」にしており、DBの登録は「10」というようにしているからです。

#### 頭文字が「JR」ならば、以下のようになる想定

api情報
```sh
実行api url 例 (basic認識、パラメータ込み)
https://user01:QX8dRntuKabS@ota.mws-hidaka.com/mover/public/test/user/passenger?userId=JR12345

basic認識
ID : user01
PW : QX8dRntuKabS
```
レスポンスJSONの例
```sh
status code
200 : 該当あり
JSONデータ
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

204 : 該当なし
```

#### 頭文字が「JR」の時の「弊社リンク先」URL

- basic認証は、{passengerId}:{password} をurlに付け足す
```sh
実行 url 例 (basic認識、パラメータ込み)
https://JR12345:12345@mover.sao-jp.com/test/web/user/demanduser/demandkm01b.php?userId=JR12345
```
