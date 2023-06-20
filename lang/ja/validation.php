<?php
return [
    // エラーメッセージを設定
    'exists' => '正しい :attribute を選択してください。',
    'max' => [
        'numeric' => ':attribute は :max 以下を入力してください。',
        'string' => ':attribute は :max 文字以内で入力してください。',
    ],
    'min' => [
        'numeric' => ':attribute は :min 以上を入力してください。',
        'string' => ':attribute は :min 文字以上を入力してください。',
    ],
    'numeric' => ':attribute は数値で入力してください。',
    'required' => ':attribute は必須入力です',
    'unique' => ':attribute は既に登録されています。',
    'email'=> ':attribute は有効なアドレスを入力してください。',

    // キー名も日本語に変更
    'attributes' => [
        'sNumber' => '生徒番号',
        'name' => '名前',
        'email' => 'メールアドレス',
        'twitter' => 'twitterID',
        'other' => 'その他'
    ],
];
