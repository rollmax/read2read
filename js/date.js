var dayName = new Array ("Воскресение","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота")

var monName = new Array ("Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря")

var now = new Date

document.write(dayName[now.getDay()]+"<br>"+now.getDate() +" "+ monName[now.getMonth()] + " 2012")
