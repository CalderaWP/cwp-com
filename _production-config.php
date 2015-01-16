<?php
/**
 * WordPress configuration for live site
 */
//db
define( 'DB_NAME', 'cwp2');
define( 'DB_USER', 'a095ec0e2326' );
define( 'DB_PASSWORD', 'mS3cuNRMHX' );
define( 'DB_HOST',  'localhost');
//auth
define('AUTH_KEY',         'l^-/#0T3>984w3kkD/;(U_iOeO4<?Rz/Y3dP^Bx~B!,X=q{>j-*-w;2N @u!5+cL');
define('SECURE_AUTH_KEY',  'X]%]u&>`+ZV_i@+ct?VjZwoRkzAZ1xP9-^IaOI5.WwnZd#BkYAeP0bbE=*=pa}Mu');
define('LOGGED_IN_KEY',    ')k_x_^BEi$|$$y%]olky`g<Nx{~u5H<k2t;IHBxg,B0kU?sqTp|E9-7N9pXez?g9');
define('NONCE_KEY',        '7w4gLg6ex+Xq$Z}HPdgG<]%ertW-<+0zzO@8wnA,XMJ|,k-6G:7W.ON+fzBsK[Bd');
define('AUTH_SALT',        '!=UW[sd,+=)Sar[V|VB;dd|U //e{6;T-N`T)+{qT[FH6;>gC=63u+fPD oQyD1!');
define('SECURE_AUTH_SALT', 'MIqQ~$Z>NhTO`#{;[F(<Hq]K:~]udzI?w+ffoTP,0,7-e-ufb+~7rC[y+HufGNLW');
define('LOGGED_IN_SALT',   'I?m$(C:M@+]#YqxM*m3}?[7NN)K?-@9R+OI?|bu$fw*Wms{4,v}1^--`EjM|M,Cn');
define('NONCE_SALT',       't(]s*9`Q1avA8Cw770{-~2+UZx#pE`u*5RP(p+n#c/@UQh|n2}+YSP4sT:nV2 Sb');
//General debug
define(	'FS_METHOD', 'direct');
define( 'SAVEQUERIES', true );
//Pods debug
define( "PODS_DEVELOPER", false );
define( "PODS_GITHUB_UPDATE", false );
