var hand = document.getElementById('hand');
var content = document.getElementById('content');
hand.addEventListener('click', () => {
	content.scrollIntoView({
		behavior: 'smooth'
	});
});
