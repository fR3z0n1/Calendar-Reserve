function createUnitHtml(parrent, elementName, className = null, attributeName = null, attributeValue = null) {

	//Создание элемента с заданным классом и атрибутом
	let createUnit = document.createElement(elementName);

		if(className != null) {
			createUnit.className = className;
		}

		if(attributeName != null && attributeValue != null) {
			createUnit.setAttribute(attributeName, attributeValue)
		}

		parrent.append(createUnit);
		return createUnit;
}

function getNowYear() {
	//Определение нынешнего года, для чисел февраля
	let nowYear = new Date().getFullYear();
	return nowYear;
}

function getQuantityDays(month) {
	//Нумерация месяцев, где month = 1 - это январь
	let year 		 = getNowYear();
	let quantityDays = new Date(year, month, 0).getDate();
	return quantityDays;
}
/*Создание дней каждого месяца*/
function setDaysByCalendar(month, classNameStart) {
	// classNameStart - родитель, начало вставки кода
	let tr;
	let td;

	tr = createUnitHtml(document.querySelector(`.${classNameStart}`), 'tr');
	for (let i = 1; i <= getQuantityDays(month); i++) {

		td = createUnitHtml(tr, 'td');
		if(i < 10)
			span = createUnitHtml(td, 'span', '', 'data-date', getNowYear() + `-0${month}-0` + i);
		else 
			span = createUnitHtml(td, 'span', '', 'data-date', getNowYear() + `-${month}-` + i);
			span.textContent = i;

		if(i % 7 == 0){
			tr = createUnitHtml(document.querySelector(`.${classNameStart}`), 'tr');
		}
					}
}

function sendReserve() {

	let date_for_lenght = Object.keys(date_bron);
	let paragrafErrors  = document.querySelector('.errors');
	let phone 			= $('#enter_phone').val();
	let isConfirm 		= confirm("Подтвердите бронирование даты");

	if(isConfirm) {

		if(phone != ''){
		
			if(date_for_lenght.length > 0){
				/*Ajax для записи данных в БД*/
				$.ajax({
				    type : "POST",
				    url  : '/script/writeDate.php',
				    data : {
				      date_bron : date_bron,
				      phone 	: phone,
				    },
				    success: function(){

				    	for (var i = 0; i < spans.length; i++) {
							spans[i].classList.remove('border-red');
						}
							paragrafErrors.className 	 	= 'errors alert alert-success';
							paragrafErrors.style.display 	= 'block';
							if(date_bron.length > 1)
								paragrafErrors.textContent  = 'Даты забронированы';
							else 
								paragrafErrors.textContent  = 'Дата забронирована';

				    			date_bron = [];

								/*Ajax для вовзрата массива уже забронированных дат*/

				    			$.ajax({
								    type : "POST",
								    url  : '/script/getBooked.php',
								    success: function(ret){

								    	readyBooked(ret);
								    },
								    error: function(xhr, status, error) {
										alert(xhr.responseText + '|\n' + status + '|\n' +error);
									}
								});

							setTimeout(() => paragrafErrors.style.display = 'none', 4000 );
				    },
				    error: function(xhr, status, error) {
		    			alert(xhr.responseText + '|\n' + status + '|\n' +error);
					}
				});
			} else {
				paragrafErrors.className 	 = 'errors alert alert-danger';
				paragrafErrors.style.display = 'block';
				paragrafErrors.textContent 	 = 'Не выбрана дата';
			    date_bron = [];

				setTimeout(() => { 
					paragrafErrors.style.display = 'none', 4000 
				});
			}

		} else {

			paragrafErrors.className 	 = 'errors alert alert-danger';
			paragrafErrors.style.display = 'block';
			paragrafErrors.textContent 	 = 'Не верно введён номер телефона';
			setTimeout(() => paragrafErrors.style.display = 'none', 4000 );
		}

	} else 
		return false;			
}

function onlyNumber(e) {

	if(e.keyCode < 48 || e.keyCode > 57) {
		return false;
	}
}

function readyBooked(dates) {

	dats = JSON.parse(dates);

	let arr = [];

	for(let k = 0; k < dats.length; k++){
		for (var i = 0; i < dats[k].length; i++) {
			arr.push(dats[k][i]);
		}
	}

	for (var i = 0; i < spans.length; i++) {
		let attr = spans[i].getAttribute('data-date');
		 for (var j = 0; j < arr.length; j++) {
			let attr = spans[i].getAttribute('data-date');
			if( attr == arr[j]) {
				spans[i].className = 'reserve';
				break;
			}
		}
	}
}