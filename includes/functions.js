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
	along with CLPPhotoSite.  If not, see <http://www.gnu.org/licenses/>.
*/ 

function shownav()
{
	document.getElementById('sub-nav').style.visibility = "visible";
	<!-- document.getElementById('main').style.opacity = "0.7"; -->
}
function hidenav()
{
	document.getElementById('sub-nav').style.visibility = "hidden";
	<!-- document.getElementById('main').style.opacity = "1"; -->
}

function showlogin()
{
	document.getElementById('login').style.visibility = "visible";
	document.getElementById('g').focus();
	<!-- document.getElementById('main').style.opacity = "0.7"; -->
}
function hidelogin()
{
	document.getElementById('login').style.visibility = "hidden";
	<!-- document.getElementById('main').style.opacity = "1"; -->
}