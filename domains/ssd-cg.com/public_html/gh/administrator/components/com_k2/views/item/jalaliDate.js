$K2(document).ready(function() {
	
	function _j( date_text){
			if (date_text=='') return '';
			var _type;
			var _date = Date.parseDate(date_text , '%Y-%m-%d %H:%M:%S' , 'gregorian');
			var CreatedtimeZone = 270;
			if (_date.getFullYear() < 1900 ){
				_date = Date.parseDate(date_text , '%Y-%m-%d %H:%M:%S' ,'jalali');	
				_type='jalali';
			} else {
				_type='gregorian';
			}
			try
			{
				if (_date.getJalaliUTCDayOfYear() > 185 ) CreatedtimeZone = 210;
			}
			catch( err ) {
				if (_date.getDayOfYear() > 264 | _date.getDayOfYear() < 79) CreatedtimeZone = 210;
			}
			
			_date.increment('minute',CreatedtimeZone);
			return _date.print(cFormat, 'jalali', false);			
		}
	
		var createdField = document.getElementById('created');
		var titleField = document.getElementById('title');
		var isNewArticle ;
		if (titleField){isNewArticle=(titleField.value == '')};
		cFormat='%Y-%m-%d %H:%M:%S';
		if (isNewArticle) cFormat='%Y-%m-%d';
		if (createdField)  createdField.value = _j(createdField.value);
		
		var publish_up = document.getElementById('publish_up');
		if (publish_up)  publish_up.value = _j(publish_up.value);
		
		var publish_down = document.getElementById('publish_down');
		if (publish_down)  publish_down.value = _j(publish_down.value);

		if (createdField) createdField.form.addEvent('submit', function () {
			var dateC =  document.getElementById('created');
			if (dateC && dateC.value !='') {
				var mdate = Date.parseDate(dateC.value, '%Y-%m-%d %H:%M:%S', 'jalali');
				if ( mdate.getFullYear() < 2500 ) dateC.value = mdate.print('%Y-%m-%d %H:%M:%S', 'gregorian', false);
			}
			var datePU =  document.getElementById('publish_up');
			if (datePU && datePU.value !='') {
				var mdate = Date.parseDate(datePU.value, '%Y-%m-%d %H:%M:%S', 'jalali');
				if ( mdate.getFullYear() < 2500 ) datePU.value = mdate.print('%Y-%m-%d %H:%M:%S', 'gregorian', false);
			}
			var datePD =  document.getElementById('publish_down');
			if (datePD && datePD.value !='') {
				var mdate = Date.parseDate(datePD.value, '%Y-%m-%d %H:%M:%S', 'jalali');
				if ( mdate.getFullYear() < 2500 ) datePD.value = mdate.print('%Y-%m-%d %H:%M:%S', 'gregorian', false);
			}
		});	
		
});