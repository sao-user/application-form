<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';
require './PHPMailer-master/src/Exception.php';

require './PHPMailer-master/language/phpmailer.lang-ja.php';

mb_language("japanese");
mb_internal_encoding("UTF-8");

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function send_mail($data)
{
    try {
        $externalId = h($data['external-id']);
        $applicantName = h($data['applicant-name']);
        $applicantFurigana = h($data['applicant-furigana']);
        $applicantTel = h($data['applicant-tel']);
        $isSameInfo = h($data['is-same-information-as-applicant']);
        $userName = h($data['user-name']);
        $userFurigana = h($data['user-furigana']);
        $userTel = h($data['user-tel']);
        $email = h($data['email']);

        $subject = "参加申込フォームの送信完了";
        $content = "群馬版MaaS サービス実証実験<br>";
        $content .= "参加申込フォームの送信完了<br><br>";
        $content .= "外部ID:" . $externalId . "<br>";
        $content .= "申込者名:" . $applicantName . "<br>";
        $content .= "申込者フリガナ:" . $applicantFurigana . "<br>";
        $content .= "申込者連絡先:" . $applicantTel . "<br>";

        if ($isSameInfo != "1") {
            // 「同上」にチェックが入っていない場合は利用者情報を取得
            $content .= "利用者名:" . $userName . "<br>";
            $content .= "利用者フリガナ:" . $userFurigana . "<br>";
            $content .= "利用者連絡先:" . $userTel . "<br>";
        }

        // インスタンスを生成（引数に true を指定して例外 Exception を有効に）
        $mail = new PHPMailer(true);

        //日本語用設定
        $mail->CharSet = "iso-2022-jp";
        $mail->Encoding = "7bit";

        //エラーメッセージ用言語ファイルを使用する場合に指定
        $mail->setLanguage('ja', '../PHPMailer/language/');

        // デバッグ情報を表示しない場合は コメントアウトする
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        //サーバの設定
        $mail->isSMTP();   // SMTP を使用
        $mail->Host       = 'mail.socialaction.net';  // SMTP サーバーを指定
        $mail->SMTPAuth   = true;   // SMTP authentication を有効に
        $mail->Username   = 'sao.mover@socialaction.net';  // SMTP ユーザ名
        $mail->Password   = 'Sao2241sao';  // SMTP パスワード
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // 暗号化を有効に
        $mail->Port       = 465;  // TCP ポートを指定

        //受信者設定 
        //※名前などに日本語を使う場合は文字エンコーディングを変換
        //差出人アドレス, 差出人名
        $mail->setFrom('sao.mover@socialaction.net', mb_encode_mimeheader('群馬版MaaS サービス実証実験'));
        // 受信者アドレス, 受信者名（受信者名はオプション）
        $mail->addAddress('sao.mover@socialaction.net');
        //返信用アドレス（差出人以外に別途指定する場合）
        $mail->addReplyTo('sao.mover@socialaction.net', mb_encode_mimeheader('群馬版MaaS サービス実証実験'));
        //Cc 受信者の指定
        if (!empty($email)) {
            $mail->addCC($email);
        }
        //BCC 受信者の指定
        $mail->addCC('k.ohe@socialaction.net');
        $mail->addCC('t.horikoshi@socialaction.net');

        //コンテンツ設定
        $mail->isHTML(true);   // HTML形式を指定
        //メール表題（文字エンコーディングを変換）
        $mail->Subject = mb_encode_mimeheader($subject);
        //HTML形式の本文（文字エンコーディングを変換）
        $mail->Body  = mb_convert_encoding($content, "JIS", "UTF-8");

        $mail->send();  //送信

        return true;
    } catch (Exception $e) {
        //エラー（例外：Exception）が発生した場合
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}

if (isset($_POST['submit']) && $_POST['submit'] === "送信") {
    // メール送信
    send_mail($_POST);

    // 2重投稿を防ぐためにPOST処理の最後にリダイレクト処理
    header("Location:./submit-result.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>送信完了</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-sm-6">
                <h1 class="h2 text-center mt-3">
                    群馬版MaaS サービス実証実験
                </h1>
                <h3 class="text-center mb-3">
                    参加申込フォームの送信完了
                </h3>

                <p>
                    参加申込いただき、ありがとうございます。<br>
                    担当者から改めて、連絡いたします。<br>
                    その際、下記について伺います。
                </p>

                <ol>
                    <li>
                        携帯番号 スマホあるいはガラケーどちらかを利用か
                    </li>
                    <li>
                        ご自宅住所と行きたい場所の住所（自宅を含め最大5か所）
                    </li>
                    <li>
                        今回のご参加について同意いただいたご家族のお名前
                    </li>
                    <li>
                        ご担当の居宅介護支援事業所とケアマネージャーのお名前
                    </li>
                    <li>
                        デイサービス・デイケア等ご利用の介護サービス・施設
                    </li>
                    <li>
                        ご自宅にお伺いする日時について<br>
                        行きたい５か所での待ち合わせ場所の確認が必要になります。私ども担当者が日時を決めてご自宅に伺います。
                    </li>
                </ol>
            </div>
        </div>
    </div>
</body>

</html>