<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">


</head>

<body>

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="alert alert-warning">
							<h1>Consulta</h1>
						</td>
					</tr>
					<tr>
						<td class="alert alert-warning">
							Nuevo mail desde la Página www.zulmabarrios.com.ar
						</td>
					</tr>
					<tr>
						<td class="content-wrap">
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td class="content-block">
										Enviado por <strong>{{$mail['nombre']}}</strong>.
									</td>
								</tr>
								<tr>
									<td class="content-block">
										{{$mail['mensaje']}}
									</td>
								</tr>
								
							</table>
						</td>
					</tr>
				</table>
				<div class="footer">
					
				</div></div>
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>