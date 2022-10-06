<div class="container">
    <p>Hola Estimado Usuario {{$usuario}}</p>
    <p>
        Hemos recibido su peticion de Guia 
    </p>
    <p>
        Los datos del Remitente <b>{{ $objeto->nombre}}</b> son:
        <p>Domicilio: <b> {{ $objeto->calle }}, {{ $objeto->numero }}, {{ $objeto->colonia }}, {{ $objeto->entidad_federativa }}, CP: {{ $objeto->cp }} </b> </p>
    </p>
    <p></p><br>
    <p>
        
        Con Destino <b>{{ $objeto->nombre_d}}</b> son:
        <p>Domicilio: <b> {{ $objeto->calle_d }}, {{ $objeto->numero_d }}, {{ $objeto->colonia_d }}, {{ $objeto->entidad_federativa_d }}, CP: {{ $objeto->cp_d }} </b> </p>

    </p>
    <p></p><br>
    Paquete enviado con <b>{{ $nombre }}</b>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>PESO</th>
                <th>ALTO</th>
                <th>ANCHO</th>
                <th>LARGO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objeto->peso as $key => $value)
                <tr>
                    <td>{{ $objeto->peso[$key] }}kg.</td>
                    <td>{{ $objeto->alto[$key] }}</td>
                    <td>{{ $objeto->ancho[$key] }}</td>
                    <td>{{ $objeto->largo[$key] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>