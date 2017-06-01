$(document).ready(function () {
  var endTime = new Date(new Date().getFullYear(), new Date().getMonth()+1, 1).getTime() / 1000;
  function setClock() {
      var elapsed = new Date().getTime() / 1000;
      var totalSec =  endTime - elapsed;
      var d = parseInt( totalSec / 86400 );
      var h = parseInt( totalSec / 3600 ) % 24;
      var m = parseInt( totalSec / 60 ) % 60;
      var s = parseInt(totalSec % 60, 10);
      var result = d+ " days, " + h + " hours, " + m + " minutes and " + s + " seconds!";
      document.getElementById('timeRemaining').innerHTML = result;
      setTimeout(setClock, 1000);
  }
  setClock();
});

/*#timeRemaining {
    border: 1px solid #000;
    padding: 10px;
}*/
