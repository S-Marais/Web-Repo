xy = 100;
bool = true;

function zoom() {
	if (xy < 140 || bool)
	{
		xy++;
		bool = false;
	}
	else
	bool=true;
	if (xy > 150)
		clearInterval(timerId);
		//~ xy = 150;
	ratio = xy/1;
	document.body.style.backgroundSize = ratio+"% "+ratio+"%";
}

function moveSpaceship() {
	document.getElementById("spaceship").style.top = '75vh';
	document.getElementById("spaceship").style.left = '55vw';
	document.getElementById("spaceship").style.width = '20vw';
	document.getElementById("spaceship2").style.top = '12vh';
	document.getElementById("spaceship2").style.left = '15vw';
	document.getElementById("spaceship2").style.width = '35vw';
}
