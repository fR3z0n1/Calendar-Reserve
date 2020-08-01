/*Наложение события клик по дню месяца*/
var date_bron = [];
let spans = document.querySelectorAll('span[data-date]');
spans.forEach(span => {
	span.addEventListener('click', function() {
		if(span.className == 'reserve')
			return false;
		
		if(span.className != 'border-red'){
			span.className = 'border-red';

			let dataAttribute = span.getAttribute("data-date");

			if(date_bron.indexOf(span.getAttribute("data-date")) === -1) {
				date_bron.push(dataAttribute);
			}

		} else {
			span.classList.remove('border-red');

			var index = date_bron.indexOf(span.getAttribute("data-date"));
			if (index > -1) {
			  date_bron.splice(index, 1);
			}
		}
	});
});