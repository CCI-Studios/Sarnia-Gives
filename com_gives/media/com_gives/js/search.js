window.addEvent('domready', function () {
	var form = $('criteria-search-form');

	form.addEvent('submit', function (event) {
		var interests = false,
			skills = false,
			locations = false;

		form.getElements('input[name="interests[]"]').each(function (box) {
			if (box.checked) {
				//console.log(box.value + ' was checked');
				interests = true;
			}
		});

		form.getElements('input[name="skills[]"]').each(function (box) {
			if (box.checked) {
				//console.log(box.value + ' was checked');
				skills = true;
			}
		});

		form.getElements('input[name="locations[]"]').each(function (box) {
			if (box.checked) {
				//console.log(box.value + ' was checked');
				locations = true;
			}
		});

		if (!(interests && skills && locations)) {
			alert('Please make a selection for all sections.');
		}

		return (interests && skills && locations);
	});
});