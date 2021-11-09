<?php

$questionario = [
    // 1º pergunta
    [
        'pergunta' => 'HTML é uma linguagem de...', // String
        'respostas' => [
            [
                'texto' => 'Formatação', // String
                'certa' => true // Boolean
            ],
            [
                'texto' => 'Criação',
                'certa' => false
            ],
            [
                'texto' => 'Exclusão',
                'certa' => false
            ],
            [
                'texto' => 'Programação',
                'certa' => false
            ]
        ]
    ],
    // 2º pergunta
    [
        'pergunta' => 'Quando o programador deseja aplicar uma formatação na tag, esse processo é chamado de estilo...',
        'respostas' => [
            [
                'texto' => 'In-tag',
                'certa' => false
            ],
            [
                'texto' => 'Incorporado',
                'certa' => false
            ],
            [
                'texto' => 'CSS',
                'certa' => false
            ],
            [
                'texto' => 'In-line',
                'certa' => true
            ]
        ]
    ],
    // 3º pergunta
    [
        'pergunta' => 'A tag para adição do estilo CSS fica entre que tags?',
        'respostas' => [
            [
                'texto' => '<body></body>',
                'certa' => false
            ],
            [
                'texto' => '<head></head>',
                'certa' => false
            ],
            [
                'texto' => '<title></title>',
                'certa' => false
            ],
            [
                'texto' => '</title></head>',
                'certa' => true
            ]
        ]
    ],
    // 4º pergunta
    [
        'pergunta' => 'Escolha a alternativa que contém uma tag de formatação de lista.',
        'respostas' => [
            [
                'texto' => '<li style="list-style-type:triangle">',
                'certa' => false
            ],
            [
                'texto' => '<ul style="list-style-type:circle">',
                'certa' => true
            ],
            [
                'texto' => '<ol style="list-style-type:square">',
                'certa' => false
            ],
            [
                'texto' => '<ul style="list-style-type:upper-roman">',
                'certa' => false
            ]
        ]
    ],
    // 5º pergunta
    [
        'pergunta' => 'Para deixar a página com o fundo azul claro, qual tag deve ser inserida?',
        'respostas' => [
            [
                'texto' => '<body style="background-color:lightblue">',
                'certa' => true
            ],
            [
                'texto' => '<body style="background-color:#0000FF">',
                'certa' => false
            ],
            [
                'texto' => '<body style="back-color-type:blue">',
                'certa' => false
            ],
            [
                'texto' => '<body style="backcolor:blue">',
                'certa' => false
            ]
        ]
    ]
];

return $questionario;