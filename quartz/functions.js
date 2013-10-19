/*
	This file is part of CLPPhotoSite.

	CLPPhotoSite is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	CLPPhotoSite is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/ 

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
	var submit = document.getElementById('uploadsubmit');
	if(input.files.length > 250)
	{
		limit.style.color = '#FF0000';
		input.style.color = '#FF0000';
		submit.disabled = "disabled";
	}
	else
	{
		limit.style.color = '#000000';
		input.style.color = '#000000';
		submit.disabled = false;
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