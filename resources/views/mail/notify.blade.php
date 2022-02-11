@component('mail::message')
# From : {{Auth::user()->name}}
Country : {{$data->country}}

<strong>Pillar :</strong>  {{$data->pillar['name']}} <br>
<strong>Priority: </strong> {{$data->priority}}

Status 
<hr> 
{{$data->status}}
<hr>
Key Action 
<hr>
{{$data->key_action}}
@endcomponent