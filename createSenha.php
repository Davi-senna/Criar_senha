<?php


/*

input example

$model_path = "vs-pequena.png";
$idade_maxima = 21 . " anos";
$idade_minima = 17 . " anos";
$nome_turma = 2278;
$curso = "Aula de música";
$senha = "36";
$autenticacao = "RGSmfmtm";
$validade = "14/06/2022";
$dias_aula = "Terça e Quinta";
$horario = "08:00 às 09:00";

createSenha($model_path, $idade_maxima, $idade_minima, $nome_turma, $curso, $senha, $autenticacao, $validade, $dias_aula, $horario);

*/



function createSenha($model_path, $idade_maxima, $idade_minima, $nome_turma, $curso, $senha, $autenticacao, $validade, $dias_aula, $horario)
{

    $image = imagecreatefrompng($model_path);
    $titleColor = imagecolorallocate($image, 0, 0, 0);

    imagettftext($image, 9, 0, 20, 65, $titleColor, "Roboto-Light.ttf", "Turma: " . $nome_turma);
    imagettftext($image, 9, 0, 20, 85, $titleColor, "Roboto-Light.ttf", "Válido até: " . $validade);
    imagettftext($image, 9, 0, 20, 230, $titleColor, "Roboto-Light.ttf", "Idade mínima: " . $idade_minima);
    imagettftext($image, 9, 0, 20, 250, $titleColor, "Roboto-Light.ttf", "Idade máxima: " . $idade_maxima);
    imagettftext($image, 20, 0, centralize_x(190, $curso), 145, $titleColor, "Roboto-Light.ttf", $curso);
    imagettftext($image, 11, 0, 230, 170, $titleColor, "Roboto-Light.ttf", "Nº " . $senha);
    imagettftext($image, 9, 0, 330, 250, $titleColor, "Roboto-Light.ttf", "Autenticação: " . $autenticacao);
    imagettftext($image, 9, 0, 330, 250, $titleColor, "Roboto-Light.ttf", "Autenticação: " . $autenticacao);
    imagettftext($image, 9, 0, 320, 65, $titleColor, "Roboto-Light.ttf", "Dias de aula: " . $dias_aula);
    imagettftext($image, 9, 0, 320, 85, $titleColor, "Roboto-Light.ttf", "Horário: " . $horario);


    header("Content-type: image/png");

    if(!is_dir('senhas'.DIRECTORY_SEPARATOR.$nome_turma)){

        mkdir('senhas'.DIRECTORY_SEPARATOR.$nome_turma);

    }

    imagepng($image, 'senhas'.DIRECTORY_SEPARATOR.$nome_turma.DIRECTORY_SEPARATOR."senha-" . $senha . ".png");

    imagedestroy($image);

    return $image;
}

function centralize_x($default_place, $item)
{

    $size = strlen($item);

    switch ($size) {

        case 9:

            return $default_place;

            break;

        case $size <= 0:

            return $default_place;

            break;

        case $size < 9:

            $letters = 9 - $size;
            $place = $default_place + $letters * 8;
            return $place;

            break;

        case $size > 9:

            $letters = $size - 9;
            $place = $default_place - ($letters / 3) * 14;
            return $place;

            break;
    }
}
