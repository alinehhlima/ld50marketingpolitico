<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'ld50ma12_wordpress' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'ld50ma12_admin' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '2q+P+u~ZfknI' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jv$AE&N~o+jw]Zaf+8HX)Fdh;Rd jJJzzYe$)#6!tUH$zR.5,@7 4l>ong~I3u~{' );
define( 'SECURE_AUTH_KEY',  ' wnDm{e`9wTN4=Dv{yr!}>TC.`fS@ e:#U;9yfC- (:,R(N&4+k%DMQ[3s`TG]`_' );
define( 'LOGGED_IN_KEY',    'jT/y94)lf}b6JlRl0_mi,&#g@$2:lhw2^FJ K918-Cw?D2p<{QeiZvK}|RN:ex?G' );
define( 'NONCE_KEY',        '0}va|d1AwZM#zf35Zo[=anRZ8%Ke)FZR.O0JMVgn1/x<Usew@-Goz4;v#2n9)(g>' );
define( 'AUTH_SALT',        'jd6o)=z{]BjMoLW4+;V>3t oi|_vFc3gMxh~K, _dgmH s@<`W !{f64&=|^%Tly' );
define( 'SECURE_AUTH_SALT', 'FElIGllO;BNMYq2$5bmK.1NWNQNmcu9O&&}gU4WKwL}* 1:SJ?V5edYke#VucaY?' );
define( 'LOGGED_IN_SALT',   'HeTcjWlK@~t<4xJI+I+Li)gFX@;Yy+BTE6rg<3BlAjG/:)%=|WDw8$sDNA+bf5c|' );
define( 'NONCE_SALT',       'aUQ!z^tBpQ1)3]gxleC}W24H6EaJE~I. Cb^$Po;sjOgF`drDdSgM<Xf`ykR|Qu ' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
