<?php

namespace App\Libraries\Utilities;

use Illuminate\Support\Arr;

class CurlExe
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        \App\DebugClass::clog('CurlExe construct');
    }

    /**
     * Undocumented function
     *
     * @param array $exe_setting
     *              $exe_setting['url']
     *              $exe_setting['http_method']
     *              $exe_setting['get_data']
     *              $exe_setting['post_data']
     *              $exe_setting['bearer']
     *
     * @return string
     */
    public function exe(array $exe_setting)
    {
        \App\DebugClass::clog('CurlExe exe');
        // cURLセッションを初期化
        $curl = curl_init();

        // オプションを設定

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す

        // if (filled($exe_setting['url'])) {
        //     // URLがなければリクエスト先がわからない為ここで終了
        //     return;
        // }

        curl_setopt($curl, CURLOPT_URL, $exe_setting['url']);

        $is_post_put_delete = FALSE;
        if (Arr::exists($exe_setting, 'http_method') && mb_strtolower($exe_setting['http_method']) === 'post') {
            $is_post_put_delete = TRUE;
            curl_setopt($curl, CURLOPT_POST, TRUE); // POST時に必要
        } else if (Arr::exists($exe_setting, 'http_method') && mb_strtolower($exe_setting['http_method']) === 'put') {
            $is_post_put_delete = TRUE;
        } else if (Arr::exists($exe_setting, 'http_method') && mb_strtolower($exe_setting['http_method']) === 'delete') {
            $is_post_put_delete = TRUE;
        } else {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET'); // POSTの際には不要
        }

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  // オレオレ証明書対策 サーバー証明書の検証を行わない //なくても良いが、基本全てで必要
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // これも基本必要

        $headers[] = 'Accept: text/json'; // APIのリクエストである事をLaravel側に判断させる為に必要

        if (Arr::exists($exe_setting, 'bearer')) {
            $headers[] = 'Authorization: Bearer ' . $exe_setting['bearer']; // API認証が必要なコールに必要
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        if ($is_post_put_delete && Arr::exists($exe_setting, 'post_data')) {
            // $post_data = [
            //     'email' => 'cielo47@example.com',
            //     'password' => 'password',
            // ];
            // curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data)); // POST時に値を渡す際に必要
            curl_setopt($curl, CURLOPT_POSTFIELDS, $exe_setting['post_data']); // POST時に値を渡す際に必要。こっちの書き方は推奨されない
        }

        $response = curl_exec($curl);
        if ($response === FALSE) {
            // \App\DebugClass::clog(curl_error($curl));
            // \App\DebugClass::clog(curl_errno($curl));
            // \App\DebugClass::clog(gettype($response));
            $response = ''; // エラー時は空文字を返す
        }

        // セッションを終了
        curl_close($curl);

        return $response;
    }
}
