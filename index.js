const getServers = () =>
{
	$.get('server', (data) =>
	{
		let serversArr = [];
		for (let server of JSON.parse(data))
		{
			serversArr.push(`
				<tr class="table-${server.ServerWorking === '1' ? 'success' : 'danger'}">
					<th scope="row">${server.ServerID}</th>
					<th>${server.ServerName}</th>
					<th>
						<a href="${server.ServerAddress}" class="link">address</a>
					</th>
					<th><i class="fa fa-${server.ServerWorking === '1' ? 'check' : 'close'}"></i></th>
					<th>${server.LastUpdated}</th>
				</tr>
			`);
		}
		$('#servers_list').html(`
			${serversArr.join('')}
		`);
		$('#refresh_btn').removeClass('d-none');
		$('#loading_spinner').addClass('d-none');
	});
}

const refresh = () =>
{
	$('#refresh_btn').addClass('d-none');
	$('#loading_spinner').removeClass('d-none');
	$.get('server/refresh.php', () =>
	{
		getServers();
	})
}

getServers();
