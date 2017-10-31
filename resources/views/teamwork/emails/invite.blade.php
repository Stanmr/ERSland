<h1 style="text-align: center;"><strong>ERSland</strong></h1>
<hr />
<p style="text-align: center;"><strong>Has sido invitado a unirte al equipo</strong> {{$team->name}}.</p>
<p style="text-align: center;"><br /><strong>Por favor inicia sesi&oacute;n con tu cuenta de ERSland, desp&uacute;es dir&iacute;gete al siguiente enlace:</strong><br />
	<a href="{{route('teams.accept_invite', $invite->accept_token)}}">{{route('teams.accept_invite', $invite->accept_token)}}</a>