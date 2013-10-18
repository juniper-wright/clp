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
}