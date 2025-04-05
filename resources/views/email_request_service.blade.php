
@php
$cropType = \App\Models\CropType::find($crop_type_id);
$serviceType = \App\Models\ServiceType::find($service_type_id);
@endphp
<!DOCTYPE html>
<html>
<body>
    <h1>Nueva solicitud de servicio.</h1>
    <p>Compañía: {{$company}}</p>
    <p>CIF:  {{$cif}}</p>
    <p>Teléfono:  {{$phone}}</p>
    <p>Email:  {{$email}}</p>
    <p>Dirección:  {{$address}}</p>
    <p>Fecha de servicio:  {{\Carbon\Carbon::parse($date_start)->format('d-m-Y')}}</p>
    <p>Tipo de servicio: {{$serviceType->title}} </p>
    <p>Tipo de Cultivo: {{$cropType->name}} </p>
   <hr>
  
</body>
</html>