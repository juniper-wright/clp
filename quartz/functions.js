function updateFiles()
{
	//get the input and UL list
	var input = document.getElementById('filesToUpload');
	var list = document.getElementById('fileList');

	while (list.hasChildNodes())
	{
		list.removeChild(list.firstChild);
	}

	for (var x = 0; x < input.files.length; x++)
	{
		//add to list
		var li = document.createElement('li');
		li.innerHTML = input.files[x].name;
		list.appendChild(li);
	}

	var limit = document.getElementById('limit');
	if(input.files.length > 250)
	{
		limit.style.color = '#FF0000';
		input.style.color = '#FF0000';
	}
	else
	{
		limit.style.color = '#000000';
		input.style.color = '#000000';
	}
}

function selectAll(box)
{
	if(box.checked != false)
	{
		var check_value = "checked";
	}
	else
	{
		var check_value = false;
	}
	var inputs = document.getElementsByTagName('input');
	for(var i = 0;i < inputs.length;i++)
	{
		if(inputs[i].name = 'delete[]')
		{
			inputs[i].checked = check_value;
		}
	}
}