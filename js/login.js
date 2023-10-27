function handleKeyPress(event) {
	if (event.altKey && event.key === "1") {
		window.location.href = "../login.php"
		event.preventDefault()
	}
}
document.addEventListener("keydown", handleKeyPress)
