<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>参加申込フォーム</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <form action="./submit-result.php" method="post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-sm-6">
                    <h1 class="h2 text-center mt-3">
                        群馬版MaaS サービス実証実験
                    </h1>
                    <h3 class="text-center mb-3">
                        参加申込フォーム
                    </h3>

                    <div class="card">
                        <div class="card-body">
                            <!-- 外部ID -->
                            <div class="mb-3">
                                <label for="external-id" class="form-label">
                                    外部ID
                                </label>
                                <input id="external-id" class="form-control" type="text" value="<?php echo htmlspecialchars($_GET['ID'], ENT_QUOTES, 'UTF-8'); ?>" disabled readonly>
                                <input type="hidden" name="external-id" value="<?php echo htmlspecialchars($_GET['ID'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>

                            <!-- 申込者名 -->
                            <div class="mb-3">
                                <label for="applicant-name" class="form-label">
                                    申込者名
                                </label>
                                <input type="text" class="form-control" id="applicant-name" name="applicant-name" value="" required>
                            </div>

                            <!-- フリガナ -->
                            <div class="mb-3">
                                <label for="applicant-furigana" class="form-label">
                                    フリガナ
                                </label>
                                <input type="text" class="form-control" id="applicant-furigana" name="applicant-furigana" value="" required>
                            </div>

                            <!-- 連絡先 -->
                            <div class="mb-3">
                                <label for="applicant-tel" class="form-label">
                                    連絡先電話番号
                                </label>
                                <input type="text" class="form-control" id="applicant-tel" name="applicant-tel" required>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <!-- 同上の場合はチェック -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="1" id="is-same-information-as-applicant" name="is-same-information-as-applicant">
                                <label class="form-check-label" for="is-same-information-as-applicant">
                                    同上の場合はチェックしてください。申込者と利用者が異なる場合、下記に記入ください。
                                </label>
                            </div>

                            <!-- 利用者名 -->
                            <div class="mb-3">
                                <label for="user-name" class="form-label">
                                    利用者名
                                </label>
                                <input type="text" class="form-control" id="user-name" name="user-name" value="">
                            </div>

                            <!-- フリガナ -->
                            <div class="mb-3">
                                <label for="user-furigana" class="form-label">
                                    フリガナ
                                </label>
                                <input type="text" class="form-control" id="user-furigana" name="user-furigana" value="">
                            </div>

                            <!-- 連絡先 -->
                            <div class="mb-3">
                                <label for="user-tel" class="form-label">
                                    連絡先電話番号
                                </label>
                                <input type="text" class="form-control" id="user-tel" name="user-tel" value="">
                            </div>
                        </div>
                    </div>

                    <!-- メールアドレス(任意) -->
                    <div class="mt-3 mb-3">
                        <label for="email" class="form-label">
                            メールアドレス(任意)
                        </label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                    </div>
                </div>
            </div>

            <!-- 利用規約について -->
            <div class="row justify-content-center mt-5">
                <div class="col col-sm-6">
                    <h4 class="text-center">
                        利用規約について
                    </h4>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="terms-of-use-1" name="terms-of-use-1">
                        <label class="form-check-label" for="terms-of-use-1">
                            介護認定を受けており、かつ、スマートフォン、携帯電話をお持ちの方が利用できる相乗り実証実験です。
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="terms-of-use-2" name="terms-of-use-2">
                        <label class="form-check-label" for="terms-of-use-2">
                            相乗り実証実験は8：30～16：00（迎車依頼のオーダーストップ）までとなっております。実証実験時間外はタクシーなどの公共交通機関をご利用下さい。<br>
                            日曜日・年末年始（12月30日～1月3日）は運休いたします。
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="terms-of-use-3" name="terms-of-use-3">
                        <label class="form-check-label" for="terms-of-use-3">
                            利用については、しばらく無料です。タクシーとは違い、配車されないことがあります。
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="terms-of-use-4" name="terms-of-use-4">
                        <label class="form-check-label" for="terms-of-use-4">
                            乗り降りできる場所は、予め登録した場所に限定となります。途中下車等は、安全上対応致しかねます。（自宅を含め最大５か所登録できます。）
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="terms-of-use-5" name="terms-of-use-5">
                        <label class="form-check-label" for="terms-of-use-5">
                            予定の迎車時間には必ず乗車できる状態でお待ち下さい。不在であったり、直ぐに乗れる状態でない場合、お待ちすることはできません。
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="terms-of-use-6" name="terms-of-use-6">
                        <label class="form-check-label" for="terms-of-use-6">
                            オンデマンドの配車となる為、お時間の指定はできません。また予定迎車時間については、交通事情により遅れることもありますので、ご了承ください。
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="terms-of-use-7" name="terms-of-use-7">
                        <label class="form-check-label" for="terms-of-use-7">
                            全ての車に数字が大きく貼ってあります。迎車依頼時にお知らせする番号の車が見えましたら、手を挙げてドライバーに合図をしていただきますようお願いいたします。
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="terms-of-use-8" name="terms-of-use-8">
                        <label class="form-check-label" for="terms-of-use-8">
                            マスクの着用・事前の検温をお願いいたします。体調が悪い時のご利用はお控えください。発熱のある場合（37.5度以上）は、ご利用をお断りいたします。
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="terms-of-use-9" name="terms-of-use-9">
                        <label class="form-check-label" for="terms-of-use-9">
                            乗車中の事故については、乗車中の送迎車が加入する自動車保険でしか対応できません。
                        </label>
                    </div>

                    <div class="form-check">
                        上記、内容に同意し参加申し込み致します。
                    </div>
                </div>
            </div>

            <!-- 個人情報取り扱い同意書 -->
            <div class="row justify-content-center mt-5">
                <div class="col col-sm-6">
                    <h4 class="text-center">
                        個人情報取り扱い同意書
                    </h4>

                    <p>
                        一般社団法人ソーシャルアクション機構(以下「当機構」)では、お預かりした個人情報について、以下のとおり適正かつ安全に管理・運用することに努めます。
                    </p>

                    <p>
                        １．利用目的<br>
                        当機構は、収集した個人情報について、以下の目的のために利用いたします。<br>
                        ①「群馬版MaaSサービス実証実験」（以下、本実証実験）の実施及び開発・検証のため<br>
                        ②契約者さまとの連絡、協力、交渉、契約の履行等<br>
                        ③当機構の本実証実験参加事業所との取次ぎ、媒介等
                    </p>

                    <p>
                        ２．第三者提供<br>
                        当機構は、以下の場合を除いて、個人データを第三者へ提供することはしません。<br>
                        ①法令に基づく場合<br>
                        ②当機構の本実証実験における、本実証実験参加事業所との連絡、協力、交渉、契約の履行等<br>
                        ③国、都道府県、市町村及び本実証実験の連携先に対し、本実証実験の実施に必要な場合
                    </p>

                    <p>
                        ３．開示請求<br>
                        当機構では、「開示対象個人情報」の本人またはその代理人からの開示、 削除・訂正、利用停止等の求めに応じます。手続きにあたっては、ご本人確認のうえ対応させていただきます。詳細については、以下「個人情報相談窓口」へご連絡ください。
                    </p>

                    <div>
                        個人情報相談窓口
                    </div>


                    <div class="border p-3 mt-3">
                        〒371-0847 群馬県前橋市大友町3-24-1ホテル1-2-3前橋ウエスト館3階<br>
                        一般社団法人ソーシャルアクション機構<br>
                        個人情報問い合わせ窓口: 大江<br>
                        TEL: 027-212-4721<br>
                        E-mail: sao.mover@socialaction.net
                    </div>

                    <div class="mt-3">
                        以上<br>
                        上記の個人情報取り扱い事項について同意します。
                    </div>

                    <div class="form-check mt-1">
                        <input class="form-check-input" type="checkbox" value="1" id="personal-information" name="personal-information">
                        <label class="form-check-label" for="personal-information">
                            同意する
                        </label>
                    </div>

                    <div class="text-center mt-3 mb-5">
                        <button type="submit" class="btn btn-primary" id="submit-button" name="submit" value="送信" disabled>
                            送信する
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $("form").change(function(e) {
            validation(encodeURIComponent);
        });

        // フォームの入力チェック
        const validation = (e) => {
            //フォーム内の要素に変更があると発火
            const target = $(e.target)

            let validForm = true;

            // input フォームの確認
            const requiredInput = [
                'external-id',
                'applicant-name',
                'applicant-furigana',
                'applicant-tel',
            ];

            if (!$('#is-same-information-as-applicant').prop('checked')) {
                requiredInput.push('user-name', 'user-furigana', 'user-tel');
            }

            for (let i = 0; i < requiredInput.length; i++) {
                // 1つでも入力されていない場合はfalseをセット
                if ($(`#${requiredInput[i]}`).val() == '') {
                    validForm = false;
                }
            }

            // checkbox の確認
            const requiredCheckbox = [
                'terms-of-use-1',
                'terms-of-use-2',
                'terms-of-use-3',
                'terms-of-use-4',
                'terms-of-use-5',
                'terms-of-use-6',
                'terms-of-use-7',
                'terms-of-use-8',
                'terms-of-use-9',
                'personal-information',
            ];

            for (let i = 0; i < requiredCheckbox.length; i++) {
                // 1つでもチェックされていない場合はfalseをセット
                if (!$(`#${requiredCheckbox[i]}`).prop('checked')) {
                    validForm = false;
                }
            }

            if (validForm) {
                // 送信を許可
                $('#submit-button').prop('disabled', false);
            } else {
                // 送信ボタンを無効にする
                $('#submit-button').prop('disabled', true);
            }
        };

        // 利用者フォームのコントロール
        $('#is-same-information-as-applicant').change(function() {
            const isChecked = $(this).prop('checked');

            const inputList = [
                'user-name',
                'user-furigana',
                'user-tel',
            ];

            for (let i = 0; i < inputList.length; i++) {
                if (isChecked) {
                    // 入力を許可しない
                    $(`#${inputList[i]}`)
                        .prop('disabled', true)
                        // 入力フォームをリセット
                        .val('');
                } else {
                    // 入力を許可する
                    $(`#${inputList[i]}`).prop('disabled', false);
                }
            }
        });
    </script>
</body>

</html>