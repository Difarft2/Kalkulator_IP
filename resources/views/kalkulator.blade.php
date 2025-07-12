<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IP Calculator</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    form {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin-bottom: 20px;
    }

    input[type="text"],
    input[type="number"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        flex: 1 1 45%;
        font-size: 16px;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        flex: 1 1 100%;
    }

    button:hover {
        background-color: #0056b3;
    }

    .output {
        margin-top: 25px;
        background-color: #f0f4ff;
        padding: 20px;
        border-radius: 10px;
        border-left: 5px solid #007bff;
    }

    .output p {
        margin: 8px 0;
        font-size: 15px;
    }

    .error {
        background-color: #ffe0e0;
        color: #b00020;
        padding: 10px;
        border-left: 5px solid #b00020;
        border-radius: 6px;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>IP Calculator</h2>

        @if(session('error'))
        <div class="error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('calculate') }}">
            @csrf
            <input type="text" name="ip" placeholder="e.g., 192.168.1.1" value="{{ old('ip', $ip ?? '') }}" required>
            <input type="number" name="cidr" placeholder="CIDR (e.g., 24)" value="{{ old('cidr', $cidr ?? '24') }}"
                min="1" max="32" required>
            <button type="submit">Calculate</button>
        </form>

        @isset($netmask)
        <div class="output">
            <p><strong>Address:</strong> {{ $ip }}</p>
            <p><strong>Netmask:</strong> {{ $netmask }} = {{ $cidr }}</p>
            <p><strong>Wildcard:</strong> {{ $wildcard }}</p>
            <p><strong>Network:</strong> {{ $network }}/{{ $cidr }}</p>
            <p><strong>Broadcast:</strong> {{ $broadcast }}</p>
            <p><strong>HostMin:</strong> {{ $hostMin }}</p>
            <p><strong>HostMax:</strong> {{ $hostMax }}</p>
            <p><strong>Hosts/Net:</strong> {{ $hosts }}</p>
        </div>
        @endisset
    </div>
</body>

</html>