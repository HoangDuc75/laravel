<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bàn cờ {{ $n }} x {{ $n }}</title>
</head>
<body>
    <h1>Bàn cờ {{ $n }} x {{ $n }}</h1>

    <table border="1" cellpadding="10">
        @for ($i = 0; $i < $n; $i++)
            <tr>
            @for ($j = 0; $j < $n; $j++)
                <td style="background: {{ ($i + $j) % 2 == 0 ? '#fff' : '#000' }};
                    width:30px;height:30px;">
                </td>
                @endfor
                </tr>
                @endfor
    </table>
</body>
</html>
