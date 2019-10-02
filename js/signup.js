const animate = () => {
	const spans = document.querySelectorAll(".animate");
	    spans.forEach(function (span, index) {
		    if(span.style.animation) {
			    span.style.animation = "";
		    } else {
		        span.style.animation = `animate 0.5s ease forwards ${index / 7 + 1.0}s`;
		    }
	    });
}

const showRegister = () => {
	const showRegister = document.querySelector("#register");
	const hideLogin = document.querySelector("#log-in");

	showRegister.style.display = "block";
	showRegister.style.height = "450px"

	hideLogin.style.display = "none";

}

const hideRegister = () => {
	const hideRegister = document.querySelector("#register");
	const showLogin = document.querySelector("#log-in");

	hideRegister.style.display = "";
	hideRegister.style.height = "400px";

    showLogin.style.display = "block";
    
}


animate();
showRegister();
hideRegister();
