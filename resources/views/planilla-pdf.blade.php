<!DOCTYPE html>
<html lang="en">
<?php 

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Boleta de Pago</title>
  <style>
    .center-table {
      position: absolute;
      top: 50%;
      /* Posiciona la tabla a la mitad de la página */
      left: 0;
      right: 0;
      transform: translateY(-50%);
    }

    .page-break {
      page-break-before: always;
    }

    .empresa-details {
      margin-bottom: 20px;
    }

    body {
      font-family: Helvetica, Arial, sans-serif;
      font-size: 11px;
    }

    html {
      margin-top: 5px;
      margin-left: 20px;
      margin-right: 20px;
      margin-bottom: 0px;
    }

    #dt_historial_compra {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      font-size: 11px;
      text-align: center;
    }

    #dt_historial_compra td,
    #dt_historial_compra th {
      border: 1px solid #ddd;
      padding: 3px;
    }

    #dt_historial_compra tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #dt_historial_compra tr:hover {
      background-color: #ddd;
    }

    #dt_historial_compra th {
      padding-top: 3px;
      padding-bottom: 3px;
      text-align: center;
      background-color: #000000;
      color: white;
    }
  </style>
</head>

<body>
  <table style="width: 100%;margin-top:2px">
    @foreach ($empleados as $empleado)
    <table style="width: 100%;margin-top:2px">
      <tr>
        <td style="width: 15%;margin:0px">
          <img src='{{ $empleado->imagen }}' width="100" height="80" style="margin-top: 7px">
        </td>
        <td style="width: 75%;margin:0px">
          <table style="width:100%">
            <tr>
              <td style="text-align: center;margin-top: 0px;font-size:14px;font-family: Helvetica, Arial, sans-serif;">
                <b>{{ $empleado->nombre_empresa }}</b><br><span style="font-size: 12px">Recibo de pago: </span> <br>
                <span> Recibo de pago del {{ \Carbon\Carbon::parse($planilla->fecha_desde)->format('d/m/Y') }} Al {{
                  \Carbon\Carbon::parse($planilla->fecha_hasta)->format('d/m/Y') }} </span>
              </td>
            </tr>
          </table>
          <!--fin segunda tabla-->
        </td>
        <td style="width: 10%;margin:0px">
          <table>
            <tr>
              <td style="text-align:right; font-size:12px;color: #008C45"><strong>ORIGINAL</strong></td>
            </tr>
            <tr>
              <td style="color:red;text-align:right; font-size:12px;color: #CD212A"><strong>No.&nbsp;<span> {{
                    $empleado->id_pla}}</strong></td>
            </tr>
          </table>
          <!--fin segunda tabla-->
        </td>
        <!--fin segunda columna-->
      </tr>
    </table>

    <body>
      <table style="width: 100%;margin-top:2px">

        <td style="width: 77%;margin:0px" colspan="2">
          <table style="width:100%">
            <tr>
              <td style="text-align: left;margin-top: 0px;font-size:14px;font-family: Helvetica, Arial, sans-serif;">
                <strong>Nombre:</strong> {{ ucwords(strtolower($empleado->nombre)) }}
                <br>
                <strong>Puesto:</strong> {{ ucwords(strtolower($empleado->cargo)) }}
                <br>
                <strong>Direccion:</strong> {{ ucwords(strtolower($empleado->domicilio)) }}
              </td>
            </tr>
          </table>
          <!--fin segunda tabla-->
        </td>
        <td style="width: 23%;margin:0px">
          <table>
            <tr>
              <td style="text-align: right;margin-top: 0px;font-size:14px;font-family: Helvetica, Arial, sans-serif;">
                <strong>Dias trabajados:&nbsp; </strong>{{
                $empleado->dias_trabajados}}
              </td>
            </tr>
            <tr>
              <td style="text-align: right;margin-top: 0px;font-size:14px;font-family: Helvetica, Arial, sans-serif;">
                <strong>Salario diario:&nbsp; </strong>${{
                number_format($empleado->sueldo_diario,2,".",",")}}
              </td>
            </tr>
          </table>
          <!--fin segunda tabla-->
        </td>
        <!--fin segunda columna-->
        </tr>

      </table>

      <table style="width:100%;border: 1px solid #000000;" class="table-hover table-bordered" id="dt_historial_compra"
        data-order='[[ 0, "desc" ]]' width="100%;">
        <thead class="style_th bg-dark" style="color: white;text-align:center; font-size:11px">
          <tr>
            <th colspan="3">Detalle de ingresos</th>

            <th colspan="3">Detalle de descuentos</th>
          </tr>
        </thead>
        <tbody class="style_th" style='font-size:13px; text-align:center;padding:1px'>
          <tr>
            <td colspan="2" style="text-align: left;">Sueldo Quincenal</td>
            <td style="text-align: right; padding-right: 10px;"> $ {{
              number_format($empleado->subtotal_devengado,2,".",",") }} </td>
            <td colspan="2" style="text-align: left;padding-left: 10px;">ISSS 3% </td>
            <td style="text-align: right; "> $ {{ number_format($empleado->isss,2,".",",") }} </td>
          </tr>
          <tr>
            <td style="text-align: left;">Horas Extras</td>
            <td> {{ $empleado->cant_horas}} </td>
            <td style="text-align: right;padding-right: 10px;""> $ {{   number_format($empleado->horas_extra,2,"
              .",",")}} </td>
            <td colspan="2" style="text-align: left;padding-left: 10px;">AFP 7.25% </td>
            <td style="text-align: right;"> ${{ number_format($empleado->afp,2,".",",")}} </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: left;">Bonificaciones</td>
            <td style="text-align: right;padding-right: 10px;"> ${{ number_format($empleado->bonificaciones,2,".",",")}}
            </td>
            <td colspan="2" style="text-align: left;padding-left: 10px;">ISR </td>
            <td style="text-align: right;"> ${{ number_format($empleado->isr,2,".",",")}}</td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: left;">Vacaciones</td>
            <td style="text-align: right;padding-right: 10px;"> ${{ number_format($empleado->vacaciones,2,".",",")}}
            </td>
            <td colspan="2" style="text-align: left;padding-left: 10px;">Otros Descuentos</td>
            <td style="text-align: right;"> ${{ number_format($empleado->otros_desc,2,".",",")}}</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2" style="text-align: left;padding-left: 10px;">Llegadas Tarde</td>
            <td style="text-align: right;"> ${{ number_format($empleado->llegadas_tarde,2,".",",") }}</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2" style="text-align: left;padding-left: 10px;">Adelanto salarial</td>
            <td style="text-align: right;"> ${{ number_format($empleado->adelanto_salarial,2,".",",") }}</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2" style="text-align: left;padding-left: 10px;">Prestamos</td>
            <td style="text-align: right;"> ${{ number_format($empleado->prestamos,2,".",",") }}</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2" style="text-align: left;padding-left: 10px;">Dias injustificados</td>
            <td style="text-align: right;"> ${{ number_format($empleado->dias_injustificados,2,".",",") }}</td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: right;">Total Ingresos</td>
            <td style="text-align: right;"><b> $ {{ number_format($empleado->total_ingresos,2,".",",") }} </b></td>
            <td colspan="2" style="text-align: right;">Total Descuentos</td>
            <td style="text-align: right;"><b> $ {{ number_format($empleado->total_descuentos,2,".",",") }}</b> </td>
          </tr>
          <tr>
            <td colspan="5" style="text-align: right;">Total Neto a Pagar</td>
            <td style="text-align: right;"><b> $ {{ number_format($empleado->total_neto, 2, ".", ",") }}</b></td>

          </tr>
        </tbody>
      </table>
    </body>
    <table style="width: 100%;">
      <tr>
        <!-- Elemento en el extremo izquierdo -->
        <td style="width: 35%; text-align: left; vertical-align: top;">
          <p>Contabilidad: </p>
          <br>
          <div style="width: 80%; border-bottom: 1px solid #ffffff; margin-top: 5px; padding-bottom: 5px;">
            <span>F:</span>_________________
          </div>
        </td>
    
        <!-- Elemento en el centro -->
        <td style="width: 35%; text-align: center; vertical-align: top;">
          <p>Recibe: {{ ucwords(strtolower($empleado->nombre)) }} </p>
          <br>
          <div style="width: 90%; border-bottom: 1px solid #ffffff; margin-top: 5px; padding-bottom: 5px;">
            <span>F:</span>_________________
          </div>
        </td>
    
        <!-- Elemento en el extremo derecho -->
        <td style="width: 30%; text-align: right;">
          <div style="width: 80%; border-bottom: 1px solid #ffffff; margin-top: 5px; padding-bottom: 5px;">
            <span style='float: right;margin-top: 5px;color:gray'>No.ID Planilla: {{ $planilla->id}} </span>
          </div>
        </td>
      </tr>
    </table>
    

    <p>
      ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    </p>

    <body>
      <table style="width: 100%;margin-top:2px">
        <tr>
          <td style="width: 15%;margin:0px">
            <img src='{{ $empleado->imagen }}' width="100" height="80" style="margin-top: 7px">
          </td>
          <td style="width: 75%;margin:0px">
            <table style="width:100%">
              <tr>
                <td
                  style="text-align: center; margin-top: 0px; font-size:14px; font-family: Helvetica, Arial, sans-serif;">
                  <b>{{ $empleado->nombre_empresa }}</b><br>
                  <span style="font-size: 12px">Recibo de pago: </span> <br>
                  <span> Recibo de pago del {{ \Carbon\Carbon::parse($planilla->fecha_desde)->format('d/m/Y') }} Al {{
                    \Carbon\Carbon::parse($planilla->fecha_hasta)->format('d/m/Y') }} </span>
                </td>
              </tr>
            </table>



            <!--fin segunda tabla-->
          </td>
          <td style="width: 10%;margin:0px">
            <table>
              <tr>
                <td style="text-align:right; font-size:12px;color: #008C45"><strong>COPIA</strong></td>
              </tr>
              <tr>
                <td style="color:red;text-align:right; font-size:12px;color: #CD212A"><strong>No.&nbsp;<span> {{
                  $empleado->id_pla}}</strong></td>
              </tr>
            </table>
            <!--fin segunda tabla-->
          </td>
          <!--fin segunda columna-->
        </tr>
      </table>

      <body>


        <!-- segunda parte -->
        <table style="width: 100%;margin-top:2px">

          <td style="width: 77%;margin:0px" colspan="2">
            <table style="width:100%">
              <tr>
                <td style="text-align: left;margin-top: 0px;font-size:14px;font-family: Helvetica, Arial, sans-serif;">
                  <strong>Nombre:</strong> {{ ucwords(strtolower($empleado->nombre)) }}
                  <br>
                  <strong>Puesto:</strong> {{ ucwords(strtolower($empleado->cargo)) }}
                  <br>
                  <strong>Direccion:</strong> {{ ucwords(strtolower($empleado->domicilio)) }}
                </td>
              </tr>
            </table>
            <!--fin segunda tabla-->
          </td>
          <td style="width: 23%;margin:0px">
            <table>
              <tr>
                <td style="text-align: right;margin-top: 0px;font-size:14px;font-family: Helvetica, Arial, sans-serif;">
                  <strong>Dias trabajados:&nbsp; </strong>{{
                  $empleado->dias_trabajados}}
                </td>
              </tr>
              <tr>
                <td style="text-align: right;margin-top: 0px;font-size:14px;font-family: Helvetica, Arial, sans-serif;">
                  <strong>Salario diario:&nbsp; </strong>${{
                  number_format($empleado->sueldo_diario,2,".",",")}}
                </td>
              </tr>
            </table>
            <!--fin segunda tabla-->
          </td>
          <!--fin segunda columna-->
          </tr>
  
        </table>

        <table style="width:100%;border: 1px solid #000000;" class="table-hover table-bordered" id="dt_historial_compra"
          data-order='[[ 0, "desc" ]]' width="100%;">
          <thead class="style_th bg-dark" style="color: white;text-align:center; font-size:11px">
            <tr>
              <th colspan="3">DETALLE DE INGRESOS</th>

              <th colspan="3">DETALLE DE DESCUENTOS</th>
            </tr>
          </thead>
          <tbody class="style_th" style='font-size:13px; text-align:center;padding:1px'>
            <tr>
              <td colspan="2" style="text-align: left;">Sueldo Quincenal</td>
              <td style="text-align: right; padding-right: 10px;"> $ {{
                number_format($empleado->subtotal_devengado,2,".",",") }} </td>
              <td colspan="2" style="text-align: left;padding-left: 10px;">ISSS 3% </td>
              <td style="text-align: right; "> $ {{ number_format($empleado->isss,2,".",",") }} </td>
            </tr>
            <tr>
              <td style="text-align: left;">Horas Extras</td>
              <td> {{ $empleado->cant_horas}} </td>
              <td style="text-align: right;padding-right: 10px;""> $ {{   number_format($empleado->horas_extra,2,"
                .",",")}} </td>
              <td colspan="2" style="text-align: left;padding-left: 10px;">AFP 7.25% </td>
              <td style="text-align: right;"> ${{ number_format($empleado->afp,2,".",",")}} </td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: left;">Bonificaciones</td>
              <td style="text-align: right;padding-right: 10px;"> ${{
                number_format($empleado->bonificaciones,2,".",",")}} </td>
              <td colspan="2" style="text-align: left;padding-left: 10px;">ISR </td>
              <td style="text-align: right;"> ${{ number_format($empleado->isr,2,".",",")}}</td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: left;">Vacaciones</td>
              <td style="text-align: right;padding-right: 10px;"> ${{ number_format($empleado->vacaciones,2,".",",")}}
              </td>
              <td colspan="2" style="text-align: left;padding-left: 10px;">Otros Descuentos</td>
              <td style="text-align: right;"> ${{ number_format($empleado->otros_desc,2,".",",")}}</td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td colspan="2" style="text-align: left;padding-left: 10px;">Llegadas Tarde</td>
              <td style="text-align: right;"> ${{ number_format($empleado->llegadas_tarde,2,".",",") }}</td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td colspan="2" style="text-align: left;padding-left: 10px;">Adelanto salarial</td>
              <td style="text-align: right;"> ${{ number_format($empleado->adelanto_salarial,2,".",",") }}</td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td colspan="2" style="text-align: left;padding-left: 10px;">Prestamos</td>
              <td style="text-align: right;"> ${{ number_format($empleado->prestamos,2,".",",") }}</td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td colspan="2" style="text-align: left;padding-left: 10px;">Dias injustificados</td>
              <td style="text-align: right;"> ${{ number_format($empleado->dias_injustificados,2,".",",") }}</td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: right;">Total Ingresos</td>
              <td style="text-align: right;"><b> $ {{ number_format($empleado->total_ingresos,2,".",",") }} </b></td>
              <td colspan="2" style="text-align: right;">Total Descuentos</td>
              <td style="text-align: right;"><b> $ {{ number_format($empleado->total_descuentos,2,".",",") }}</b> </td>
            </tr>
            <tr>
              <td colspan="5" style="text-align: right;">Total Neto a Pagar</td>
              <td style="text-align: right;"><b> $ {{ number_format($empleado->total_neto, 2, ".", ",") }}</b></td>

            </tr>
          </tbody>
        </table>
        <br>
        <table style="width: 100%;">
          <tr>
            <!-- Elemento en el extremo izquierdo -->
            <td style="width: 35%; text-align: left; vertical-align: top;">
              <p>Contabilidad: </p>
              <br>
              <div style="width: 80%; border-bottom: 1px solid #ffffff; margin-top: 5px; padding-bottom: 5px;">
                <span>F:</span>_________________
              </div>
            </td>
        
            <!-- Elemento en el centro -->
            <td style="width: 35%; text-align: center; vertical-align: top;">
              <p>Recibe: {{ ucwords(strtolower($empleado->nombre)) }} </p>
              <br>
              <div style="width: 90%; border-bottom: 1px solid #ffffff; margin-top: 5px; padding-bottom: 5px;">
                <span>F:</span>_________________
              </div>
            </td>
        
            <!-- Elemento en el extremo derecho -->
            <td style="width: 30%; text-align: right;">
              <div style="width: 80%; border-bottom: 1px solid #ffffff; margin-top: 5px; padding-bottom: 5px;">
                <span style='float: right;margin-top: 5px;color:gray'>No.ID Planilla: {{ $planilla->id}} </span>
              </div>
            </td>
          </tr>
        </table>
        <div class="page-break"></div>

        @endforeach
  </table>

</body>

</html>