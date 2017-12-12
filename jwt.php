<?php
/**
 * Created by PhpStorm.
 * User: riapl
 * Date: 12/11/2017
 * Time: 19:22
 */

//um token composto de três partes:

//1 - header - qual tipo token e algoritimo da assinatura
//2 - payload - quem é emissor do token, expiração, e-mail, name,
     //corpo do token
//3 - assinatura - documento

//definir as informações

$cabecalho = [
  'alg' => 'HS256',
  'typ' => 'JWT'
];

$corpoDaInformacao = [
    'name' => 'Ricardo Lopes',
    'email' => 'riaplopes@gmail.com',
    'role' => 'admin',
];

$cabecalho = json_encode($cabecalho);

$corpoDaInformacao = json_encode($corpoDaInformacao);

echo "Cabecalho JSON: $cabecalho";
echo "\n";
echo "Corpo da Informacao JSON: $corpoDaInformacao";
echo "\n\n";

$cabecalho = base64_encode($cabecalho);
$corpoDaInformacao = base64_encode($corpoDaInformacao);



echo "Cabecalho Base64: $cabecalho";
echo "\n";
echo "Corpo da Informacao Base64: $corpoDaInformacao";
echo "\n\n";
echo "$cabecalho.$corpoDaInformacao";
echo "\n\n";

$chave = "askljljfdfj98235451385765654644";

$assinatura = hash_hmac('sha256',"$cabecalho.$corpoDaInformacao",$chave,true);

echo "Assinatura RAW: $assinatura";
echo "\n\n";
$assinatura = base64_encode($assinatura);
echo "Assinatura Base64: $assinatura";
echo "\n\n";

echo "JWT: $cabecalho.$corpoDaInformacao.$assinatura";

