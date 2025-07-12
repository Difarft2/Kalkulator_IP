<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class IPCalculatorController extends Controller
{
    public function index()
    {
        return view('kalkulator');
    }

    public function calculate(Request $request)
    {
        $ip = $request->input('ip');
        $cidr = (int) $request->input('cidr');

        if (!filter_var($ip, FILTER_VALIDATE_IP) || $cidr < 1 || $cidr > 32) {
            return back()->with('error', 'IP address atau netmask tidak valid.');
        }

        $ipLong = ip2long($ip);
        $netmask = long2ip(-1 << (32 - $cidr));
        $wildcard = long2ip(~ip2long($netmask));
        $network = long2ip($ipLong & ip2long($netmask));
        $broadcast = long2ip(($ipLong & ip2long($netmask)) | (~ip2long($netmask)));

        $hostMin = long2ip(ip2long($network) + 1);
        $hostMax = long2ip(ip2long($broadcast) - 1);
        $hosts = max(0, (2 ** (32 - $cidr)) - 2);

        return view('kalkulator', compact(
            'ip', 'cidr', 'netmask', 'wildcard', 'network',
            'broadcast', 'hostMin', 'hostMax', 'hosts'
        ));
    }

    public function apiCalculate(Request $request)
{
    $ip = $request->input('ip');
    $cidr = (int) $request->input('cidr');

    if (!filter_var($ip, FILTER_VALIDATE_IP) || $cidr < 1 || $cidr > 32) {
        return response()->json([
            'error' => 'IP address atau CIDR tidak valid.'
        ], 400);
    }

    $ipLong = ip2long($ip);
    $netmask = long2ip(-1 << (32 - $cidr));
    $wildcard = long2ip(~ip2long($netmask));
    $network = long2ip($ipLong & ip2long($netmask));
    $broadcast = long2ip(($ipLong & ip2long($netmask)) | (~ip2long($netmask)));
    $hostMin = long2ip(ip2long($network) + 1);
    $hostMax = long2ip(ip2long($broadcast) - 1);
    $hosts = max(0, (2 ** (32 - $cidr)) - 2);

    return response()->json([
        'ip' => $ip,
        'cidr' => $cidr,
        'netmask' => $netmask,
        'wildcard' => $wildcard,
        'network' => "$network/$cidr",
        'broadcast' => $broadcast,
        'hostMin' => $hostMin,
        'hostMax' => $hostMax,
        'hosts' => $hosts
    ]);
}

}
