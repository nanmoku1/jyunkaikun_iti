<?php
// curlが実行できるか
echo('test2');
echo(PHP_EOL);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.2chan.net/'); // 取得するURLを指定
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す //全てで必要

//curl_setopt($ch, CURLOPT_POST, TRUE); // POST時に必要
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  // オレオレ証明書対策 サーバー証明書の検証を行わない //なくても良いが、基本全てで必要
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // これも基本必要

$headers = [];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

echo curl_exec($ch);

// セッションを終了
curl_close($ch);
