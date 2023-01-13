<?php
function getAPIResponse($url)
{
    $json = file_get_contents($url);
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

    // JSONデータを連想配列にする
    $apiData = json_decode($json, true);

    return $apiData;
}

if (isset($_GET['ID'])) {
    $externalId = $_GET['ID'];

    $idType = substr($externalId, 0, 2);

    // 頭文字がJRのとき true
    $isJR = $idType == 'JR';

    // API BASIC認証
    $basicAuthId = 'user01';
    $basicAuthPassword = 'QX8dRntuKabS';

    // API ドメイン
    $apiDomain = 'ota.mws-hidaka.com';

    if ($isJR) {
        // JR
        $requestUrl = 'https://' . $basicAuthId . ':' . $basicAuthPassword . '@' . $apiDomain . '/mover/public/test/user/passenger?userId=' . $externalId;

        $rawData = getAPIResponse($requestUrl);

        if (!empty($rawData) && count($rawData) > 0) {
            $apiData = $rawData[0];

            if (isset($apiData['passengerId']) && isset($apiData['password'])) {
                $passengerId = $apiData['passengerId'];
                $password = $apiData['password'];

                $redirectUrl = 'https://' . $passengerId . ':' . $password . '@mover.sao-jp.com/test/web/user/demanduser/demandkm01b.php?userId=' . $externalId;

                // 2重投稿を防ぐためにPOST処理の最後にリダイレクト処理
                header("Location: " . $redirectUrl);
                exit();
            }
        }
    } else {
        // 頭文字が「JR」以外
        $requestUrl = 'https://' . $basicAuthId . ':' . $basicAuthPassword . '@' . $apiDomain . '/mover/public/test/user/passenger?userId=' . $externalId;

        $rawData = getAPIResponse($requestUrl);

        if (!empty($rawData) && count($rawData) > 0) {
            $apiData = $rawData[0];

            if (isset($apiData['passengerId']) && isset($apiData['password'])) {
                $passengerId = 'DT' . $apiData['passengerId'];
                $password = $apiData['password'];

                $redirectUrl = 'https://' . $passengerId . ':' . $password . '@mover.sao-jp.com/test/web/user/demanduser/demandkm01b.php?userId=' . $externalId;

                // 2重投稿を防ぐためにPOST処理の最後にリダイレクト処理
                header("Location: " . $redirectUrl);
                exit();
            }
        }
    }

    ////////////////////////////////////////
    // 外部で管理しているIDを APIで検索して該当なし
    ////////////////////////////////////////
    $redirectUrl = './socialaction.php?ID=' . $externalId;
    // 2重投稿を防ぐためにPOST処理の最後にリダイレクト処理
    header("Location: " . $redirectUrl);
    exit();
}
