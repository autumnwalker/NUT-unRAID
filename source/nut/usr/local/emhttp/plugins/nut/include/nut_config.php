<?
require_once '/usr/local/emhttp/plugins/nut/include/nut_helpers.php';

$sName = "nut";
$nut_cfg       = parse_ini_file("/boot/config/plugins/$sName/$sName.cfg");
$nut_service   = isset($nut_cfg['SERVICE'])      ? htmlspecialchars($nut_cfg['SERVICE'])    : 'disable';
$nut_power     = isset($nut_cfg['POWER'])        ? htmlspecialchars($nut_cfg['POWER'])      : 'auto';
$nut_powerva   = isset($nut_cfg['POWERVA'])      ? intval($nut_cfg['POWERVA'])              : 0;
$nut_powerw    = isset($nut_cfg['POWERW'])       ? intval($nut_cfg['POWERW'])               : 0;
$nut_manual    = isset($nut_cfg['MANUAL'])       ? htmlspecialchars($nut_cfg['MANUAL'])     : 'disable';
$nut_name      = isset($nut_cfg['NAME'])         ? htmlspecialchars($nut_cfg['NAME'])       : 'ups';
$nut_monuser   = isset($nut_cfg['MONUSER'])      ? htmlspecialchars($nut_cfg['MONUSER'])    : 'monuser';
$nut_monpass   = isset($nut_cfg['MONPASS'])      ? htmlspecialchars($nut_cfg['MONPASS'])    : base64_encode('monpass');
$nut_slaveuser = isset($nut_cfg['SLAVEUSER'])    ? htmlspecialchars($nut_cfg['SLAVEUSER'])  : 'slaveuser';
$nut_slavepass = isset($nut_cfg['SLAVEPASS'])    ? htmlspecialchars($nut_cfg['SLAVEPASS'])  : base64_encode('slavepass');
$nut_driver    = isset($nut_cfg['DRIVER'])       ? htmlspecialchars($nut_cfg['DRIVER'])     : 'custom';
$nut_serial    = isset($nut_cfg['SERIAL'])       ? htmlspecialchars($nut_cfg['SERIAL'])     : 'none';
$nut_port      = isset($nut_cfg['PORT'])         ? htmlspecialchars($nut_cfg['PORT'])       : 'auto';
$nut_ip        = preg_match('/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/', $nut_cfg['IPADDR']) ? htmlspecialchars($nut_cfg['IPADDR']) : '127.0.0.1';
$nut_mode      = isset($nut_cfg['MODE'])         ? htmlspecialchars($nut_cfg['MODE'])       : 'standalone';
$nut_shutdown  = isset($nut_cfg['SHUTDOWN'])     ? htmlspecialchars($nut_cfg['SHUTDOWN'])   : 'sec_timer';
$nut_battery   = isset($nut_cfg['BATTERYLEVEL']) ? intval($nut_cfg ['BATTERYLEVEL'])        : 20;
$nut_seconds   = isset($nut_cfg['SECONDS'])      ? intval($nut_cfg ['SECONDS'])             : 240;
$nut_timeout   = isset($nut_cfg['TIMEOUT'])      ? intval($nut_cfg ['TIMEOUT'])             : 240;
$nut_upskill   = isset($nut_cfg['UPSKILL'])      ? htmlspecialchars($nut_cfg ['UPSKILL'])   : 'disable';
$nut_poll      = isset($nut_cfg['POLL'])         ? intval($nut_cfg ['POLL'])                : 15;
$nut_community = isset($nut_cfg['COMMUNITY'])    ? htmlspecialchars($nut_cfg ['COMMUNITY']) : 'public';
$nut_footer    = isset($nut_cfg['FOOTER'])       ? htmlspecialchars($nut_cfg ['FOOTER'])    : 'disable';
$nut_runtime   = isset($nut_cfg['RUNTIME'])      ? htmlspecialchars($nut_cfg ['RUNTIME'])   : 'battery.runtime';
$nut_running   = (intval(trim(shell_exec( "[ -f /proc/`cat /var/run/upsmon.pid 2> /dev/null`/exe ] && echo 1 || echo 0 2> /dev/null" ))) === 1 );
?>