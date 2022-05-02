<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>Paises</title>
</head>
<body>
    <h1>Paises de la región</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-primary">Pais</th>
                <th class="text-danger">Capital</th>
                <th class="text-success">Moneda</th>
                <th class="text-info">Poblacion</th>
                <th class="text-muted">Ciudades</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Paises as $Pais => $infoPais)
            <tr>
                <td rowspan="{{ count($infoPais['ciu']) }}" class="text-primary">{{ $Pais }}</td>
                <td rowspan="{{ count($infoPais['ciu']) }}" class="text-danger">{{ $infoPais["cap"] }}</td>
                <td rowspan="{{ count($infoPais['ciu']) }}" class="text-success">{{ $infoPais["mon"] }}</td>
                <td rowspan="{{ count($infoPais['ciu']) }}" class="text-info">{{ $infoPais["pob"] }}
                    millones hab.
                </td>
                @foreach($infoPais["ciu"] as $ciudad)
                <td class="text-muted">
                    {{ $ciudad }}
                </td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>