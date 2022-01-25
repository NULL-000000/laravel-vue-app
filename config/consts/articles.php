<?php

return [

    'status_type' => [
        0 => [
            'status_value' => 'all',
            'status_text' => 'すべて',
        ],
        1 => [
            'status_value' => 'declaration',
            'status_text' => '宣言中',
        ],
        2 => [
            'status_value' => 'success',
            'status_text' => '達成',
        ],
        3 => [
            'status_value' => 'failure',
            'status_text' => '失敗',
        ],
    ],

    'sort_type' => [
        0 => [
            'sort_value' => 'create_at_desc',
            'sort_text' => '新着順',
        ],
        1 => [
            'sort_value' => 'create_at_asc',
            'sort_text' => '古い順',
        ],
        2 => [
            'sort_value' => 'like_count_desc',
            'sort_text' => 'いいね数順',
        ],
        3 => [
            'sort_value' => 'comment_count_desc',
            'sort_text' => 'コメント数順',
        ],
    ],
    
];
